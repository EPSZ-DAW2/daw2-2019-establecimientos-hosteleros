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
 * LocalesimagenesController implements the CRUD actions for LocalesImagenes model.
 */
 
class LocalesImagenesController extends Controller
{
    /**
     * @inheritdoc
     */
    //se realiza lo primero de todo, redirige a login a los no registrados
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
     * Lists all LocalesImagenes models.
     * @return mixed
     */
    public function actionIndex($id)
    {
			$searchModel = new LocalesImagenesSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			
			 return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'model' => $id,
			]);
	}
    /**
     * Displays a single LocalesImagenes model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    /**
     * Creates a new LocalesImagenes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($local_id)
    {

        $model = new LocalesImagenes();
		
		$locales=array();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
		
        return $this->render('create', [
            'model' => $model,
    		'local_id' => $local_id,
        ]);
    }
    /**
     * Updates an existing LocalesImagenes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
		
        return $this->render('update', [
            'model' => $model,
			'local_id' => $local_id,
    		'imagen_id' => $imagen_id,
        ]);
    }
    /**
     * Deletes an existing LocalesImagenes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$this->findModel($id)->delete();
		
        return $this->redirect(['index']);
    }
	
    /**
     * Finds the LocalesImagenes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LocalesImagenes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LocalesImagenes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}