<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class GestionController extends \yii\web\Controller
{
    /**
     * @var string
     */
    public $layout = 'adminMain';

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['index'],
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['index'],
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }
}
