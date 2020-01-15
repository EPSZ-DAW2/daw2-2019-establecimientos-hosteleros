<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\user;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<div class="usuarios-index">

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


CSS;
 $this->registerCss($style);
?>

  

</style>

  <div class='izquierda'>
      <div class="Tipo">
            <div class='izqTitulo'>
            <p>Mi cuenta</p>
          </div>
          <div class="links">
              <p><?=Html::a('Mis datos', ['/perfil/index','mostrar'=>1])?></p>
          </div>
          <div class="links">
              <p><?= Html::a('Cambiar datos personales', ['/perfil/update','id'=>$dataProviderPerfil->getModels()[0]['id'],'mostrarcabecera'=>TRUE]) ?></p>
          </div>
          <div class="links">
              <p><?= Html::a('Cambiar contraseña', ['/perfil/changepassword']) ?></p>
          </div>
      </div>
      


      <div class="Tipo">
          <div class='izqTitulo'>
            <p>Locales</p>
          </div>
          <div class="links">
              <?php if($hostelero != 0){?><p>
                        <?=Html::a('Mis establecimientos', ['/perfil/localespropios']); ?><br>
                        </p>
                  <?php }?>
          </div>
          <div class="links">
              <p><?=Html::a('Mis seguimientos', ['/perfil/seguimientos']) ?></p>
              <p><?php if($hostelero == 0){?>
                        <?= Html::a('Convertirse en Hostelero', ['hosteleros/create','mostrarcabecera' => TRUE]) ?><br>
                  <?php }else{?>
                        <?= Html::a('Añadir Establecimiento', ['locales/create', 'actualizar' => 0,'mostrarcabecera' => TRUE]) ?><br>
                  <?php }?></p>
          </div>
      </div>


      <div class="Tipo">
      <div class='izqTitulo'>
        <p>Mensajes</p>
      </div>
      <div class="links">
            <p><?=Html::a('Avisos', ['/perfil/avisos']) ?><?php if($avisos!=0){
                    ?>

                    <img src="../images/warning2.png" width="15" height="15">
                    <?php
                  } ?></p>
      </div>
      <div class="links">
          <p><?=Html::a('Mis comentarios', ['/perfil/comentariosyvaloracionespropios']) ?></p>
      </div>
      </div>



      <div class="Tipo">
    <div class='izqTitulo'>
        <p>Convocatorias</p>
      </div>
      <div class="links"> 
          <p><?=Html::a('Mis asistencias', ['/perfil/convocatoriasporasistir']) ?></p>
      </div>
      <div class="links">
          <p><?=Html::a('Mis convocatorias', ['/perfil/convocatoriaspropias']) ?></p>
      </div>
</div>

      <div class="Tipo">
      <div class='izqTitulo'>
        <p>Otros</p>
      </div>
      <div class="links">
          <p><?=Html::a('Darse de baja', ['/perfil/darsedebaja'],[
                                
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
          <p><?=Html::a('Validar locales', ['/perfil/validarlocales']) ?></p>
       </div>
      <?php } ?>

    </div>


