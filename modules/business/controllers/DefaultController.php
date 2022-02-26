<?php

namespace app\modules\business\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\rbac\DbManager;

/**
 * Default controller for the `business` module
 */
class DefaultController extends Controller
{
    public $layout = '@app/themes/backend/main';

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
                            'roles' => ['user'], // '@' All logged in users / or your access role e.g. 'admin', 'user'
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
                        'delete' => ['POST'],
                    ],
                ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}