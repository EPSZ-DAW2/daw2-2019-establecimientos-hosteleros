<?php

namespace app\controllers;

use Yii;
use app\models\LocalesConvocatorias;
use app\models\LocalesConvocatoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\UsuariosAvisos;
use app\models\UsuariosLocales;

use app\models\UsuariosLocalesSearch;
use app\models\LocalesSearch;

use app\models\LocalesConvocatoriasAsistentesSearch;
use app\models\LocalesConvocatoriasAsistentes;

/**
 * LocalesConvocatoriasController implements the CRUD actions for LocalesConvocatorias model.
 */
class LocalesConvocatoriasController extends Controller
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
     * Lists all LocalesConvocatorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocalesConvocatoriasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LocalesConvocatorias model.
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
     * Creates a new LocalesConvocatorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LocalesConvocatorias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LocalesConvocatorias model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                $searchModel = new UsuariosLocalesSearch();
                $dataProvider = $searchModel->searchIDlocal(Yii::$app->request->queryParams,$model->local_id);

                $searchModel2 = new LocalesSearch();
                $dataProvider2 = $searchModel2->searchIDlocal(Yii::$app->request->queryParams,$model->local_id);

                //AVISO PARA LOS QUE SIGUEN AL LOCAL
                for ($i=0; $i < $dataProvider->getTotalCount(); $i++) { 

                    // print($dataProvider->getModels()[$i]['usuario_id']);
                    $aviso = new UsuariosAvisos;
                    $aviso->fecha_aviso = date("Y-d-m h:i:s");
                    $aviso->clase_aviso_id="N";
                    $aviso->texto="Aviso de cambio (debido a que sigues al local) de convocatoria del local: ".$dataProvider2->getModels()[0]['titulo'];
                    $aviso->destino_usuario_id=$dataProvider->getModels()[$i]['usuario_id'];
                    $aviso->origen_usuario_id=0;
                    $aviso->local_id=$model->local_id;
                    $aviso->comentario_id=0;
                    $aviso->fecha_lectura=null;
                    $aviso->fecha_aceptado=null;
                    $aviso->save();
                }


                //AVISO PARA LOS QUE ASISTEN A UNA CONVOCATORIA
                $searchModel = new LocalesConvocatoriasAsistentesSearch();
                $UsuariosAsistentes = $searchModel->searchIDlocal(Yii::$app->request->queryParams,$model->local_id);
                
                for ($i=0; $i < $UsuariosAsistentes->getTotalCount(); $i++) { 

                    // print($dataProvider->getModels()[$i]['usuario_id']);
                    $aviso = new UsuariosAvisos;
                    $aviso->fecha_aviso = date("Y-d-m h:i:s");
                    $aviso->clase_aviso_id="N";
                    $aviso->texto="Aviso de cambio (debido a que ibas a asistir a la convocatoria) de convocatoria del local: ".$dataProvider2->getModels()[0]['titulo'];
                    $aviso->destino_usuario_id=$UsuariosAsistentes->getModels()[$i]['usuario_id'];
                    $aviso->origen_usuario_id=0;
                    $aviso->local_id=$model->local_id;
                    $aviso->comentario_id=0;
                    $aviso->fecha_lectura=null;
                    $aviso->fecha_aceptado=null;
                    $aviso->save();
                }
                 $model->modi_usuario_id=Yii::$app->user->id; 
                 $model->modi_fecha=date("Y-d-m h:i:s"); 
                 $model->save();
                 return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LocalesConvocatorias model.
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
     * Finds the LocalesConvocatorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LocalesConvocatorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LocalesConvocatorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDeleteperfil($id,$localid)
    {
        $this->findModel($id)->delete();
        $searchModel = new UsuariosLocalesSearch();
        $dataProvider = $searchModel->searchIDlocal(Yii::$app->request->queryParams,$localid);

        $searchModel2 = new LocalesSearch();
        $dataProvider2 = $searchModel2->searchIDlocal(Yii::$app->request->queryParams,$localid);

        //AVISO PARA LOS QUE SIGUEN AL LOCAL
        for ($i=0; $i < $dataProvider->getTotalCount(); $i++) { 

            // print($dataProvider->getModels()[$i]['usuario_id']);
            $aviso = new UsuariosAvisos;
            $aviso->fecha_aviso = date("Y-d-m h:i:s");
            $aviso->clase_aviso_id="N";
            $aviso->texto="Aviso de eliminacion (debido a que sigues al local) de convocatoria del local: ".$dataProvider2->getModels()[0]['titulo'];
            $aviso->destino_usuario_id=$dataProvider->getModels()[$i]['usuario_id'];
            $aviso->origen_usuario_id=0;
            $aviso->local_id=$localid;
            $aviso->comentario_id=0;
            $aviso->fecha_lectura=null;
            $aviso->fecha_aceptado=null;
            $aviso->save();
        }


        //AVISO PARA LOS QUE ASISTEN A UNA CONVOCATORIA
        $searchModel = new LocalesConvocatoriasAsistentesSearch();
        $UsuariosAsistentes = $searchModel->searchIDlocal(Yii::$app->request->queryParams,$localid);
        
        for ($i=0; $i < $UsuariosAsistentes->getTotalCount(); $i++) { 

            // print($dataProvider->getModels()[$i]['usuario_id']);
            $aviso = new UsuariosAvisos;
            $aviso->fecha_aviso = date("Y-d-m h:i:s");
            $aviso->clase_aviso_id="N";
            $aviso->texto="Aviso de eliminacion (debido a que ibas a asistir a la convocatoria) de convocatoria del local: ".$dataProvider2->getModels()[0]['titulo'];
            $aviso->destino_usuario_id=$UsuariosAsistentes->getModels()[$i]['usuario_id'];
            $aviso->origen_usuario_id=0;
            $aviso->local_id=$localid;
            $aviso->comentario_id=0;
            $aviso->fecha_lectura=null;
            $aviso->fecha_aceptado=null;
            $aviso->save();
        }
       

        return $this->redirect(['perfil/convocatoriaspropias']);
    }
}
