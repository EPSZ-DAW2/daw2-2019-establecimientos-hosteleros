<?php

namespace app\controllers;

use Yii;
use app\models\Etiquetas;
use app\models\EtiquetasSearch;
use app\models\LocalesEtiquetas;
use app\models\LocalesEtiquetasSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\siteSearch;
use yii\helpers\Html;
use app\models\Locales;
use app\models\LocalesSearch;
use app\models\LocalesComentarios;
use app\models\LocalesComentariosSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($filtro=0)
    {   
        
        
        if(Yii::$app->user->isGuest){
        $query = Locales::find()->publico();
    
        //preparamos el proveedor de datos, para enviarselos a la vista que se va a generar
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'filtro' => $filtro    
                ]);
        
        }elseif(!Yii::$app->user->isGuest){
            /*Filtro por locales en seguimiento*/
            $usuario=Yii::$app->user->id;
            $sql = "SELECT locales.* FROM (locales INNER JOIN usuarios_locales ON(locales.id=usuarios_locales.local_id)) WHERE usuarios_locales.usuario_id=".$usuario." GROUP BY locales.id";
            $query = Locales::findBySql($sql); 
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);
            /*Fin de filtro por locales en seguimiento*/
            /*Filtro por categorias en seguimiento*/
            $sql2 = "SELECT locales.* FROM (locales INNER JOIN usuarios_categorias ON (locales.categoria_id=usuarios_categorias.categoria_id)) WHERE usuarios_categorias.usuario_id=".$usuario;
            $query2 = Locales::findBySql($sql2);
            $dataProvider2 = new ActiveDataProvider([
                'query' => $query2,
                'pagination' => ['pageSize' => 25]
            ]);
            /*Fin de filtro por categorias en seguimiento*/
            /*Filtro por etiquetas en seguimiento*/
            $sql3 = "SELECT locales.* FROM (locales INNER JOIN locales_etiquetas ON (locales.id=locales_etiquetas.local_id)) INNER JOIN usuarios_etiquetas ON (locales_etiquetas.etiqueta_id=usuarios_etiquetas.etiqueta_id) WHERE usuarios_etiquetas.usuario_id=".$usuario;
            $query3 = Locales::findBySql($sql3);
            $dataProvider3 = new ActiveDataProvider([
                'query' => $query3,
                'pagination' => ['pageSize' => 25]
            ]);
                    
            
            /*Fin de filtro por etiquetas en seguimiento*/
                
                return $this->render('usuario', [
                'dataProvider' => $dataProvider, 
                'dataProvider2' => $dataProvider2,
                'dataProvider3' => $dataProvider3,
                'filtro' => $filtro,    
                 ]);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    //acción para listar todos los locales, a excepcion de los no visibles, los terminados o bloqueados

    public function actionBusquedasimple($texto){

        //preparamos la consulta, encontrando todos los locales, que ya vendran filtrados por
        //los que estan visibles al publico   
            $query = Locales::find()->busqueda($texto);
    
        //preparamos el proveedor de datos, para enviarselos a la vista que se va a generar
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);

           

        //Renderizamos la vista de los locales
            return $this->render('index', [
                'dataProvider' => $dataProvider,           
            ]);
    }

    public function actionBusquedaavanzada($titulo, $descripcion, $lugar, $url, $sumaValores)
    {
        //preparamos la consulta, encontrando todos los locales, que ya vendran filtrados por
        //los que estan visibles al publico   
            $query = Locales::find()->busquedaAvanzada($titulo, $descripcion, $lugar, $url, $sumaValores);
    
        //preparamos el proveedor de datos, para enviarselos a la vista que se va a generar
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);

           

        //Renderizamos la vista de los locales
            return $this->render('index', [
                'dataProvider' => $dataProvider,           
            ]);
    }




    public function actionBusquedacategoria($id_padre){

    
            $query = Locales::find()->categoria($id_padre);
            //echo $query->createCommand()->getRawSql();
  
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);

           

        //Renderizamos la vista de los locales
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'id_padre' => $id_padre          
            ]);
    }

    public function actionBusquedaetiqueta($etiqueta_id){

            
            $sql = "SELECT `locales`.* FROM 
            `locales_etiquetas`,`locales` 
            WHERE  `locales_etiquetas`.`etiqueta_id`=".$etiqueta_id."
            AND `locales_etiquetas`.`local_id` = `locales`.`id`";

            $query = Locales::findBySql($sql); 
            //echo $query;
            
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);

        //Renderizamos la vista de los locales
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'etiqueta_id' => $etiqueta_id          
            ]);
    }
}
