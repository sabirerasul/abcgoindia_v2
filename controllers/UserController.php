<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\UserAddress;
use app\models\UserDetail;
use app\models\UserHobby;
use app\models\UserProfileLink;
use app\models\business\Business;

use app\models\catalog\BusinessCatalog;

use app\models\catalog\BusinessCatalogLink;





class UserController extends Controller
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
        extract($_REQUEST);
        return $this->render('profile', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProfile()
    {
        extract($_REQUEST);
        return $this->render('profile', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionDatabase()
    {
        
        $host1 = "hindsathi.com";
        $user1 = "hindsath_ashutosh";
        $pass1 = "12@Ashutosh%%##";
        $database1 = "hindsath_abcgoind_business";
        $db = mysqli_connect($host1, $user1, $pass1, $database1);
    
        
        $business = BusinessCatalog::find()->all();
        
        foreach($business as $key => $value){
            
            // $q = "SELECT * FROM items WHERE id='$value->id'";
            
            // $r = mysqli_query($db, $q);
            
            // $row = mysqli_fetch_array($r);

            // if(!empty($row['link'])){
            //     $BusinessCatalogDetail = new BusinessCatalogLink();
            // $BusinessCatalogDetail->catalog_id = $value->id;
            // $BusinessCatalogDetail->link = $row['link'];
              
            //     if($BusinessCatalogDetail->save(false)){
            //         echo 1;
            //     }else{
            //         echo 0;
            //     }
            // }
   
            
            
        }
        
        die();
        
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}
