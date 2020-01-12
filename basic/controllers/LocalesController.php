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
use app\models\UsuariosLocalesSearch;
use app\models\LocalesConvocatoriasAsistentesSearch;
use app\models\UsuariosAvisos;
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
    
    public function actionVisible($id){
        $model = $this->findModel($id);
        $model->visible = "1";
        $model->update();
        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    public function actionInvisible($id){
        $model = $this->findModel($id);
        $model->visible = "0";
        $model->update();
        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    public function actionBloquear($id)
    {
        $model = $this->findModel($id);
        $model->bloqueado = "2";
        $model->visible = "0";
        $model->notas_bloqueo = "Bloqueado por la administracion";
        $model->fecha_bloqueo = date('Y-m-d h:i:s');
        $model->update();
        return $this->redirect(['view', 'id' => $model->id]);
    }
    
    public function actionDesbloquear($id)
    {
        $model = $this->findModel($id);
        $model->bloqueado = "0";
        $model->visible = "1";
        $model->notas_bloqueo = "";
        $model->fecha_bloqueo = "0";
        $model->update();
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Creates a new Locales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionValorar($id,$valoracion,$local_id,$action=0,$comentario_id)
    {
        
        if($comentario_id == 0){ //si es un comentario padre, valora, si no, no
                $model = $this->findModel($local_id);
                if($action == 0){
                    $model->sumaValores += $valoracion;
                    $model->totalVotos += 1;
                    $model->update();
                }elseif($action == 1){
                    $model->sumaValores -= $valoracion;
                    $model->totalVotos -= 1;
                    $model->update();
                }
        }
        
        
        return $this->redirect(['locales-comentarios/view', 'id' => $id]);
    }
    
    public function actionValorar2($id,$valoracionAntigua, $valoracion, $local_id, $comentario_id)
    {
        if($comentario_id == 0){
            $model = $this->findModel($local_id);
            $model->sumaValores -= $valoracionAntigua;
            $model->sumaValores += $valoracion;
            $model->update();
        }
       
        return $this->redirect(['locales-comentarios/view', 'id' => $id]);
        
    }
    
    public function actionCreate($actualizar)
    {
        $model = new Locales();
        $model->visible = "1";
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



            $searchModel = new UsuariosLocalesSearch();
            $dataProvider = $searchModel->searchIDlocal(Yii::$app->request->queryParams,$id);

            //AVISO PARA LOS QUE SIGUEN AL LOCAL
            for ($i=0; $i < $dataProvider->getTotalCount(); $i++) { 

                //print($dataProvider->getModels()[$i]['usuario_id']);
                $aviso = new UsuariosAvisos;
               // $aviso->id=1;
                $aviso->fecha_aviso = date("Y-d-m h:i:s");
                $aviso->clase_aviso_id="N";
                $aviso->texto="Aviso de eliminacion de local (debido a que sigues al local) del local: ".$this->findModel($id)->titulo;
                $aviso->destino_usuario_id=$dataProvider->getModels()[$i]['usuario_id'];
                $aviso->origen_usuario_id=1;
                $aviso->local_id=$id;
                $aviso->comentario_id=0;
                $aviso->fecha_lectura=null;
                $aviso->fecha_aceptado=null;
                $aviso->save();
                if($aviso->save()){
                    print("si".$aviso->save());
                }else{
                    print("no");
                }
            }

            
            $searchModel = new LocalesConvocatoriasAsistentesSearch();
            $UsuariosAsistentes = $searchModel->searchIDlocal(Yii::$app->request->queryParams,$id);
            
            for ($i=0; $i < $UsuariosAsistentes->getTotalCount(); $i++) { 

                // print($dataProvider->getModels()[$i]['usuario_id']);
                $aviso = new UsuariosAvisos;
                $aviso->fecha_aviso = date("Y-d-m h:i:s");
                $aviso->clase_aviso_id="N";
                $aviso->texto="Aviso de eliminacion de local (debido a que ibas a asistir a una convocatoria) del local: ".$this->findModel($id)->titulo;
                $aviso->destino_usuario_id=$UsuariosAsistentes->getModels()[$i]['usuario_id'];
                $aviso->origen_usuario_id=0;
                $aviso->local_id=$id;
                $aviso->comentario_id=0;
                $aviso->fecha_lectura=null;
                $aviso->fecha_aceptado=null;
                $aviso->save();
            }

            
            $connection = Yii::$app->db; //borrar todos los seguimientos de los usuarios a este local
            $transaction = $connection->beginTransaction();
            $connection->createCommand()->delete('usuarios_locales', ['local_id' => $id])->execute();
            $transaction->commit();
            $connection2 = Yii::$app->db; 
            $transaction2 = $connection2->beginTransaction();
            $connection2->createCommand()->delete('locales_convocatorias', ['local_id' => $id])->execute();
            $transaction2->commit();
            $connection3 = Yii::$app->db;      
            $transaction3 = $connection3->beginTransaction();
            $connection3->createCommand()->delete('locales_convocatorias_asistentes', ['local_id' => $id])->execute();
            $transaction3->commit();

        return $this->redirect(['/perfil/localespropios']);
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
       

