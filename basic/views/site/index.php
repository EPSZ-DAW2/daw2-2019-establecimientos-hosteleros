<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Menu;
use yii\widgets\ListView;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

        
        <h3> Locales </h3>
        <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Categoria Id</th>
        </tr>
        <?php foreach($model as $row): ?>
        <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->titulo ?></td>
            <td><?= $row->descripcion ?></td>
            <td><?= $row->categoria_id ?></td>
        </tr>
        <?php endforeach ?>
        </table>
  

    </div>
</div>
