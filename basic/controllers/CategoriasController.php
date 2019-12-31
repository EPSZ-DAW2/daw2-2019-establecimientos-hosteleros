<?php

namespace app\controllers;

use Yii;
use app\models\Categorias;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [


            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $nivel="Categorias Principales";
        $id=0;
        if(isset(Yii::$app->request->queryParams['id'])){
              $id = Yii::$app->request->queryParams['id'];
              $nivel="Categorias dentro de ".$this->findModel($id)->nombre;
         }
         $dataProvider = $searchModel->search(['CategoriasSearch'=>['categoria_id'=>$id]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'nivel'=>$nivel,
            'padre'=>($id==0 ? 0 : $this->findModel($id)->categoria_id),

        ]);
    }

    /**
     * Displays a single Categorias model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $todas = Categorias::find()->all();
        $lista =array(0=>'Ninguna');
        foreach ($todas as  $value) {

             $lista[$value->id]=$value->nombre;
        }
        return $this->render('create', [
            'model' => $model,
            'lista'=>$lista
        ]);
    }

    /**
     * Updates an existing Categorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $todas = Categorias::find()->all();
        $lista =array(0=>'Ninguna');
        foreach ($todas as  $value) {
           if($value->id!=$id)
             $lista[$value->id]=$value->nombre;
        }
        return $this->render('update', [
            'model' => $model,
             'lista'=>$lista
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Categorias::find()->where(['categoria_id'=>$id])->count()>0){//si la categoria a borrar tiene hijos
               Yii::$app->session->setFlash('danger','No se puede eliminar una categoria con subcategorias');
             return $this->redirect(['index']);
        }else{
            $this->findModel($id)->delete();
        }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
