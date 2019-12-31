<?php

namespace app\controllers;

use Yii;
use app\models\Categorias;
use app\models\UsuariosCategorias;
use app\models\UsuariosCategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * UsuariosCategoriasController implements the CRUD actions for UsuariosCategorias model.
 */
class UsuariosCategoriasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

       return [

             'access' => [
                'class' => AccessControl::className(),
                'only' => ['categoriasdeusuario', 'seguircategoria','quitar'],
                'rules' => [
                    [
                        'actions' => ['categoriasdeusuario','seguircategoria','quitar'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UsuariosCategorias models.
     * @return mixed
     
    public function actionIndex()
    {
        $searchModel = new UsuariosCategoriasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    public function actionCategoriasdeusuario()
    {
        $searchModel = new UsuariosCategoriasSearch();
        $dataProvider = $searchModel->search(['UsuariosCategoriasSearch'=>['usuario_id'=>Yii::$app->user->identity->id]]);


        return $this->render('categoriasusuario', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    



    public function actionSeguircategoria()
    {
       
        $model = new UsuariosCategorias();
        $model->usuario_id=Yii::$app->user->identity->id;
        $model->fecha_seguimiento=date('Y-m-d H:i:s');
           
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save())
                return $this->redirect(['categoriasdeusuario']);
        }
       
       
        $todas = Categorias::find()->all();
        $lista =array();
        foreach ($todas as  $value) {
           
           if(UsuariosCategorias::find()->where(['usuario_id' => Yii::$app->user->identity->id,'categoria_id'=>$value->id])->one()==false)
             $lista[$value->id]=$value->nombre;
        }
        return $this->render('seguircategoria', [
            'model' => $model,
            'lista'=>$lista,
        ]);
    }

/**
     * Displays a single UsuariosCategorias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new UsuariosCategorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     
    public function actionCreate()
    {
        $model = new UsuariosCategorias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing UsuariosCategorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing UsuariosCategorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/
 public function actionQuitar($id)
    {
        $model=$this->findModel($id);
        if($model->usuario_id==Yii::$app->user->identity->id)
            $model->delete();

        return $this->redirect(['categoriasdeusuario']);
    }

    /**
     * Finds the UsuariosCategorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsuariosCategorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UsuariosCategorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
