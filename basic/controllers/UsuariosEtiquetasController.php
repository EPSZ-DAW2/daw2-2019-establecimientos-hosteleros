<?php

namespace app\controllers;

use Yii;
use app\models\UsuariosEtiquetas;
use app\models\Etiquetas;
use app\models\UsuariosEtiquetasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * UsuariosEtiquetasController implements the CRUD actions for UsuariosEtiquetas model.
 */
class UsuariosEtiquetasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
             'access' => [
                'class' => AccessControl::className(),
                'only' => ['etiquetasdeusuario', 'seguiretiqueta','quitar'],
                'rules' => [
                    [
                        'actions' => ['etiquetasdeusuario','seguiretiqueta','quitar'],
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
     * Lists all UsuariosEtiquetas models.
     * @return mixed
     
    public function actionIndex()
    {
        $searchModel = new UsuariosEtiquetasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/
 public function actionEtiquetasdeusuario()
    {
        $searchModel = new UsuariosEtiquetasSearch();
        $dataProvider = $searchModel->search(['UsuariosEtiquetasSearch'=>['usuario_id'=>Yii::$app->user->identity->id]]);

        return $this->render('etiquetasusuario', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single UsuariosEtiquetas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    } */

    /**
     * Creates a new UsuariosEtiquetas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     
    public function actionCreate()
    {
        $model = new UsuariosEtiquetas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    public function actionSeguiretiqueta()
    {
     /*   if(Yii::$app->user->isGuest)
            return $this->redirect(['site/login']);*/
        $model = new UsuariosEtiquetas();
        $model->usuario_id=Yii::$app->user->identity->id;
        $model->fecha_seguimiento=date('Y-m-d H:i:s');
           
        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save())
                return $this->redirect(['etiquetasdeusuario']);
        }
       
       
        $todas = Etiquetas::find()->all();
        $lista =array();
        foreach ($todas as  $value) {
           
           if(UsuariosEtiquetas::find()->where(['usuario_id' => Yii::$app->user->identity->id,'etiqueta_id'=>$value->id])->one()==false)
             $lista[$value->id]=$value->nombre;
        }
        return $this->render('seguiretiqueta', [
            'model' => $model,
            'lista'=>$lista,
        ]);
    }

    /**
     * Updates an existing UsuariosEtiquetas model.
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
     * Deletes an existing UsuariosEtiquetas model.
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

        return $this->redirect(['etiquetasdeusuario']);
    }

    /**
     * Finds the UsuariosEtiquetas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsuariosEtiquetas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
    
    protected function findModel($id)
    {
        if (($model = UsuariosEtiquetas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    } */
}
