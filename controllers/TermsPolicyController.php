<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * CadCamIndiaController implements the CRUD actions for CadCamIndia model.
 */
class TermsPolicyController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    public function actionIndex()
    {
        return $this->render('../');
    }


    public function actionTerms()
    {
        return $this->render('terms');
    }

    public function actionPolicy()
    {
        return $this->render('policy');
    }

    
}
