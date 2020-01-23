<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

use Yii;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class ListarImagenes extends Widget
{
	
    public $message;

    public function run()
    {
		$models = array_values($this->message->getModels());
		$keys = $this->message->getKeys();
		$rows = [];
		
		$i = 0;
		
		foreach ($models as $model)
		{
			$imagen = $this->message->getModels()[$i]['imagen_id'];
			
			echo Html::img(Yii::$app->request->baseUrl."/uploaded/".$imagen,['class' => 'img-rounded', 'height' => 150]);
			
			echo "&nbsp&nbsp";
			
			$i++;
		}
		
    }

}