<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;


$this->title = Yii::t('app', 'Locales');


?>

<style>
    li {
      display:inline;
      margin: 1px;
}
</style>
<div class="locales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'locales_mini', //pieza que me tiene que pasar otro grupo de la ficha resumida
        'layout' => '<div class="container container-fluid">{items}</div> <div>{pager}{summary}</div>',

    ]); ?>    

    <?php Pjax::end(); ?>
</div>