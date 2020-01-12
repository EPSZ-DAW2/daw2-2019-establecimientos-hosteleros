<?php

namespace app\controllers;

use Yii;
use app\models\Etiquetas;
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
    public function actionIndex($tipolocal=0)
    {   

        $query = Locales::find()->publico();
    
        //preparamos el proveedor de datos, para enviarselos a la vista que se va a generar
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => ['pageSize' => 25]
            ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider ]);
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
}
