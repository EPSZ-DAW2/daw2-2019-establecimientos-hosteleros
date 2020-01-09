<?php

namespace app\controllers;

use Yii;
use app\models\Locales;
use app\models\LocalesSearch;
use app\models\LocalesComentarios;
use app\models\LocalesComentariosSearch;
use app\models\LocalesImagenes;
use app\models\LocalesImagenesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocalesController implements the CRUD actions for Locales model.
 */
class LocalesController extends Controller
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
     * Lists all Locales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocalesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionBares()
    {
        $searchModel = new LocalesSearch();
        $bar=1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$bar);

        return $this->render('bares', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


        public function actionRestaurantes()
    {
        $searchModel = new LocalesSearch();
        $restaurante=2;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$restaurante);

        return $this->render('restaurantes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }




    /**
     * Displays a single Locales model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
			$modeloActual = $this->findModel($id);
		
			// Se buscan las imagenes.
			$searchModel = new LocalesImagenesSearch();
			$dataProvider = $searchModel->search(['LocalesImagenesSearch'=>['local_id'=>$id]]);
			//$locales = $dataProvider->getModels();
			
			
			return $this->render('view', [
				'model' => $modeloActual,
				'dataProvider' => $dataProvider,
				//'locales'=>$locales,
				'varf' => 5,
				]);
		
		
    }

    /**
     * Displays a single Locales model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionReport($id)
    {
        return $this->render('report', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Locales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($actualizar)
    {
        $model = new Locales();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'actualizar' => $actualizar,
        ]);
    }

    /**
     * Updates an existing Locales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$actualizar)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'actualizar' => $actualizar,
        ]);
    }

    /**
     * Deletes an existing Locales model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Locales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Locales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Locales::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList(){
        $searchModel=new LocalesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $thos->render('list',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }

    public function actionUpdate2($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
       

