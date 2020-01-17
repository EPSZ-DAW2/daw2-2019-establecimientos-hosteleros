<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aqui te puedes dar de baja';
$this->params['breadcrumbs'][] = $this->title;

?>
<?php $this->context->layout = 'FondosPerfil'; ?>
	<?php if($exito) {?>
   <h3>Se ha mandado una solicitud de baja al administrador, deberá esperar hasta que sea aceptada.</h3>
<?php }else{ ?>
	<h3>Ha habido algun error al mandar la solicitud, por favor vuelva a intentarlo.</h3>
<?php } ?>
   <?= Html::a('Volver a tu perfil', ['index'], ['class' => 'btn btn-success']) ?>