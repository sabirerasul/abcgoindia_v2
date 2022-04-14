<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\CadCamIndia;
use yii\widgets\ActiveForm;
use app\models\CadCamIndiaSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class CadCamIndiaController extends Controller
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


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionSuccess()
    {
        $this->layout = '@app/themes/frontend/signlayout';
        $model = new CadCamIndia();
        return $this->render('success', [
            'model' => $model,
        ]);
    }

/**
     * Lists all CadCamIndia models.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $searchModel = new CadCamIndiaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CadCamIndia model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CadCamIndia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = '@app/themes/frontend/signlayout';
        $model = new CadCamIndia();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            if($model->save()){
                \Yii::$app->getSession()->setFlash('success', 'You have Successfully Registered');
                return $this->redirect('create');
            }else{
                \Yii::$app->getSession()->setFlash('error', 'Technical error!!! please try again later');
                return $this->redirect('create');
            }
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CadCamIndia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Deletes an existing CadCamIndia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CadCamIndia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CadCamIndia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CadCamIndia::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    
}
