<?php

namespace app\controllers;

use Yii;
use app\models\Hosteleros;
use app\models\HostelerosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\perfilSearch;
use app\models\AvisosSearch;
/**
 * HostelerosController implements the CRUD actions for Hosteleros model.
 */
class HostelerosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $layout = 'adminMain';
    
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
     * Lists all Hosteleros models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HostelerosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hosteleros model.
     * @param string $id
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
     * Creates a new Hosteleros model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($mostrarcabecera=FALSE)
    {
       if(!Yii::$app->user->isGuest){
        $model = new Hosteleros();
        $model->usuario_id = Yii::$app->user->id; //guarda la ID del usuario que esta conectado
        $model->fecha_alta = date('Y-m-d H:i:s'); //guarda la fecha en que se dió de alta
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        if($mostrarcabecera){

            $searchModelPerfil = new perfilSearch();
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $hostelero = Hosteleros::find()->hostelero($IDUsuarioConectado)->count();
            $dataProviderPerfil = $searchModelPerfil->search(Yii::$app->request->queryParams,$IDUsuarioConectado);


            $searchModelPerfil2 = new avisosSearch();
            $dataProviderPerfil2 = $searchModelPerfil2->searchIDAvisosNovistos(Yii::$app->request->queryParams,$IDUsuarioConectado);
            $avisos=$dataProviderPerfil2->getTotalCount();
            return $this->render('create', [
            'dataProviderPerfil' => $dataProviderPerfil,
            'hostelero' => $hostelero,
            'avisos'=>$avisos,
            'mostrarcabecera'=>$mostrarcabecera,
            'model' => $model,
        ]);
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
       }
    }

    /**
     * Updates an existing Hosteleros model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Hosteleros model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hosteleros model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Hosteleros the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hosteleros::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
