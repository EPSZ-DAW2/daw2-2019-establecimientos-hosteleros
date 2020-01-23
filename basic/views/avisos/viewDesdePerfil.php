<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosAvisos */
$this->context->layout = 'FondosPerfil'; 
$this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>


<?php $style= <<<CSS


.carta{
  background-image: url("../images/fondo1.jpg");
  background-repeat: no-repeat;
  background-size: 100%,100%;
  width: 100%;
  height: 28.8vw;

  border: solid 0.2vw black;
}

.tipomensaje{
     border-top: solid 0.18vw black; 
    border-right: solid 0.18vw black; 
    border-left: solid 0.18vw black; 
    width: 17.5vw;
     margin-top: 7vw;
    padding:0.4vw;
    font-weight: bold;
    font-size: 1vw;

}

.manda{
    padding-left: 1vw;
    padding-top:1vw;
    font-weight: bold;
    font-size: 0.9vw;
}

.manda hr{
        height: 0.09vw;
  width: 40%;
  background-color: grey;
  margin-left:0.08vw;
  margin-top: 0.1vw;
}

.fondotexto{
  background-color:grey;
 
  opacity:10%;
  width: 52vw;
  height: 22.8vw;
  margin-left:3vw;
  border: solid 0.2vw black;
   float:left;
   position: absolute;
}

.texto{
    float:left;
    margin-left:4vw;
    margin-top:1.5vw;
     margin-right:5vw;
    font-size:0.89vw;
    width: 52vw;
  height: 18.8vw;
    overflow: auto;
}

.local{
    float:right;
    margin-right:3vw;
}


CSS;
 $this->registerCss($style);
?>




<div class="usuarios-avisos-view">

    <p>
        <!--<Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])  -->
    </p>

    <!-- /*DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fecha_aviso',
            'clase_aviso_id',
            'texto:ntext',
            'destino_usuario_id',
            'origen_usuario_id',
            'local_id',
            'comentario_id',
            'fecha_lectura',
            'fecha_aceptado',
        ],
    ])  -->

    <div class="tipomensaje">
            Tipo de mensaje: <?php switch ($model->clase_aviso_id) {
                case 'N':
                    print("Notificacion");
                    break;
                case 'A':
                    print("Aviso");
                    break;
                case 'D':
                    print("Denuncia");
                    break;
                case 'C':
                    print("Consulta");
                    break;
                case 'B':
                    print("Bloqueo");
                    break;
                case 'M':
                    print("Genérico");
                    break;
                
                default:
                    # code...
                    break;
            } ?>
    </div>
    <div class="carta">
        <div class="manda">
                    <?php if(Yii::$app->user->identity->admin){
                            if($userManda==null){
                                print("Mensaje del sistema");
                            }else{ ?>  
                                <?=Html::a($userManda->nombre, ['/usuarios/view?id='.$userManda->id,]);?>
                                &nbsp&nbsp&nbsp
                                < <?php print($userManda->email) ?> > 
                            <?php }

                            
                        ?>


                    <?php
                    }else{
                        if($userManda==null){
                                print("Mensaje del sistema");
                            }else{
                                  print($userManda->nombre) ; ?>
                                  <?php 
                            }
                        } ?>
                         &nbsp&nbsp&nbsp
                         <?php print($model->fecha_aviso);
                         if($model->local_id!=0){
                                ?>
                                <div class="local">
                                    Local relacionado: 
                                    <?=Html::a($local->titulo, ['/locales/view?id='.$model->local_id,]);?>
                                </div>
                                <?php
                            }
   ?>      
                    <hr>
        </div>
        <div class="fecha">
                      
        </div>

        <div class="texto">
            <?php  print($model->texto) ?>
        </div>

        <div class="fondotexto">
            
        </div>


    </div>

</div>
