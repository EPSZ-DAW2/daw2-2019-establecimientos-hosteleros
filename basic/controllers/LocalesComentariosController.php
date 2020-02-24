<?php

namespace app\controllers;

use Yii;
use app\models\Locales;
use app\models\LocalesSearch;
use app\models\LocalesComentarios;
use app\models\LocalesComentariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * LocalesController implements the CRUD actions for Locales model.
 */
class LocalesComentariosController extends Controller
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
     * Lists all comments.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIndex($id)
    {
        $query = LocalesComentarios::find()->valoraciones($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'sort'=> ['defaultOrder' => ['crea_fecha' => SORT_DESC]]		// Se ordenan los comentarios por fecha/hora de creación más reciente.
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $id,
        ]);
    }

    /**
     * Displays a single Comment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionBloqueados($local_id)
    {
        $query = LocalesComentarios::find()->bloqueados($local_id);
        
        $dataProvider = new ActiveDataProvider([
           'query' => $query, 
        ]);
        
        return $this->render('bloqueados', [
            'dataProvider' => $dataProvider,
            'local_id' => $local_id,
        ]);
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionView2($comentarios_id)
    {
        $query = LocalesComentarios::find()->respuestas($comentarios_id);
        $model = $this->findModel($comentarios_id);
        $dataProvider = new ActiveDataProvider([
           'query' => $query,
        ]);
        
        return $this->render('view2', [
            'dataProvider' => $dataProvider,
            'model' => $model,     
        ]);
    }
	
	/**
     * Creates a new Comment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$local_id,$comentario_id,$actualizar)
    {   
        if(!Yii::$app->user->isGuest){
            $model = new LocalesComentarios();
            $model->crea_usuario_id = Yii::$app->user->id; 
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['locales/valorar', 'id' => $model->id, 'valoracion' => $model->valoracion, 'local_id' => $local_id, 'action' => 0, 'comentario_id' => $model->comentario_id]);
            }

            return $this->render('create', ['model' => $model, 
                    'id' => $id,
                    'local_id' => $local_id,
                    'comentario_id' => $comentario_id,
                'actualizar' => $actualizar,
            ]);
        }else{
            return $this->redirect(['site/login']);
        }
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
    
    public function actionBloquear($id)
    {
        $model = $this->findModel($id);
        $model->bloqueado = "2";
        $model->notas_bloqueo = "Bloqueado por la administracion";
        $model->fecha_bloqueo = date('Y-m-d h:i:s');
        $model->update();
        return $this->redirect(['locales/valorar', 'id' => $model->id, 'valoracion' => $model->valoracion, 'local_id' => $model->local_id, 'action' => 1, 'comentario_id' => $model->comentario_id]);
    }
    
     public function actionDesbloquear($id)
    {
        $model = $this->findModel($id);
        $model->bloqueado = "0";
        $model->notas_bloqueo = "";
        $model->fecha_bloqueo = "0";
        $model->update();
        return $this->redirect(['locales/valorar', 'id' => $model->id, 'valoracion' => $model->valoracion, 'local_id' => $model->local_id, 'action' => 0, 'comentario_id' => $model->comentario_id]);
    }

    /**
     * Updates an existing Locales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$local_id,$actualizar,$comentario_id)
    {
        $model = $this->findModel($id);
        $valoracionAntigua = $model->valoracion;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['locales/valorar2', 'id' => $model->id, 'valoracionAntigua' => $valoracionAntigua,'valoracion' => $model->valoracion, 'local_id' => $model->local_id, 'comentario_id' => $model->comentario_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'local_id' => $local_id,
            'actualizar' => $actualizar,
            'comentario_id' => $comentario_id,
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
        if (($model = LocalesComentarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList(){
        $searchModel=new LocalesComentariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $thos->render('list',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }


        public function actionUpdate2($id)
    {
        $model = $this->findModel($id);
 
        if ($model->load(Yii::$app->request->post())) {
            $model->modi_usuario_id=Yii::$app->user->id;
            $model->save();
            return $this->redirect(['perfil/comentariosyvaloracionespropios']);
        }

        return $this->render('updateUsuario', [
            'model' => $model,

        ]);
    }

}
