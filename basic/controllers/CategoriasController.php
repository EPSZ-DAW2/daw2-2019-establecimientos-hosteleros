<?php

namespace app\controllers;

use Yii;
use app\models\Categorias;
use app\models\CategoriasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Locales;
use app\models\LocalesSearch;

/**
 * CategoriasController implements the CRUD actions for Categorias model.
 */
class CategoriasController extends Controller
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
     * Lists all Categorias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriasSearch();
        $nivel="Categorias Principales";
        $id=0;
        if(isset(Yii::$app->request->queryParams['id'])){
              $id = Yii::$app->request->queryParams['id'];
              $nivel="Categorias dentro de ".$this->findModel($id)->nombre;
         }
         $dataProvider = $searchModel->search(['CategoriasSearch'=>['categoria_id'=>$id]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'nivel'=>$nivel,
            'padre'=>($id==0 ? 0 : $this->findModel($id)->categoria_id),

        ]);
    }

    /**
     * Displays a single Categorias model.
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
     * Creates a new Categorias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $todas = Categorias::find()->all();
        $lista =array(0=>'Ninguna');
        foreach ($todas as  $value) {

             $lista[$value->id]=$value->nombre;
        }
        return $this->render('create', [
            'model' => $model,
            'lista'=>$lista
        ]);
    }

     public function actionUnificacion()
    {
         $model = new Categorias();//usamos un modelo de categoria pero no guardaremos una categoria sino dos ids de categoria

        if ($model->load(Yii::$app->request->post())) {
            $idEliminar = $model->categoria_id;
            $idConservar = $model->nombre;//el atributo nombre en esta ocasion nos servirá para guardar el id de la otra categoria
            if($idEliminar != $idConservar)
            {
                UsuariosCategorias::updateAll(['categoria_id' => $idConservar], 'categoria_id = '.$idEliminar);
                $this->findModel($idEliminar)->delete();
            }
            
            return $this->redirect(['index']);
        }
        $listaDeCategorias = Categorias::find()->all();
        $listaDeNombres = array();
        foreach($listaDeCategorias as $categoria)
        {
            $listaDeNombres[$categoria->id]=$categoria->nombre;
        }
        return $this->render('unificacion', [
            'model' => $model,
            'listaDeCategorias' => $listaDeNombres,
        ]);
    }

    /**
     * Updates an existing Categorias model.
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
        $todas = Categorias::find()->all();
        $lista =array(0=>'Ninguna');
        foreach ($todas as  $value) {
           if($value->id!=$id)
             $lista[$value->id]=$value->nombre;
        }
        return $this->render('update', [
            'model' => $model,
             'lista'=>$lista
        ]);
    }

    /**
     * Deletes an existing Categorias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //Comprobamos si la categoria que queremos eliminar esta siendo usada por algun local
            if(Locales::find()->where(['categoria_id'=>$id])->count()>0){//si esta siendo usada lo indicamos, no dejando eliminarla

                Yii::$app->session->setFlash('danger','No se puede eliminar una categoria que esta siendo usada');
                return $this->redirect(['index']);

            }else if(Categorias::find()->where(['categoria_id'=>$id])->count()>0){//si la categoria a borrar tiene hijos, tampoco dejamos eliminar

                Yii::$app->session->setFlash('danger','No se puede eliminar una categoria con subcategorias');
                return $this->redirect(['index']);

            }else{//si la categoria no tiene hijos, ni esta siendo usada, podra eliminarse

                $this->findModel($id)->delete();
            }
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Categorias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categorias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
