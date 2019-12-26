<?php

namespace app\controllers;

use app\models\Zonas;
use app\models\ZonasSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ZonasController implements the CRUD actions for Zonas model.
 */
class ZonasController extends Controller
{
    /**
     * Creates a new Zonas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zonas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Zonas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param  integer               $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Zonas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new ZonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * CONTROLADOR PARA PRUEBAS, DEBE ELIMINARSE
     */
    public function actionPruebas()
    {
        $model  = new Zonas();
        $zonas  = $model->getListaZonas();
        $id     = $model->getIdZona('Continent');
        $nombre = $model->getNombreZona(1);

        return $this->render('pruebas', ['zonas' => $zonas, 'id' => $id, 'nombre' => $nombre]); //Para devolverlo como vista

        //return $zonas; //Para devolver el JSON
    }

    /**
     * Lists all Zonas models.
     * @return mixed
     */
    public function actionSindex()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //Para devolver como respuesta RESTful
        $model                      = new Zonas();
        $all                        = $model->find()->all();

        return $all;
    }

    /**
     * CONTROLADOR PARA PRUEBAS, DEBE ELIMINARSE
     */
    public function actionSpruebas()
    {
        $model                      = new Zonas();
        $zonas                      = $model->getListaZonas();
        $id                         = $model->getIdZona('Continent');
        $nombre                     = $model->getNombreZona(1);
        $request                    = Yii::$app->request;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //Para devolver como respuesta RESTful
        $id                         = $request->get('id');
        if ($id == null) {
            return $zonas;
        }
        //return $id;
        $nombre = $model->getNombreZona($id);
        return $nombre;
    }

    /**
     * Updates an existing Zonas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param  integer               $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return mixed
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
     * Displays a single Zonas model.
     * @param  integer               $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Finds the Zonas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer               $id
     * @throws NotFoundHttpException if the model cannot be found
     * @return Zonas                 the loaded model
     */
    protected function findModel($id)
    {
        if (($model = Zonas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
