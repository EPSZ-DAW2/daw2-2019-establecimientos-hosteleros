<?php

namespace app\controllers;

use Yii;


use yii\filters\AccessControl;
use yii\web\Response;
use app\models\LoginForm;

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

use app\models\HostelerosSearch;
use app\models\Hosteleros;

use app\models\LocalesComentariosSearch;
use app\models\LocalesComentarios;

use app\models\PasswordForm;
use app\models\Login;

use app\models\usuarios;


/**
 * PerfilController implements the CRUD actions for perfil model.
 */
class PerfilController extends Controller
{
    /**
     * {@inheritdoc}
     */


     public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout','changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
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
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
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

    public function actionChangepassword(){
        $IDUsuarioConectado=Yii::$app->user->id;
        $model = new PasswordForm;
        $modeluser = usuarios::find()->where([
            'id'=>$IDUsuarioConectado
        ])->one();
     
        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                try{
                    $modeluser->password = $_POST['PasswordForm']['newpass'];
                    if($modeluser->save()){
                        Yii::$app->getSession()->setFlash(
                            'success','Password changed'
                        );
                        return $this->redirect(['index']);
                    }else{
                        Yii::$app->getSession()->setFlash(
                            'error','Password not changed'
                        );
                        return $this->redirect(['index']);
                    }
                }catch(Exception $e){
                    Yii::$app->getSession()->setFlash(
                        'error',"{$e->getMessage()}"
                    );
                    return $this->render('changepassword',[
                        'model'=>$model
                    ]);
                }
            }else{
                return $this->render('changepassword',[
                    'model'=>$model
                ]);
            }
        }else{
            return $this->render('changepassword',[
                'model'=>$model
            ]);
        }
    }



    public function actionDarsedebaja(){
        return $this->render('CambiarContraseña', [
                //'searchModel' => $searchModel,
                //'dataProvider' => $dataProvider,
            ]);
    }


    public function actionQuitarconvocatoria(){
        if(!Yii::$app->user->isGuest){
                $connection = Yii::$app->db;
                $transaction = $connection->beginTransaction();
                $id=$_GET['id'];


                $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo

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
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProvider = $searchModel->searchLocalesConvocatoriasDeUsuario(Yii::$app->request->queryParams,$IDUsuarioConectado);

            return $this->render('ConvocatoriasUsuario', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }


     public function actionComentariosyvaloracionespropios(){
        if(!Yii::$app->user->isGuest){
            $searchModel = new LocalesComentariosSearch();
            $IDUsuarioConectado=Yii::$app->user->id;
            $dataProvider = $searchModel->searchIDusuario(Yii::$app->request->queryParams,$IDUsuarioConectado);

            return $this->render('ComentariosYValoriacionesPropios', [
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
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
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

    public function actionLocalespropios(){
        if(!Yii::$app->user->isGuest){
            $searchModel = new hostelerosSearch();
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo

            $dataProviderNoTerminado = $searchModel->searchID(Yii::$app->request->queryParams,$IDUsuarioConectado,0);
            $dataProviderTerminado = $searchModel->searchID(Yii::$app->request->queryParams,$IDUsuarioConectado,1);
            $dataProviderSuspendido = $searchModel->searchID(Yii::$app->request->queryParams,$IDUsuarioConectado,2);
            return $this->render('EstablecimientosPropios', [
                'searchModel' => $searchModel,
                'dataProviderNoTerminado' => $dataProviderNoTerminado,
                'dataProviderTerminado'=>$dataProviderTerminado,
                'dataProviderSuspendido'=>$dataProviderSuspendido,
            ]);
        }
    }

        public function actionConvocatoriaspropias(){
        if(!Yii::$app->user->isGuest){
            $searchModel = new localesconvocatoriasSearch();
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProvider = $searchModel->searchCreadasPorUsuario(Yii::$app->request->queryParams,$IDUsuarioConectado);
            return $this->render('ConvocatoriasPropias', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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
