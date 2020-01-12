<?php

use app\models\LocalesSearch;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="locales-index">
    <?php Pjax::begin(); ?>
    <?php $searchModel = new LocalesSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    ?>
    
    <?php echo $this->render('_search2', ['model' => $searchModel]); ?>

   

    <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' =>  'locales_mini',
            'layout' => '{items}<div style="clear: both;"></div>{pager}',
        ]); ?>    
        
</div>
