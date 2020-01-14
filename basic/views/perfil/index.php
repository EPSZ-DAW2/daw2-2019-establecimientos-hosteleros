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


.bienvenido{
  background-image: url("../images/miperfil4.jpg");
  background-repeat: no-repeat;
  background-size: 100%,100%;
    width: 100%;
    height: 9.8vw;
  margin-top: 2vw;
}

.bienvenido p{
  text-align: center;
  padding-top: 5%;
  font-size: 2.2vw;
    font-weight: bold;
    text-shadow: 1.5px 0 #000;
    letter-spacing:2px;
    font-weight:bold;

}

.misdatos{
  background-image: url("../images/miperfil5.jpg");
  background-repeat: no-repeat;
  background-size: 100%,100%;
    width: 100%;
    height: 9.8vw;
  margin-top: 2vw;
}

.misdatos .tiposdato{
  padding-left: 0.2vw;
  width: 20%;
  height: 100%;
  float:left;
}

.misdatos .tiposdato .tipodato{
    font-weight: bold;
    text-align:center;
    padding-top:0.5vw;
    font-size: 0.79vw;
    background: linear-gradient(to bottom, #A7D6F3, #8ACCF5); 
  height: 25%;
}


.datos{
  width: 80%;
  height: 100%;
  float:right;
}

.datos .titulo{
  padding-left: 2vw;
  padding-top:0.5vw;
  font-weight: bold;
  font-size: 0.89vw;
}
.datos .titulo hr{
    height: 0.12vw;
  width: 60%;
  background-color: grey;
  margin-left:0.12vw;
  margin-top: -0.45vw;
}

.datos .contenedordatos{
  height: 6.8vw;
  width: 80%;
  margin-top:-0.42vw; 
  margin-left: 2vw;
  border:solid grey 0.1vw;
  padding-top:0vw; 
}

.datos .contenedordatos .tit{
  font-weight:bold;
  font-size: 0.87vw;
  padding-left:1vw;
  padding-top:0.3vw;  
}

.datos .contenedordatos .cont{
  font-size: 0.85vw;

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
  font-size: 0.89vw;
   text-align: left;
   padding-top:3%;
   padding-left:0.85vw;
   text-transform: uppercase;

       text-shadow: 1px 0 #000;
    letter-spacing:1px;
    font-weight:bold;


}

.links{
  font-size: 0.79vw;
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
              <p><?=Html::a('Mis datos', ['index','mostrar'=>1])?></p>
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
              <p><?=Html::a('Mis seguimientos', ['seguimientos']) ?></p>
          </div>
      </div>


      <div class="Tipo">
      <div class='izqTitulo'>
        <p>Mensajes</p>
      </div>
      <div class="links">
            <p><?=Html::a('Avisos', ['avisos']) ?><?php if($avisos!=0){
                    ?>

                    <img src="../images/warning2.png" width="15" height="15">
                    <?php
                  } ?></p>
      </div>
      <div class="links">
          <p><?=Html::a('Mis comentarios', ['comentariosyvaloracionespropios']) ?></p>
      </div>
      </div>



      <div class="Tipo">
    <div class='izqTitulo'>
        <p>Convocatorias</p>
      </div>
      <div class="links"> 
          <p><?=Html::a('Mis asistencias', ['convocatoriasporasistir']) ?></p>
      </div>
      <div class="links">
          <p><?=Html::a('Mis convocatorias', ['convocatoriaspropias']) ?></p>
      </div>
</div>

      <div class="Tipo">
      <div class='izqTitulo'>
        <p>Otros</p>
      </div>
      <div class="links">
          <p><?=Html::a('Darse de baja', ['darsedebaja'],[
                                
                                 'data' => [
                                     'method' => 'post',
                                      // use it if you want to confirm the action
                                      'confirm' => 'Estas seguro de esto? Se mandará una solicitud de baja a un admin.',
                                  ]]) ?></p>
      </div>
      <div class="links">
          <p><?=Html::a('Contactar admin', ['/avisos/createnotificacionadmin']) ?></p>
      </div>


      <?php if(Yii::$app->user->identity->admin){ ?>
        <div class="links">
          <p><?=Html::a('Validar locales', ['validarlocales']) ?></p>
       </div>
      <?php } ?>

    </div>



    </div>


      <div class="bienvenido">
    
        <p>Bienvenido a tu perfil</p>

    </div>


    <?php if($mostrar!=0){?>
          <div class="misdatos">
            <div class="tiposdato">
                <div class="tipodato">
                  <p><?= Html::a('Datos personales', ['index','mostrar'=>1]) ?></p>
                </div>
                <div class="tipodato">
                  <p><?= Html::a('Datos de registro', ['index','mostrar'=>2]) ?></p>
                </div>
                <div class="tipodato">
                  <p><?= Html::a('Direcciones', ['index','mostrar'=>3]) ?></p>
                </div>
                <div class="tipodato">

                  <p><?php if(($dataProvider->getModels()[0]['bloqueado'])!=0){
                    ?>
                    <img src="../images/warning2.png" width="20" height="20">
                    <?php
                  } ?><?= Html::a('Incidencias de bloqueo', ['index','mostrar'=>4]) ?></p>
                </div>
            </div>

            <?php switch ($mostrar) {
              case '1':
                ?>
                <div class=datos>
                    <div class=titulo>
                      <p>Datos personales</p>
                      <hr>
                    </div>

                    <div class=contenedordatos>
                      <div class="contenido">
                        <p>
                          <span class="tit">Email: </span> <span class="cont"></b> <?php print($dataProvider->getModels()[0]['email']) ?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Nick: </span> <span class="cont"></b> <?php print($dataProvider->getModels()[0]['nick'])?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Nombre: </span> <span class="cont"></b> <?php print($dataProvider->getModels()[0]['nombre']) ?> <?php print($dataProvider->getModels()[0]['apellidos'])?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Fecha de nacimiento: </span> <span class="cont"></b> <?php print($dataProvider->getModels()[0]['fecha_nacimiento']) ?></span>
                        </p>
                      </div>

                    </div>
                </div>
                <?php 
                break;
              case '2':
                ?>
                                <div class=datos>
                    <div class=titulo>
                      <p>Datos de registro</p>
                      <hr>
                    </div>

                    <div class=contenedordatos>
                      <div class="contenido">
                        <p>
                          <span class="tit">Fecha de registro: </span> <span class="cont"></b> <?php print($dataProvider->getModels()[0]['fecha_registro']) ?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Estado de registro:</span> <span class="cont"></b> <?php if($dataProvider->getModels()[0]['confirmado']==1){
                            print("Confirmado");}else{print("Sin confirmar");}?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Ultimo acceso: </span> <span class="cont"></b><?php print($dataProvider->getModels()[0]['fecha_acceso'])?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Cantidad de accesos </span> <span class="cont"></b> <?php print($dataProvider->getModels()[0]['num_accesos']) ?></span>
                        </p>
                      </div>

                    </div>
                </div>
                <?php 
                break;
                case '3':
                ?>
                          <div class=datos>
                    <div class=titulo>
                      <p>Direcciones</p>
                      <hr>
                    </div>

                    <div class=contenedordatos>
                      <div class="contenido">
                        <p>
                          <span class="tit">Direccion: </span> <span class="cont"></b> <?php if(isset(($dataProvider->getModels()[0]['direccion']))){
                            print(($dataProvider->getModels()[0]['direccion']));}else{print("No registrada.");}?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Tu zona: </span> <span class="cont"></b> <?php if(($dataProvider->getModels()[0]['zona_id'])!=0){
                            print(($dataProvider->getModels()[0]['zona_id']));}else{print("No registrada.");}?></span>
                        </p>
                      </div>
                    </div>
                </div>
                <?php 
                break;
                case '4':
                ?>
                <div class=datos>
                    <div class=titulo>
                      <p>Incidencias de bloqueo</p>
                      <hr>
                    </div>
                    <?php switch (($dataProvider->getModels()[0]['bloqueado'])) {
                      case '0':
                        ?>
                        <div class=contenedordatos>
                          <div class="contenido">
                            <p>
                              <br>
                              <span class="tit">Tu cuenta no esta bloqueada</span>
                            </p>
                          </div>
                        </div>
                        <?php
                        break;

                        case '1':
                        ?>
                        <div class=contenedordatos>
                          <div class="contenido">
                            <p>
                              <br>
                              <span class="tit">Tu cuenta fue bloqueada por el sistema de accesos. Pongase en contacto con un admin.</span>
                            </p>
                          </div>
                        </div>
                       <?php
                      break;


                       case '2':
                       ?>
                        <div class=contenedordatos>
                          <div class="contenido">
                            <p>
                              <br>
                              <span class="tit">Tu cuenta fue bloqueada por la administracion. Pongase en contacto con un admin.</span>
                            </p>
                          </div>
                        </div>
                       <?php
                       break;
                      default:
                        # code...
                        break;
                    } ?>
                    
                </div>
                <?php 
                break;
              default:
                # code...
                break;
            } ?>
        </div>
   <?php } ?>





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
