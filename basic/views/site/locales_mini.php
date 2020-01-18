<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div>
	<div style="float:right;" class="card col-md-4">
            <table class="table table-hover ">
                <tr>
                    <td><?= $model->titulo ?></td>
                    <td><?= $model->descripcion ?></td>
                    <td><?= $model->lugar ?></td>
                    <td> <?= Html::a('Ver', ['locales/view', 'id' => $model->id, 'actualizar' => 0], ['class' => 'btn btn-primary']) ?></td>
                </tr>
                <br>
            </table>
	</div>
</div>