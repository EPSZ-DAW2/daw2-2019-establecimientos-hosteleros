<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;

?>

<div class="local-search">

    <?php $form = ActiveForm::begin([
        'action' => ['busquedacategorias'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?php

        //generar un array con todas las categorías indexadas.

            $categoria = Categoria::find()->orderBy(['nombre' => SORT_ASC])->all();
            $categorialista=ArrayHelper::map($categoria,'id','nombre');

            $currentUserId="Categorias";

        //generar input de tipo dropdown

            echo Html::dropDownList('id', 'id', $categorialista,array('prompt'=>'Selecciona una categoría...'));

        ?>


        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
       



    <?php ActiveForm::end(); ?>

</div>
