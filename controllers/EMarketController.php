<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\business\Business;
use app\models\business\AssignmentCatalog;
use app\models\business\BusinessCatalog;

class EMarketController extends Controller
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
        $model = Business::find()->all();
        return $this->render('index', ['model' => $model]);
    }

    public function actionBusinessProfile($id = 0)
    {
        if(empty($id)){
            $this->redirect('index');
        }

        $model = Business::find()->where(['bus_username' => $id])->one();
        return $this->render('business-profile', ['model' => $model]);
    }

    public function actionCatalogs($id = 0)
    {
        if(empty($id)){
            $this->redirect('index');
        }

        $model = Business::find()->where(['bus_username' => $id])->one();
        $catalog = $model->assignmentCatalog;
        return $this->render('catalogs', ['model' => $catalog, 'businessModel' => $model]);
    }

    public function actionCatalogView($id = 0, $catalog_id = 0)
    {

        if(empty($id)){
            $this->redirect('index');
        }

        if(empty($catalog_id)){
            $this->redirect('index');
        }

        $businessModel = Business::find()->where(['bus_username' => $id])->one();
        $model = BusinessCatalog::find()->where(['id' => $catalog_id])->one();
        
        return $this->render('view-catalog', ['model' => $model, 'businessModel' => $businessModel]);
    }
   

}
