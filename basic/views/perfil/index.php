<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">


<?php $style= <<<CSS

#content{
    font-size: 180%;
}
CSS;
 $this->registerCss($style);
?>



<p>De momento se muestra el usuario con id 1, hay que ponerse de acuerdo con el que haga el login para que guarde en sesion una variable id usuario para 
usarla aqui</p>
<body class="piezaTuPerfil">
  <div id="main">
    <!--<div id="content_header"></div>
    <div id="site_content">
      <div id="banner"></div>
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
             insert your sidebar items here 
            <h3>Latest News</h3>
            <h4>New Website Launched</h4>
            <h5>February 1st, 2014</h5>
            <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Useful Links</h3>
            <ul>
              <li><a href="#">link 1</a></li>
              <li><a href="#">link 2</a></li>
              <li><a href="#">link 3</a></li>
              <li><a href="#">link 4</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h3>Search</h3>
            <form method="post" action="#" id="search_form">
              <p>
                <input class="search" type="text" name="search_field" value="Enter keywords....." />
                <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
              </p>
            </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>-->
      <div id="content">
        <!-- insert the page content here -->
        <h1><b>Bienvenido a tu perfil <?php print($dataProvider->getModels()[0]['nombre']); ?></b>
!</h1>
        <p><b>Estos son tus datos.</b></p>
        <ul>
          <li><b>Email:</b> <?php print($dataProvider->getModels()[0]['email']) ?></li>
          <li><b>Nick:</b> <?php print($dataProvider->getModels()[0]['nick']) ?></li>
          <li><b>Nombre:</b> <?php print($dataProvider->getModels()[0]['nombre']) ?></li>
          <li><b>Apellidos:</b> <?php print($dataProvider->getModels()[0]['apellidos']) ?></li>
          <li><b>Direccion:</b> <?php print($dataProvider->getModels()[0]['direccion']) ?></li>
          <li><b>Fecha de registro:</b> <?php print($dataProvider->getModels()[0]['fecha_registro']) ?></li>
          <li><b>Estado de cuenta:</b> <?php ($dataProvider->getModels()[0]['bloqueado']==1) ? print("Bloqueada") :  print("Activa");?></li>
        </ul>


        <h2><b>Tus acciones</b></h2>
        <p><b>Estas son las acciones de tu cuenta sobre las que tienes acceso.</b></p>

          <div style="float:left;">
            <ul>
              <li><?= Html::a('Cambiar datos personales', ['update','id'=>$dataProvider->getModels()[0]['id']], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Alertas y Notificaciones', ['avisos'], ['class' => 'btn btn-success']) ?> </li><br>
              <li><?= Html::a('Establecimientos en Seguimiento', ['seguimientos'], ['class' => 'btn btn-success']) ?> </li><br>
            </ul>
        </div>

        <div style="float:left;">
            <ul>
              <li><?= Html::a('Convocatorias como Asistentes', ['convocatoriasporasistir'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Establecimientos propios', ['localespropios'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Valoraciones/Comentarios en Establecimientos', ['comentariosyvaloracionespropios'], ['class' => 'btn btn-success']) ?></li><br>

              

            </ul>
        </div>

        <div style="float:left;">
            <ul>
              <li><?= Html::a('Convocatorias/Quedadas Propias', ['convocatoriaspropias'], ['class' => 'btn btn-success']) ?></li><br>
              <li><?= Html::a('Creacion de avisos o incidencias', ['index'], ['class' => 'btn btn-success']) ?></li><br>              
              <li><?= Html::a('Valoraciones/Comentarios en Establecimientos', ['index'], ['class' => 'btn btn-success']) ?> </li><br>
            </ul>
        </div>
     
      </div>
    </div>
   
      
  </div>
</body>



</div>
