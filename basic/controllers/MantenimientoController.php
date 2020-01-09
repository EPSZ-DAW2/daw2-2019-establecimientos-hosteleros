<?php

namespace app\controllers;

class MantenimientoController extends \yii\web\Controller
{
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
