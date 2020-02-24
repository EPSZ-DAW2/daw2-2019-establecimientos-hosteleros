<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
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
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post())){
            $model->fecha_registro=date("Y-m-d h:i:s");
            $model->confirmado=0;
            $model->num_accesos=0;
            $model->fecha_acceso=date("Y-m-d h:i:s");
            $model->fecha_bloqueo=date("Y-m-d h:i:s");
            $model->notas_bloqueo="";
            $model->bloqueado=0;
            $model->privilegios=0;
            if($model->save())
            {
                return $this->redirect(['confirmacion', 'id'=>$model->id]);
            }else
            {
                echo 'El nombre que quiere introducir ya existe en nuestra base de datos';
            }
           
        }else
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionBloquear()
    {
        $id=$_GET['id'];
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->bloqueado=1;
            $model->fecha_bloqueo=date("Y-m-d h:i:s");
            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('bloquear', [
            'model' => $model,
        ]);
    }

    public function actionDesbloquear()
    {
        $id=$_GET['id'];
        $model = $this->findModel($id);


        $model->bloqueado=0;
        $model->notas_bloqueo="";
        if($model->save())
        {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }
    
    public function actionConfirmacion()
    {

        $id=isset($_GET['id'])?$_GET['id']:FALSE;
        if($id!=FALSE)
        {
            $model=new User();
            //Editar confirmacion

            $model=User::findOne($id);
            $model->confirmado=1;
            if ($model->save()) {
                return $this->render('confirmacion', ['id'=>$_GET['id']]);
            }
            
        }else
        {
            return $this->redirect(['/site/login']);
        }
    }

    /**
     * Updates an existing Usuarios model.
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
     * Deletes an existing Usuarios model.
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
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
