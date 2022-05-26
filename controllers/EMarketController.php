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
use yii\helpers\Url;

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
    public function actionIndex($query = '')
    {
        if(!empty($query)){
            $model = Business::find()
                        ->where(['is_deleted' => 0, 'status' => 1])
                        ->andFilterWhere([
                            'or',
                            ['like', 'ai_business.bus_name', $query],
                        ])
                        ->all();
        }else{
            $model = Business::find()->where(['is_deleted' => 0, 'status' => 1])->all();
        }
        
        return $this->render('index', ['model' => $model, 'query' => $query]);
    }

    public function actionBusinessProfile($id = 0)
    {
        if(empty($id)){
            $link = Url::to(['/e-market/']);
            return $this->redirect($link);
        }

        $model = Business::find()->where(['bus_username' => $id, 'is_deleted' => 0, 'status' => 1])->one();
        if(empty($model)){
            $link = Url::to(['/e-market/']);
            return $this->redirect($link);
        }
        return $this->render('business-profile', ['model' => $model]);
    }

    public function actionCatalog($id = 0, $query = '')
    {
        if(empty($id)){
            $link = Url::to(['/e-market/']);
            return $this->redirect($link);
        }

        $model = Business::find()->where(['bus_username' => $id])->one();
        $catalog = $model->assignmentCatalog;
        
        $catalogCatArr = [];
        $catalogArr = [];
        foreach ($catalog as $key => $value) {
            $catalog = $value->catalog;

            if(!empty($query)){
                if (!strpos($catalog->catalog_name, $query)) { 
                    continue;
                }
            }
            $catalogArr[] = $catalog;

            //if(count($catalogCatArr)>0){

                
                if (array_search($catalog->catalog_cat_id, array_column($catalogCatArr, 'id')) !== FALSE) {
                    
                    /*$catalogCatArr[] = [
                        'id' => $catalog->catalog_cat_id,
                        'title' => $catalog->businessCatalogCat->title,
                        //'catalog' => $catalogArr
                    ];*/
                    //$k = '';

                    

                    //$catalogCatArr[$k]['catalog'][] = $catalog;
                    
                  } else {
                    
                    $catalogCatArr[] = [
                        'id' => $catalog->catalog_cat_id,
                        'title' => $catalog->businessCatalogCat->title,
                        //'catalog' => $catalogArr
                    ];
                }

            // }else{

            //     $catalogArr[] = $catalog;
            //     $catalogCatArr[$key] = [
            //         'id' => $catalog->catalog_cat_id,
            //         'title' => $catalog->businessCatalogCat->title,
            //         'catalog' => $catalogArr
            //     ];
            // }
            
        }

        return $this->render('catalog', [
            'model' => $catalog, 
            'businessModel' => $model, 
            'catalogCatArr' => $catalogCatArr,
            'catalogArr' => $catalogArr,
            'id' => $id,
            'query' => $query
        ]);
    }

    public function actionView($id = 0, $catalogId = 0)
    {

        if(empty($id)){
            $link = Url::to(['/e-market/']);
            return $this->redirect($link);
        }

        if(empty($catalogId)){
            $link = Url::to(['/e-market/']);
            return $this->redirect($link);
        }

        $businessModel = Business::find()->where(['bus_username' => $id, 'is_deleted' => 0, 'status' => 1])->one();
        $model = BusinessCatalog::find()->where(['id' => $catalogId, 'status' => 1])->one();
        
        if(empty($businessModel) || empty($model)){
            $link = Url::to(['/e-market/']);
            return $this->redirect($link);
        }

        return $this->render('view-catalog', ['model' => $model, 'businessModel' => $businessModel, 'id' => $id]);
    }
   

}
