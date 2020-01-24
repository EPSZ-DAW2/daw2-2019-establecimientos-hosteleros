<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\UsuariosAvisos;
use app\models\Usuarios;
use app\models\Locales;
use app\models\LocalesComentarios;

use Yii;

class MostrarInbox extends Widget
{
    public $lista;

    public function run()
    {
		echo '<table class="table table-striped table-bordered">';
		$models = $this->lista->getModels();
		echo '<thead><hr><th class="col-lg-1">ID</th><th class="col-lg-2">Recibido el:</th><th class="col-lg-2">De</th><th class="col-lg-7">Mensaje</th></hr></thead>';
		echo '<tbody>';
		for($i = 0 ; $i < count($models); $i++){
			$model = $models[$i];
			$id = $model->id;
			$fecha = $model->fecha_aviso;
			$origen = Usuarios::findOne($model->origen_usuario_id)->nombre;
			$texto = $model->texto;
			
			echo '<tr>
					<td class="col-lg-1">'.$id.'</td>
					<td class="col-lg-2">'.$fecha.'</td>
					<td class="col-lg-2">'.$origen.'</td>
					<td class="col-lg-7">'.$texto.'</td>
				</tr>';			
		}
		echo '</tbody></table>';
		
    }
}

?>