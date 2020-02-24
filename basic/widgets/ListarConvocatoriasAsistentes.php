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

class ListarConvocatoriasAsistentes extends Widget
{
	   public $model;

    public function run()
    {
    	$id = $this->model->id;
		$localid = is_object(Locales::findOne($this->model->local_id)) ? Locales::findOne($this->model->local_id)->titulo : false;
		$convocatoria = is_object(LocalesConvocatorias::findOne($this->model->convocatoria_id)) ? LocalesConvocatorias::findOne($this->model->convocatoria_id)->texto : false;
		$usuario = is_object(Usuarios::findOne($this->model->usuario_id)) ? Usuarios::findOne($this->model->usuario_id)->nombre : false;
		$fecha_alta = $this->model->fecha_alta;

		echo '<tr class="row"><th class="col-lg-4"><strong>Id Asistencia</strong></th><td class="col-lg-8">'.$id.'</td></tr>';
		if ($localid != false)
				echo '<tr class="row"><th class="col-lg-4"><strong>Local</strong></th><td class="col-lg-8">'.$localid.'</td></tr>';
		if ($convocatoria != false)
				echo '<tr class="row"><th class="col-lg-4"><strong>Texto descriptivo</strong></th><td class="col-lg-8">'.$convocatoria.'</td></tr>';
		if ($usuario != false)
				echo '<tr class="row"><th class="col-lg-4"><strong>Nombre del Usuario</strong></th><td class="col-lg-8">'.$usuario.'</td></tr>';
		echo '<tr class="row"><th class="col-lg-4"><strong>Fecha de alta</strong></th><td class="col-lg-8">'.$fecha_alta.'</td></tr>';
		  }

}

?>