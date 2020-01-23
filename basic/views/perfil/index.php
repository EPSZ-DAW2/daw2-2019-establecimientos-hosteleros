<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\user;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
?>
<div class="usuarios-index">
<?php $this->context->layout = 'FondosPerfil'; ?>

<?php $style= <<<CSS


.bienvenido{
  margin-top: 20vw;
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


#botonfondo1{
  float:left;
  float:bottom;

  width: 5vw;
  height: 3vw;  
  margin-left:1vw;

}

#botonfondo2{
    float:right;
  float:bottom;
  width: 5vw;
  height: 3vw;    
  margin-right:-2vw;
}


CSS;
 $this->registerCss($style);
?>



<body class="piezaTuPerfil">
    <div>
      <?= $this->render('PerfilCabecera', [
                //'searchModel' => $searchModel,
                'dataProviderPerfil' => $dataProviderPerfil,
                'hostelero' => $hostelero,
                'mostrar'=>$mostrar,
                'avisos'=>$avisos,
                'localesSinValidar' => $localesSinValidar,
                'comentariosSinValidar' => $comentariosSinValidar,
            ]); ?>
    </div>
      


      <div class="bienvenido">
    
        <p>Bienvenido a tu perfil</p>

        <?php 
              $session = Yii::$app->session;
              $layout = isset($_SESSION['layout']) ? $_SESSION['layout'] : 2;
              $nextlayout=$layout+1;
              $backlayout=$layout-1;
              
              if($layout>1){ ?>
                        <div id="botonfondo1">
                       <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span>', ['index','mostrar'=>0,'layout'=>$backlayout],['class' => 'btn btn-success']) ?>
                      </div>
              <?php }
              if($layout<3){ ?>
                        <div id="botonfondo2">
                    <?= Html::a('<span class="glyphicon glyphicon-arrow-right"></span>', ['index','mostrar'=>0,'layout'=>$nextlayout],['class' => 'btn btn-success']) ?>
                   </div>
              <?php }
         ?>



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

                  <p><?php if(($dataProviderPerfil->getModels()[0]['bloqueado'])!=0){
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
                          <span class="tit">Email: </span> <span class="cont"></b> <?php print($dataProviderPerfil->getModels()[0]['email']) ?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Nick: </span> <span class="cont"></b> <?php print($dataProviderPerfil->getModels()[0]['nick'])?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Nombre: </span> <span class="cont"></b> <?php print($dataProviderPerfil->getModels()[0]['nombre']) ?> <?php print($dataProviderPerfil->getModels()[0]['apellidos'])?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Fecha de nacimiento: </span> <span class="cont"></b> <?php print($dataProviderPerfil->getModels()[0]['fecha_nacimiento']) ?></span>
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
                          <span class="tit">Fecha de registro: </span> <span class="cont"></b> <?php print($dataProviderPerfil->getModels()[0]['fecha_registro']) ?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Estado de registro:</span> <span class="cont"></b> <?php if($dataProviderPerfil->getModels()[0]['confirmado']==1){
                            print("Confirmado");}else{print("Sin confirmar");}?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Ultimo acceso: </span> <span class="cont"></b><?php print($dataProviderPerfil->getModels()[0]['fecha_acceso'])?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Cantidad de accesos </span> <span class="cont"></b> <?php print($dataProviderPerfil->getModels()[0]['num_accesos']) ?></span>
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
                          <span class="tit">Direccion: </span> <span class="cont"></b> <?php if(isset(($dataProviderPerfil->getModels()[0]['direccion']))){
                            print(($dataProviderPerfil->getModels()[0]['direccion']));}else{print("No registrada.");}?></span>
                        </p>
                      </div>
                      <div class="contenido">
                        <p>
                          <span class="tit">Tu zona: </span> <span class="cont"></b> <?php if(($dataProviderPerfil->getModels()[0]['zona_id'])!=0){
                            print(($dataProviderPerfil->getModels()[0]['zona_id']));}else{print("No registrada.");}?></span>
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
                    <?php switch (($dataProviderPerfil->getModels()[0]['bloqueado'])) {
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

</body>



</div>
