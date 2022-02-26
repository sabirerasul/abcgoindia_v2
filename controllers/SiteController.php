<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\rbac\DbManager;

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
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    // public function actionLogin()
    // {
    //     $this->layout = '@app/themes/frontend/signlayout';
    //     $model = new LoginForm();
    //     return $this->render('login', ['model' => $model]);
    // }

    public function actionLogin()
    {
        $this->layout = '@app/themes/frontend/signlayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        //$model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Register action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        $this->layout = '@app/themes/frontend/signlayout';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new User();
        $model->scenario = 'userCreate';

        if ($model->load(Yii::$app->request->post())) {

            extract($_REQUEST);
            $username = $model->name.rand(1,789);
            $username = str_replace(' ', '', $username);
            $model->username = $username;

            $model->setPassword($model->password);
            $model->generateAuthKey();

            $model->created_at = date('Y-m-d h:i:s');
            $model->status = 1;

            $auth = new DbManager;
            $auth->init();
            $role = $auth->getRole('user');

            $model->user_role = $role->name;

            if($model->save()){

                $auth->assign($role, $model->getId());
                return $this->goHome();
            }
        }
        return $this->render('signup', ['model' => $model]);
    }

    /**
     * Forgot action.
     *
     * @return Response|string
     */
    public function actionForgot()
    {
        $this->layout = '@app/themes/frontend/signlayout';
        $model = new User();
        return $this->render('forgot', ['model' => $model]);
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
}
