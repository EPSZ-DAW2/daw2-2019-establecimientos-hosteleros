<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\UsuariosAvisos;
use app\models\Usuarios;
use app\models\Locales;
use app\models\LocalesConvocatoriasAsistentes;
use app\models\LocalesConvocatorias;

use Yii;

class ListarConvocatorias extends Widget
{
	public $id;
    public function run()
    {
    	$lista = LocalesConvocatorias::find()->where(['local_id' => $this->id])->all();
    	for ($i = 0; $i < count($lista); $i++){
    		echo '<div>';
    		echo '#'.$i.' - '.$lista[$i]->texto;
    		 ?>
    		 <?=Html::a('Asistir', ['seguirconvocatoria', 'convocatoria_id' => $lista[$i]->id], ['class' => 'btn btn-primary'])?>
    		 <?php
    		echo '</div><br>';
    	}
    }

}

?>