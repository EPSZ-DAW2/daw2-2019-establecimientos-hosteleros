<?php

namespace app\controllers;

use Yii;
use app\models\perfil;
use app\models\perfilSearch;

use app\models\UsuariosAvisos;
use app\models\AvisosSearch;

use app\models\LocalesSearch;
use app\models\Locales;


use app\models\LocalesConvocatorias;
use app\models\LocalesConvocatoriasSearch;


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
            $dataProviderAvisosNoVisto = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'A',FALSE);
            $dataProviderNotificaciones = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'N');
            $dataProviderNotificacionesNoVisto = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'N',FALSE);
            $dataProviderBloqueo = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'B');
            $dataProviderBloqueoNoVisto = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'B',FALSE);
            $dataProviderConsulta = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'C');
            $dataProviderConsultaNoVisto = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'C',FALSE);
            $dataProviderDenuncia = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'D');
            $dataProviderDenunciaNoVisto = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'D',FALSE);
            $dataProviderMensaje = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'M');
            $dataProviderMensajeNoVisto = $searchModel->searchIDAvisos(Yii::$app->request->queryParams,$IDUsuarioConectado,'M',FALSE);
            return $this->render('AvisosPerfil', [
                'searchModel' => $searchModel,
                'dataProviderAvisos' => $dataProviderAvisos,
                'dataProviderAvisosNoVisto' => $dataProviderAvisosNoVisto,
                'dataProviderBloqueo' => $dataProviderBloqueo,
                'dataProviderBloqueoNoVisto' => $dataProviderBloqueoNoVisto,
                'dataProviderNotificaciones' => $dataProviderNotificaciones,
                'dataProviderNotificacionesNoVisto' => $dataProviderNotificacionesNoVisto,
                'dataProviderConsulta' => $dataProviderConsulta,
                'dataProviderConsultaNoVisto' => $dataProviderConsultaNoVisto,
                'dataProviderDenuncia' => $dataProviderDenuncia,
                'dataProviderDenunciaNoVisto' => $dataProviderDenunciaNoVisto,
                'dataProviderMensaje' => $dataProviderMensaje,
                'dataProviderMensajNoVisto' => $dataProviderMensajeNoVisto,


            ]);
        }
    }


    public function actionQuitarconvocatoria(){
        if(!Yii::$app->user->isGuest){
                $connection = Yii::$app->db;
                $transaction = $connection->beginTransaction();
                $id=$_GET['id'];


                $IDUsuarioConectado=1;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo

                try {

                    $connection->createCommand('DELETE 
                        FROM locales_convocatorias_asistentes 
                        WHERE convocatoria_id='.$id.' AND usuario_id='.$IDUsuarioConectado)->execute();

                    $transaction->commit();

                    $this->redirect('convocatoriasporasistir');

                 } catch (Exception $e) {

                    $transaction->rollBack();

                }    
        }
    }

    public function actionConvocatoriasporasistir(){
        if(!Yii::$app->user->isGuest){
            $searchModel = new LocalesConvocatoriasSearch();
            $IDUsuarioConectado=1;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProvider = $searchModel->searchLocalesConvocatoriasDeUsuario(Yii::$app->request->queryParams,$IDUsuarioConectado);

            return $this->render('ConvocatoriasUsuario', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionPonernovisto(){
        if(!Yii::$app->user->isGuest){
                $connection = Yii::$app->db;
                $transaction = $connection->beginTransaction();
                $id=$_GET['id'];
                try {

                    $connection->createCommand('update usuarios_avisos set fecha_lectura = null where id='.$id)->execute();

                    $transaction->commit();

                    $this->redirect('avisos');

                 } catch (Exception $e) {

                    $transaction->rollBack();

                }    
        }

    }


    public function actionPonervisto(){
        if(!Yii::$app->user->isGuest){
                $connection = Yii::$app->db;
                $transaction = $connection->beginTransaction();
                $id=$_GET['id'];
                try {

                    $connection->createCommand('update usuarios_avisos set fecha_lectura = "'.date("Y-d-m h:i:s").'" where id='.$id)->execute();

                    $transaction->commit();

                    $this->redirect('avisos');

                   
                 

                 } catch (Exception $e) {

                    $transaction->rollBack();

                }    
        }

    }

    public function actionSeguimientos(){
        if(!Yii::$app->user->isGuest){
            $searchModel = new LocalesSearch();
            $IDUsuarioConectado=1;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProvider = $searchModel->searchLocalesSeguimiento(Yii::$app->request->queryParams,$IDUsuarioConectado);

            return $this->render('LocalesSeguimiento', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

    }


    public function actionDejardeseguirlocal(){

       if(!Yii::$app->user->isGuest){

                $connection = Yii::$app->db;
                $transaction = $connection->beginTransaction();
                $id=$_GET['id'];
                try {

                    $connection->createCommand()->delete('usuarios_locales', ['id' => $id])->execute();

                    $transaction->commit();

                    $this->redirect('seguimientos');

            

                 } catch (Exception $e) {

                    $transaction->rollBack();

                }

            
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
