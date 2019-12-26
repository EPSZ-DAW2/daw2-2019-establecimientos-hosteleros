<?php

namespace app\controllers;

use Yii;
use app\models\perfil;
use app\models\perfilSearch;

use app\models\UsuariosAvisos;
use app\models\AvisosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilController implements the CRUD actions for perfil model.
 */
class PerfilController extends Controller
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
     * Lists all perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new perfilSearch();
            $IDUsuarioConectado=1;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$IDUsuarioConectado);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        
    }



    public function actionAvisos()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new AvisosSearch();
            $IDUsuarioConectado=1;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProviderAvisos = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'A');
            $dataProviderNotificaciones = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'N');
            $dataProviderBloqueo = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'B');
            $dataProviderConsulta = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'C');
            $dataProviderDenuncia = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'D');
            $dataProviderMensaje = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'M');
            return $this->render('AvisosPerfil', [
                'searchModel' => $searchModel,
                'dataProviderAvisos' => $dataProviderAvisos,
                'dataProviderBloqueo' => $dataProviderBloqueo,
                'dataProviderNotificaciones' => $dataProviderNotificaciones,
                'dataProviderConsulta' => $dataProviderConsulta,
                'dataProviderDenuncia' => $dataProviderDenuncia,
                'dataProviderMensaje' => $dataProviderMensaje,


            ]);
        }
    }
    /**
     * Displays a single perfil model.
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
     * Creates a new perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new perfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing perfil model.
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing perfil model.
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
     * Finds the perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = perfil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
