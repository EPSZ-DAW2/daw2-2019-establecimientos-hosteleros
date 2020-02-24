<?php

use yii\helpers\Html;
use app\models\Etiqueta;
use app\models\LocalesEtiquetas;

$etiquetasAsociadas=LocalesEtiquetas::find()->where(['local_id'=>$model->id])->all();
$palabras = array_merge(explode(' ',$model->titulo),explode(' ',$model->descripcion));
$etiquetas = array();
?>
<div class="locales-form">
<br>
<?=   Html::encode('Etiquetas ya asociadas: ');?>
<?php
	foreach ($etiquetasAsociadas as $value) {
		$etiqueta = Etiqueta::findOne($value->etiqueta_id);
		$nombre=$etiqueta->nombre;
		echo Html::encode($nombre.' ');
	}
	echo '<p>';
?>
<br>
<?=   Html::encode('Etiquetas sugeridas:');?>
<?= Html::beginForm(['/etiquetas/extraccion'], 'POST'); ?>
<?= Html::input('hidden', 'idlocal', $model->id); ?>
<?php foreach ($palabras as $p) {
    $m = Etiqueta::find()->where(['nombre' => $p])->one();
    if($m){
        if(in_array($p, $etiquetas)==false){
            $etiquetas[]=$p;
             echo  Html::checkbox($m->id, false, ['label' => $p]).'<p>';
        }
       
    }
    
}

  ?>
<div class="form-group">
    <?= Html::submitButton('Guardar etiquetas', ['class' => 'btn btn-primary']); ?>
</div>
<?= Html::endForm(); ?>
</div>
