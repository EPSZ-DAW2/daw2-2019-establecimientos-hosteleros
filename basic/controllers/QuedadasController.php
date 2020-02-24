<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class QuedadasController extends \yii\web\Controller
{
    public function behaviors()
    {

       return [

             'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @var string
     */
    public $layout = 'main';

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
