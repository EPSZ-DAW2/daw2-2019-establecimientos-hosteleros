<?php

namespace app\controllers;

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
}
