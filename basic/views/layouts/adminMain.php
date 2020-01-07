<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>
<body>
<?php $this->beginBody()?>

<div class="wrap">
    <?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl'   => Yii::$app->homeUrl,
    'options'    => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items'   => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Locales', 'url' => ['/locales/index']],
        ['label' => 'Hosteleros', 'url' => ['/hosteleros/index']],
        ['label' => 'Gestión', 'url' => ['/gestion/index']],
        /*!Yii::$app->user->isGuest ? (
        ['label' => 'Locales', 'url' => ['/locales/index']]
        ):(['label' => '']),*/

        Yii::$app->user->isGuest ? (
            ['label' => 'Bienvenido Invitado']
        ) : (['label' => 'Tu perfil', 'url' => ['/perfil/index']]),

        Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
        ) : (
            '<li>'
            .Html::beginForm(['/site/logout'], 'post')
            .Html::submitButton(
                'Logout ('.Yii::$app->user->identity->username.')',
                ['class' => 'btn btn-link logout']
            )
            .Html::endForm()
            .'</li>'
        ),
    ],
]);
NavBar::end();
?>

    <div class="container">
        <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
        <?=Alert::widget()?>
        <div class="site-index">

  <!--Main layout-->

  <div class="row">

    <div class="col-md-3">
      <!-- SECCION DE USUARIOS -->
      <div class="widget-wrapper">
        <h4>Usuarios</h4>
        <div class="list-group">
            <!-- Cambia esto por tus respectivos controladores -->
            <?=Html::a('Zonas', ['zonas/index'], ['class' => 'list-group-item'])?>
            <?=Html::a('Areas de Moderación', ['usuarios-area-moderacion/index'], ['class' => 'list-group-item'])?>
        </div>
      </div>
        <!-- SECCION DE ZONAS -->
      <div class="widget-wrapper">
        <h4>Zonas</h4>
        <div class="list-group">
          <?=Html::a('Zonas', ['zonas/index'], ['class' => 'list-group-item'])?>
          <?=Html::a('Areas de Moderación', ['usuarios-area-moderacion/index'], ['class' => 'list-group-item'])?>
        </div>
      </div>
    </div>
        <!--Main column-->
    <div class="col-md-9">
        <?=$content?>
    </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?=Yii::$app->name;?> <?=date('Y')?>
             <?=html::a('About', ['/site/about'], ['class' => 'badge badge-secondary']);?>
             <?=html::a('Contact', ['/site/contact'], ['class' => 'badge badge-secondary']);?>
        </p>

        <p class="pull-right"><?=Yii::powered()?></p>
    </div>
</footer>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
