<?php

namespace app\controllers;

use app\models\UsuariosAreaModeracion;
use app\models\UsuariosAreaModeracionSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UsuariosAreaModeracionController implements the CRUD actions for UsuariosAreaModeracion model.
 */
class UsuariosAreaModeracionController extends Controller
{
    /**
     * @var string
     */
    public $layout = 'adminMain';

    /**
     * Creates a new UsuariosAreaModeracion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuariosAreaModeracion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UsuariosAreaModeracion model.
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
     * Lists all UsuariosAreaModeracion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new UsuariosAreaModeracionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing UsuariosAreaModeracion model.
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
     * Displays a single UsuariosAreaModeracion model.
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
     * Finds the UsuariosAreaModeracion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer                $id
     * @throws NotFoundHttpException  if the model cannot be found
     * @return UsuariosAreaModeracion the loaded model
     */
    protected function findModel($id)
    {
        if (($model = UsuariosAreaModeracion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
