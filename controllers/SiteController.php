<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserDetail;
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
        $userDetail = new UserDetail();
        $userDetail->gender = 'male';

        if ($model->load(Yii::$app->request->post()) && $userDetail->load(Yii::$app->request->post())) {

            $user = $model->saveUser($model);
            if($user){
                $userDetail->user_id = $user->id;
                if($userDetail->saveUserDetail($userDetail)){

                    \Yii::$app->getSession()->setFlash('success', 'You have Successfully Registered, please re-login to active your account');
                    return $this->redirect('login');

                }
                
            }
        }
        return $this->render('signup', ['model' => $model, 'userDetail' => $userDetail]);
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionWhyJoin()
    {
        return $this->render('why-join');
    }

    // public function actionAssignUserRole()
    // {

    //     $model = User::find()->all();
        
    //     foreach ($model as $key => $value) {
            
    //         $auth = new DbManager;
    //         $auth->init();
    //         $role = $auth->getRole('user');
    //         $auth->assign($role, $value->id);
        
    //     }
        

        
    // }

}
