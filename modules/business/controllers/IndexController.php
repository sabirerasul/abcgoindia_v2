<?php

namespace app\modules\business\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\business\Business;
use app\models\business\AssignmentBusiness;
use app\modules\org\models\business\UserBusinessSearch;
use app\models\User;
use app\models\business\BusinessCat;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * UserBusinessController implements the CRUD actions for Business model.
 */
class IndexController extends Controller
{
    public $layout = '@app/themes/backend/main';
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        /*return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout'],
                    'rules' => [
                        [
                            'actions' => ['logout'],
                            'allow' => false,
                            'roles' => ['@'],
                        ],
                    ],
                ],

                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );*/

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
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
     * Lists all Business models.
     * @return mixed
     */
    public function actionIndex()
    {
        extract($_REQUEST);
        $user = User::find()->where(['id' => $user_id])->one();
        $model = $user->assignmentBusiness;
        return $this->render('index', ['model' => $model, 'user_id' => $user_id]);
    }

    /**
     * Displays a single Business model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Business model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        extract($_REQUEST);
        $model = new Business();
        $model->user_id = $user_id;
        $users = ArrayHelper::map(User::find()->where(['status' => 1])->all(), 'id', 'name');
        $categories = ArrayHelper::map(BusinessCat::find()->where(['status' => 1])->all(), 'id', 'cat_name');
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                
                $username = $model->bus_name.rand(1,789);
                $username = str_replace(' ', '', $username);
                $password_hash = password_hash($username, PASSWORD_DEFAULT);
                $model->bus_username = $username;
                $model->bus_qrcode = "demoqr.png";
                $model->bus_token = $password_hash;
                $model->created_at = date('Y-m-d h:i:s');
                $model->save();

                $AssignmentBusiness = new AssignmentBusiness();

                $AssignmentBusiness->user_id = $user_id;
                $AssignmentBusiness->business_id = $model->id;
                $AssignmentBusiness->save();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'users' => $users,
            'categories' => $categories
        ]);


    }

    /**
     * Updates an existing Business model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = ArrayHelper::map(BusinessCat::find()->where(['status' => 1])->all(), 'id', 'cat_name');
        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories
        ]);
    }

    /**
     * Deletes an existing Business model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Business model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Business the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Business::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
