<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 17.09.2018
 * Time: 23:07
 */

namespace floor12\backup\controllers;

use floor12\backup\logic\BackupCreate;
use floor12\backup\logic\BackupRestore;
use floor12\backup\models\Backup;
use floor12\backup\models\BackupFilter;
use Throwable;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\StaleObjectException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AdminController extends Controller
{
    /**
     * @var Backup
     */
    protected $model;

    /**
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function actionBackup()
    {
        $config_id = Yii::$app->request->post('config_id');
        if (!Yii::$app->getModule('backup')->checkConfig($config_id)) {
            throw new NotFoundHttpException(Yii::t('app.f12.backup', 'Backup config is not found.'));
        }

        Yii::createObject(BackupCreate::class, [$config_id])->run();
    }

    /**
     * @throws NotFoundHttpException
     * @throws Throwable
     * @throws StaleObjectException
     * @return string
     */
    public function actionDelete()
    {
        $this->getBackup((int) Yii::$app->request->post('id'));
        $this->model->delete();
        $this->model->delete();
    }

    /**
     * @param  $id
     * @throws NotFoundHttpException
     */
    public function actionDownload($id)
    {
        $this->getBackup((int) $id);
        Yii::$app->response->sendFile($this->model->getFullPath());
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new BackupFilter();
        return $this->render('index', [
            'model'   => $model,
            'configs' => Yii::$app->getModule('backup')->configs ?: [],
        ]);
    }

    /**
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     */
    public function actionRestore()
    {
        $this->getBackup((int) Yii::$app->request->post('id'));
        Yii::createObject(BackupRestore::class, [$this->model])->run();
    }

    /**
     * @inheritDoc
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [Yii::$app->getModule('backup')->administratorRoleName],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'index'   => ['get'],
                    'delete'  => ['delete'],
                    'backup'  => ['post'],
                    'restore' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->layout = Yii::$app->getModule('backup')->adminLayout;
        parent::init();
    }

    /**
     * @param  int                     $id
     * @throws NotFoundHttpException
     */
    protected function getBackup(int $id)
    {
        $this->model = Backup::findOne($id);
        if (!$this->model) {
            throw new NotFoundHttpException(Yii::t('app.f12.backup', 'Backup is not found.'));
        }

    }
}
