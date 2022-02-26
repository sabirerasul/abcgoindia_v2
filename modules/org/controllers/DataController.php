<?php

namespace app\modules\org\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\rbac\DbManager;

use app\models\User;
use app\models\business\Business;
use app\models\business\BusinessCatalog;
class DataController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['login', 'error'], // Define specific actions
                        'allow' => true, // Has access
                        'roles' => ['org'], // '@' All logged in users / or your access role e.g. 'admin', 'user'
                    ],
                    [
                        'allow' => false, // Do not have access
                        'roles'=>['?'], // Guests '?'
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

    public function actionGetChartUserData()
    {
        extract($_REQUEST);
        if(empty($year)){
            $year = date('Y');
        }
        
        $model = User::find()->all();


        $monthArray = array(0,1,2,3,4,5,6,7,8,9,10,11);

        foreach ($model as $key => $value) {

            $yearData = date('Y', strtotime($value->created_at));

            $month = date('m', strtotime($value->created_at));

            $month = (int)ltrim($month, '0') - 1;

            if($year == $yearData){
                $created_at[$month][] = $value->created_at;
            }
        }

        foreach ($monthArray as $key1 => $value1) {         
            
            if(in_array($value1, $created_at)){

                /*
                echo "<pre>";
                print_r($created_at[$value1]);
                echo "</pre>";
                */
            
            }else{
                $created_at[$value1][] = 0;
            }
        }        

        foreach ($created_at as $key1 => $value1) {
            if(count($value1) == 1){
                $created_at[$key1] = (int)0;
            }else{
                $created_at[$key1] = (int)count($value1);     
            }       
        }

        ksort($created_at);

        $data = json_encode($created_at);

        //$data = str_replace('"','',$data);
        
        /*$data = implode(',',$created_at);

        $data = explode(',',$data);

        $data = json_encode($data);*/

        return $data;
    }

    public function actionGetChartBusinessData($year)
    {
        extract($_REQUEST);
        if(empty($year)){
            $year = date('Y');
        }
        
        $model = Business::find()->all();


        $monthArray = array(0,1,2,3,4,5,6,7,8,9,10,11);

        foreach ($model as $key => $value) {

            $yearData = date('Y', strtotime($value->created_at));

            $month = date('m', strtotime($value->created_at));

            $month = (int)ltrim($month, '0') - 1;

            if($year == $yearData){
                $created_at[$month][] = $value->created_at;
            }
        }

        foreach ($monthArray as $key1 => $value1) {         
            
            if(in_array($value1, $created_at)){

                /*
                echo "<pre>";
                print_r($created_at[$value1]);
                echo "</pre>";
                */
            
            }else{
                $created_at[$value1][] = 0;
            }
        }        

        foreach ($created_at as $key1 => $value1) {
            if(count($value1) == 1){
                $created_at[$key1] = (int)0;
            }else{
                $created_at[$key1] = (int)count($value1);     
            }       
        }

        ksort($created_at);

        $data = json_encode($created_at);

        //$data = str_replace('"','',$data);
        
        /*$data = implode(',',$created_at);

        $data = explode(',',$data);

        $data = json_encode($data);*/

        return $data;
    }

    public function actionGetChartItemsData($year)
    {
        if(empty($year)){
            $year = date('Y');
        }
        
        $model = BusinessCatalog::find()->all();


        $monthArray = array(0,1,2,3,4,5,6,7,8,9,10,11);

        foreach ($model as $key => $value) {

            $yearData = date('Y', strtotime($value->created_at));

            $month = date('m', strtotime($value->created_at));

            $month = (int)ltrim($month, '0') - 1;

            if($year == $yearData){
                $created_at[$month][] = $value->created_at;
            }
        }

        foreach ($monthArray as $key1 => $value1) {         
            
            if(in_array($value1, $created_at)){

                /*
                echo "<pre>";
                print_r($created_at[$value1]);
                echo "</pre>";
                */
            
            }else{
                $created_at[$value1][] = 0;
            }
        }        

        foreach ($created_at as $key1 => $value1) {
            if(count($value1) == 1){
                $created_at[$key1] = (int)0;
            }else{
                $created_at[$key1] = (int)count($value1);     
            }       
        }

        ksort($created_at);

        $data = json_encode($created_at);

        //$data = str_replace('"','',$data);
        
        /*$data = implode(',',$created_at);

        $data = explode(',',$data);

        $data = json_encode($data);*/

        return $data;
    }
}

?>