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

<?php

$session = Yii::$app->session;
$layout = isset($_SESSION['layout']) ? $_SESSION['layout'] : 0;


switch ($layout) {
    case '1':
        $url="../images/fondo9.jpg";
        break;
    case '2':
        $url="../images/fondo2.png";
        break;
    case '3':
        $url="../images/fondo10.jpg";
        break;
    default:
        $url="../images/fondo2.png";
        break;
}

$style= <<<CSS
    body{
        background-image: url($url);
    }
    CSS; 


 $this->registerCss($style);
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
if (isset(Yii::$app->user->identity->admin)) {
    $variable = 1;
} else {
    $variable = 0;
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items'   => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Gestión', 'url' => ['gestion/index'], 'visible' => $variable], //ponerlo solo para administradores
                                                                                     //['label' => 'Gestión', 'url' => ['gestion/index']],                         //ponerlo solo para administradores
        ['label' => 'Mantenimiento', 'url' => ['mantenimiento/index']],
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
        <?=$content?>
    </div>
</div>



<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
