<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\UsuariosAvisos;
use app\models\Usuarios;
use app\models\Locales;
use app\models\LocalesComentarios;

use Yii;

class ListarAviso extends Widget
{
    public $model;

    public function run()
    {
		$fecha_aviso = $this->model->fecha_aviso;
		$clase = UsuariosAvisos::tipoAviso($this->model->clase_aviso_id);
		$texto = $this->model->texto;
		$origen = is_object(Usuarios::findOne($this->model->origen_usuario_id)) ? Usuarios::findOne($this->model->origen_usuario_id)->nombre : false;
		$destino = is_object(Usuarios::findOne($this->model->destino_usuario_id)) ? Usuarios::findOne($this->model->destino_usuario_id)->nombre : false;
		$localid = is_object(Locales::findOne($this->model->local_id)) ? Locales::findOne($this->model->local_id)->titulo : false;
		$comid = is_object(LocalesComentarios::findOne($this->model->comentario_id)) ? LocalesComentarios::findOne($this->model->comentario_id)->texto : false;
		$fecha_lectura = $this->model->fecha_lectura;
		$fecha_aceptado = $this->model->fecha_aceptado;
			echo '<tr class="row"><th class="col-lg-4"><strong>Fecha del aviso</strong></th><td class="col-lg-8">'.$fecha_aviso.'</td></tr>';
			echo '<tr class="row"><th class="col-lg-4"><strong>Fecha de lectura</strong></th><td class="col-lg-8">'.$fecha_lectura.'</td></tr>';
			echo '<tr class="row"><th class="col-lg-4"><strong>Fecha de aceptacion</strong></th><td class="col-lg-8">'.$fecha_aceptado.'</td></tr>';
			echo '<tr class="row"><th class="col-lg-4"><strong>Tipo de aviso</strong></th><td class="col-lg-8">'.$clase.'</td></tr>';
			echo '<tr class="row"><th class="col-lg-4"><strong>Texto</strong></th><td class="col-lg-8">'.$texto.'</td></tr>';
			if ($origen != false)
				echo '<tr class="row"><th class="col-lg-4"><strong>Desde</strong></th><td class="col-lg-8">'.$origen.'</td></tr>';
			if ($destino != false)
				echo '<tr class="row"><th class="col-lg-4"><strong>A</strong></th><td class="col-lg-8">'.$destino.'</td></tr>';
			if ($localid != false)
				echo '<tr class="row"><th class="col-lg-4">Sobre el local</th><td class="col-lg-8">'.$localid.'</td></tr>';
			if ($comid != false)
				echo '<tr class="row"><th class="col-lg-4">Sobre el comentario</th><td class="col-lg-8">'.$comid.'</td></tr>';
		
		
		
    }

}

?>