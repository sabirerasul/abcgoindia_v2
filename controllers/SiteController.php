<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Items;
use app\models\business\Business;
use app\models\business\AssignmentCatalog;
use app\models\business\BusinessCatalogLink;
use app\models\UserDetail;
use app\models\LoginForm;
use app\models\ForgotForm;
use app\models\ContactForm;
use app\models\ForgotVerify;
use yii\rbac\DbManager;
use yii\helpers\Url;

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
        $model = new ForgotForm();

        
        if ($model->load(Yii::$app->request->post())) {
            $getEmail = $model->email;

            if(is_numeric($getEmail)){
                $getModel = User::find()->where(['mobile'=> $getEmail])->one();
            }else{
                $m = UserDetail::find()->where(['email'=> $getEmail])->one();
                $getModel = $m ? $m->user : '';
            }
            
            if(!empty($getModel)){

                if(!empty($getModel->userDetails->email)){

                    $getModel->password_reset_token = Yii::$app->security->generateRandomString();
                    $getModel->save();

                    $forgotUrl = Url::to(['/site/forgot-verify/', 't' => $getModel->password_reset_token]);

                    $html = "
                    
                    <p>Hi, {$getModel->name}.<br> Please click this link to reset your password <a href='{$forgotUrl}'>click here</a>
                    ";

                    Yii::$app->mailer->compose()
                    ->setFrom('from@domain.com')
                    ->setTo($getModel->userDetails->email)
                    ->setSubject('Password Recovey mail - Abcgo India')
                    ->setTextBody('Plain text content')
                    ->setHtmlBody($html)
                    ->send();

                    $url = Url::to(['/site/forgot-mailed/', 'mail' => $getEmail]);
                    return $this->redirect($url);
                }else{
                    $model->addError("email","We not found your mail, please contact whatsapp 9807559692");
                }
                
            }else{
                $model->addError('email','There is some glitch with your response');
            }
       
        }
        return $this->render('forgot', ['model' => $model]);
    }

    public function actionForgotMailed($mail){
        return $this->render('forgot-mailed', ['mail' => $mail]);
    }

    public function actionForgotVerify($t){

        $model = new ForgotVerify();

        if ($model->load(Yii::$app->request->post())) {
            
            var_dump($t);

            $u = User::find()->where(['password_reset_token' => $t])->one();

            if($u){

                $u->setPassword($model->password);
                if($u->save()){
                    $ul = Url::to(['site/forgot-success']);
                    return $this->redirect($ul);
                }else{
                    $model->addError('password', 'Try again later after some time');
                }

            }else{
                $model->addError('password', 'Token missmatch');
            }
        }

        return $this->render('forgot-verify', ['model' => $model, 't' => $t]);
    }

    public function actionForgotSuccess(){
        return $this->render('forgot-successful');
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

    // public function actionAssignItems()
    // {

    //     $model = Items::find()->all();
        
    //     foreach ($model as $key => $value) {
    //         $m = new AssignmentCatalog();

    //         $m->catalog_id = $value->id;
    //         $m->business_id = $value->bid;
            
    //         if($m->save()){
    //             echo "done<br>";
    //         }else{

    //             var_dump($m->errors);
    //             echo "error<br>";
    //         }
            
    //     }    
    // }

    // public function actionUpdateQrcode()
    // {
    //     $model = Business::find()->all();    
    //     foreach ($model as $key => $value) {
            
    //         $iddat = "https://abcgoindia.com/e-market/".$value->bus_username;
    //         $root_path = Yii::getAlias('@webroot').'/web/img/business/qr-code/';
    //         $img_url = 'https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$iddat;
    //         $labelle_name = $value->bus_qrcode;
    //         $x = $this->grabImage($img_url, $root_path.$labelle_name);
            
    //         if($x){
    //             echo "done<br>";
    //         }else{
    //             echo "error<br>";
    //         }
    //     }    
    // }
    public function grabImage($url,$saveto){
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $raw=curl_exec($ch);
        curl_close ($ch);

        if(file_exists($saveto)){
            unlink($saveto);
        }
        $fp = fopen($saveto,'x');
        fwrite($fp, $raw);
        fclose($fp);
    }

    public function actionOffile()
    {
        echo "You are offline";
    }

}