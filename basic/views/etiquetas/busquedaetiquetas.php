<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Etiquetas;
use app\models\LocalesEtiquetas;

$this->title = 'Filtrar por etiquetas';
//$this->params['breadcrumbs'][] = $this->title;
?>



    <h2><?= Html::encode($this->title) ?></h2>
  <?php 
       $etiquetas = Etiquetas::find()->all();
       
        foreach ($etiquetas as $key => $value) {
            echo '<p>';
            
            //echo $value['id'];
            echo Html::a(Yii::t('app', $value['nombre']), ['site/index','etiqueta_id'=>$value['id']]);
             // echo Html::a(Yii::t('app', $value['nombre']), ['view?id='.$value['id']], ['class' => 'btn btn-success']);
            echo '</p>';
        }

        if(isset(Yii::$app->request->queryParams['etiqueta_id'])){
             $localesEtiquetas = LocalesEtiquetas::find()->where(['etiqueta_id'=>Yii::$app->request->queryParams['etiqueta_id']])->all();
             foreach ($localesEtiquetas as $key => $value) {
                    echo '<p>';
                    
                    //echo $value['id'];
                    echo "aqui la ficha resumen del local ".$value['local_id'];
                     // echo Html::a(Yii::t('app', $value['nombre']), ['view?id='.$value['id']], ['class' => 'btn btn-success']);
                    echo '</p>';
            }
        }
    ?>
    

