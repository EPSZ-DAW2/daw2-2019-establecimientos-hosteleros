<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\user;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">


<?php $style= <<<CSS

.micuenta{
  background-image: url("../images/miperfil4.jpg");
  background-repeat: no-repeat;
  background-size: 100%,100%;
    width: 100%;
    height: 9.8vw;
  margin-top: 2vw;
}

.micuenta p{
  text-align: center;
  padding-top: 5%;
  font-size: 250%;
    font-weight: bold;
    text-shadow: 1.5px 0 #000;
    letter-spacing:2px;
    font-weight:bold;

}


.izquierda {
    background: #A7D6F3;

    height: 7.8vw;
    width: 100%;
    font-size: 100%;
}
.izquierda h1 {
    color: #fff;
}

.Tipo{
  float:left;
  padding-left: 0.2vw;
  width: 20%;
  height: 33%
}

.izqTitulo{

  background: linear-gradient(to bottom, #4466F1, #8ACCF5); 
  height: 2.3vw;

}

.izqTitulo p{

  font-weight: bold;
   text-align: left;
   padding-top:3%;
   padding-left:0.85vw;
   text-transform: uppercase;

       text-shadow: 1px 0 #000;
    letter-spacing:1px;
    font-weight:bold;


}

.links{
 background: linear-gradient(to bottom, #8ACCF5, #A7D6F3);
  padding-top:3%vw;
   padding-left:0.95vw;

    text-shadow: 0.5px 0 #000;
    letter-spacing:1px;
    font-weight:bold;
}
#content{
    font-size: 1800%;
}


CSS;
 $this->registerCss($style);
?>

<style type="text/css">
  

</style>
<body class="piezaTuPerfil">
    <div class='izquierda'>
      <div class="Tipo">
            <div class='izqTitulo'>
            <p>Mi cuenta</p>
          </div>
          <div class="links">
              <p>Mis datos</p>
          </div>
          <div class="links">
              <p><?= Html::a('Cambiar datos personales', ['update','id'=>$dataProvider->getModels()[0]['id']]) ?></p>
          </div>
          <div class="links">
              <p><?= Html::a('Cambiar contraseña', ['changepassword']) ?></p>
          </div>
      </div>
      


      <div class="Tipo">
          <div class='izqTitulo'>
            <p>Locales</p>
          </div>
          <div class="links">
              <p><?=Html::a('Establecimientos propios', ['localespropios']) ?></p>
          </div>
          <div class="links">
              <p>Mis seguimientos</p>
          </div>
      </div>


      <div class="Tipo">
      <div class='izqTitulo'>
        <p>Mensajes</p>
      </div>
      <div class="links">
          <p>Avisos</p>
      </div>
      <div class="links">
          <p>Mis valoraciones</p>
      </div>
      </div>



      <div class="Tipo">
    <div class='izqTitulo'>
        <p>Comentarios</p>
      </div>
      <div class="links">
          <p>Darse de baja</p>
      </div>
      <div class="links">
          <p>Contactar admin</p>
      </div>
</div>

      <div class="Tipo">
      <div class='izqTitulo'>
        <p>Otros</p>
      </div>
      <div class="links">
          <p>Darse de baja</p>
      </div>
      <div class="links">
          <p>Contactar admin</p>
      </div>

    </div>



    </div>


      <div class="micuenta">
    
        <p>Bienvenido a tu perfil</p>

    </div>

  <!--<div id="main">
      <div id="content">-->
        <!-- insert the page content here -->
        <!-- <h1><b>Bienvenido a tu perfil <?php print($dataProvider->getModels()[0]['nombre']); ?></b>
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
          <div>
              <div style="float:left;">
                <ul>
                  <li><?= Html::a('Cambiar datos personales', ['update','id'=>$dataProvider->getModels()[0]['id']], ['class' => 'btn btn-success']) ?></li><br>
                  <li><?= Html::a('Cambiar contraseña', ['changepassword'], ['class' => 'btn btn-success']) ?></li><br> 
                  <li><?= Html::a('Establecimientos en Seguimiento', ['seguimientos'], ['class' => 'btn btn-success']) ?> </li><br>
                </ul>
            </div>

            <div style="float:left;">
                <ul>
                  <li><?= Html::a('Convocatorias como Asistentes', ['convocatoriasporasistir'], ['class' => 'btn btn-success']) ?></li><br>
                   <li><?= Html::a('Valoraciones/Comentarios en Establecimientos', ['comentariosyvaloracionespropios'], ['class' => 'btn btn-success']) ?></li><br>
                  <li><?= Html::a('Establecimientos propios', ['localespropios'], ['class' => 'btn btn-success']) ?></li><br>
                 

                  

                </ul>
            </div>

            <div style="float:left;">
                <ul>
                  <li><?= Html::a('Convocatorias/Quedadas Propias', ['convocatoriaspropias'], ['class' => 'btn btn-success']) ?></li><br>  
                  <li><?= Html::a('Alertas y Notificaciones', ['avisos'], ['class' => 'btn btn-success']) ?> </li><br>
                  <li><?= Html::a('Darse de baja', ['darsedebaja'],[
                                
                                 'data' => [
                                     'method' => 'post',
                                      // use it if you want to confirm the action
                                      'confirm' => 'Estas seguro de esto? Se mandará una solicitud de baja a un admin.',
                                  ],
                                'class' => 'btn btn-success'
                                //'title' => Yii::t('app', 'lead-delete'),
                    ]) ?></li><br>            


                </ul>
            </div>

             <div style="float:left;">
                <ul>
                  <li><?= Html::a('Contactar con admin', ['/avisos/createnotificacionadmin'], ['class' => 'btn btn-success']) ?></li><br>
                  <?php if($hostelero == 0){?>
                        <li><?= Html::a('Convertirse en Hostelero', ['hosteleros/create'], ['class' => 'btn btn-success']) ?></li><br>
                  <?php }else{?>
                        <li><?= Html::a('A�adir Establecimiento', ['locales/create', 'actualizar' => 0], ['class' => 'btn btn-success']) ?></li><br>
                  <?php }?>
                </ul>
            </div>

        </div>
     
      <?php if(Yii::$app->user->identity->admin){ ?>
               <div style="float:left;">
                  <h3>Estas son tus acciones de administrador.</h3>
                        <ul>
                          <li><?= Html::a('Validar locales', ['validarlocales'], ['class' => 'btn btn-success']) ?></li><br>
                        </ul>
                    </div>
              </div>
      <?php } ?>

    </div>
   
      
  </div>-->
</body>



</div>
