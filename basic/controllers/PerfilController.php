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
use app\models\HostelerosQuery;

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
            if(isset($_GET['mostrar'])){
                $mostrar=$_GET['mostrar'];
            }else{
                $mostrar=0;
            }
            
            $searchModel = new perfilSearch();
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $hostelero = Hosteleros::find()->hostelero($IDUsuarioConectado)->count();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$IDUsuarioConectado);


            $searchModel2 = new avisosSearch();
            $dataProvider2 = $searchModel2->searchIDAvisosNovistos(Yii::$app->request->queryParams,$IDUsuarioConectado);
            $avisos=$dataProvider2->getTotalCount();
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
<<<<<<< HEAD
                'hostelero' => $hostelero,
=======
                'mostrar'=>$mostrar,
                'avisos'=>$avisos,
>>>>>>> c431eba33cbf96ce4493b89dee1a8ef4f52b6454
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

    public function actionActualizarlocal(){
        $id=$_GET['id'];
        $estado=$_GET['estado'];
        $model = locales::findOne($id);
        $aviso = new UsuariosAvisos;
                    $aviso->fecha_aviso = date("Y-m-d h:i:s");
                    $aviso->clase_aviso_id="N";
                    $aviso->destino_usuario_id=$model->crea_usuario_id;
                    $aviso->origen_usuario_id=0;
                    $aviso->comentario_id=0;
                    $aviso->fecha_lectura=null;
                    $aviso->fecha_aceptado=null;
        switch ($estado) {
            case '1':
                $model->terminado=$estado;
                $aviso->texto="Su local ".$model->titulo." ha sido aceptado";
                break;
            case '2':
                $model->terminado=$estado;
                $model->notas_admin=$model->notas_admin." Local suspendido por administrador.";
                $aviso->texto="Su local ".$model->titulo." ha sido suspendido";
                break;
            case '3':
                $model->terminado=$estado;
                $model->notas_admin=$model->notas_admin." Local cancelado por administrador.";
                $aviso->texto="Su local ".$model->titulo." ha sido cancelado";
                break;
            
            default:
                # code...
                break;
        }

        $aviso->save();
        $model->save();
        return $this->redirect(['validarlocales']);

    }

    public function actionValidarlocales(){
        if(!Yii::$app->user->isGuest){
            $searchModel = new LocalesSearch();
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo
            $dataProvider = $searchModel->searchLocalesPendientesDeAceptacion(Yii::$app->request->queryParams,$IDUsuarioConectado);

            return $this->render('validarlocales', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
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


    public function actionPeticiondesbloqueo(){
        $id=$_GET['id'];

        $model = new UsuariosAvisos();
        $model->fecha_aviso=date("Y-m-d h:i:s");
        $model->clase_aviso_id="N";
        $model->destino_usuario_id=1;
        $model->origen_usuario_id=Yii::$app->user->id;
        

        if ($model->load(Yii::$app->request->post())) {
            $model->texto="*DESBLOQUEO* El usuario id=".Yii::$app->user->id." ha pedido una solicitud de desbloqueo para el local id=".$id.
                            " con el siguiente contenido:".$model->texto;
            if($model->save()){
              return $this->redirect(['/perfil/index']);              
            }

        }


        return $this->render('/avisos/NotificarAdmin', [
            'model' => $model,
        ]);

    }


    public function actionDarsedebaja(){
        $aviso = new UsuariosAvisos;
            $aviso->fecha_aviso = date("Y-m-d h:i:s");
            $aviso->clase_aviso_id="N";
            $aviso->texto="*BAJA* El usuario id=".Yii::$app->user->id." ha pedido solicitud de baja";
            $aviso->destino_usuario_id=1;
            $aviso->origen_usuario_id=Yii::$app->user->id;
            $aviso->comentario_id=Yii::$app->user->id;
            $aviso->fecha_lectura=null;
            $aviso->fecha_aceptado=null;

        if($aviso->save()){
            return $this->render('DarseDeBaja', [
            'exito'=>TRUE,
            ]);
        }else{
            return $this->render('DarseDeBaja', [
            'exito'=>FALSE,
            ]);
        }
        
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

                    $connection->createCommand('update usuarios_avisos set fecha_lectura = "'.date("Y-m-d h:i:s").'" where id='.$id)->execute();

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
            $searchModel = new localesSearch();
            $IDUsuarioConectado=Yii::$app->user->id;   //cuando se decida como llamar a esta variable hay que cambiarlo deberia ser una variable de sesion o algo

            $dataProviderNoTerminado = $searchModel->searchLocalesDeHosteleros(Yii::$app->request->queryParams,$IDUsuarioConectado,0);
            $dataProviderTerminado = $searchModel->searchLocalesDeHosteleros(Yii::$app->request->queryParams,$IDUsuarioConectado,1);
            $dataProviderSuspendido = $searchModel->searchLocalesDeHosteleros(Yii::$app->request->queryParams,$IDUsuarioConectado,2);
            $dataProviderBloqueados = $searchModel->searchLocalesBloqueados(Yii::$app->request->queryParams,$IDUsuarioConectado);
            return $this->render('EstablecimientosPropios2', [
                'searchModel' => $searchModel,
                'dataProviderNoTerminado' => $dataProviderNoTerminado,
                'dataProviderTerminado'=>$dataProviderTerminado,
                'dataProviderSuspendido'=>$dataProviderSuspendido,
                'dataProviderBloqueados'=>$dataProviderBloqueados,
            ]);
        }
    }

    public function actionLocalespropiosPRUEBA(){
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
