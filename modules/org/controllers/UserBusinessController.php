<?php

namespace app\modules\org\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\rbac\DbManager;
use yii\helpers\ArrayHelper;

use app\models\business\Business;
use app\models\business\AssignmentBusiness;
use app\modules\org\models\business\UserBusinessSearch;
use app\models\business\BusinessCatalog;
use app\models\User;
use app\models\business\BusinessCat;
use app\models\business\BusinessDetail;
use app\models\business\BusinessAddress;
use app\models\business\BusinessProfileLink;
use app\models\business\BusinessWorkingDay;
use app\models\business\AssignmentCatalog;
use app\models\business\BusinessCatalogLink;
use app\models\business\BusinessCatalogDetail;





/**
 * UserBusinessController implements the CRUD actions for Business model.
 */
class UserBusinessController extends Controller
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
                    'delete' => ['POST'],
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

        if(empty($user_id)){
            return $this->redirect('../');
        }
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
    public function actionBusinessProfile()
    {
        extract($_REQUEST);
        return $this->render('business-profile', [
            'model' => $this->findModel($id),
            'user_id' => $user_id
        ]);
    }

    /**
     * Creates a new Business model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionBusinessUpdate($user_id, $id=0)
    {
        $old = Business::find()->where(['id' => $id])->one();
        $model = $old ? $old : new Business();
        $categories = ArrayHelper::map(BusinessCat::find()->where(['status' => 1])->all(), 'id', 'cat_name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                
                if($old){
                    $model->updated_at = date('Y-m-d h:i:s');
                    $model->save();
                }else{
                    $username = $model->bus_name.rand(1,789);
                    $username = str_replace(' ', '', $username);
                    $password_hash = password_hash($username, PASSWORD_DEFAULT);
                    $model->bus_username = $username;
                    $model->bus_qrcode = "demoqr.png";
                    $model->bus_token = password_hash($password_hash, PASSWORD_DEFAULT);
                    $model->created_at = date('Y-m-d h:i:s');
                    $model->save();

                    $AssignmentBusiness = new AssignmentBusiness();
                    $AssignmentBusiness->user_id = $user_id;
                    $AssignmentBusiness->business_id = $model->id;
                    $AssignmentBusiness->save();
                }

                return $this->redirect(['index', 'user_id' => $user_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('business-update', [
            'model' => $model,
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
    public function actionBusinessUpdateDetails()
    {
        extract($_REQUEST);
        $business = $this->findModel($id);
        $old = BusinessDetail::find()->where(['id' => $business->businessDetails->id])->one();
        $model = $old ? $old : new BusinessDetail();
                 
        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->business_id = $business->id;
            $model->save();
            return $this->redirect(['view', 'id' => $business->id]);
        }

        return $this->render('update-details', [
            'model' => $business,
            'businessDetails' => $model,
            'user_id' => $user_id
        ]);
    }

    public function actionUpdateAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        
        $addressModel = new BusinessAddress();

        if ($this->request->isPost && $addressModel->load($this->request->post())) {
           
            $addressModel->business_id = $model->id;
            $addressModel->created_at = date('Y-m-d h:i:s');
            $addressModel->status = 1;
            $addressModel->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create-address', [
            'model' => $model,
            'details' => $addressModel,
        ]);
    }

/*    public function actionUpdateAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $addressModel = BusinessAddress::find()->where(['id' => $address_id, 'business_id' => $id])->one();

        if ($this->request->isPost && $addressModel->load($this->request->post())) {
            
            $addressModel->updated_at = date('Y-m-d h:i:s');
            $addressModel->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        return $this->render('update-address', [
            'model' => $model,
            'details' => $addressModel,
        ]);
    }*/

    public function actionDeleteAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $addressModel = BusinessAddress::find()->where(['id' => $address_id, 'business_id' => $id, 'status' => 1])->one();

        if (!empty($addressModel)) {
            $addressModel->status = 0;
            $addressModel->updated_at = date('Y-m-d h:i:s');
            $addressModel->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionUpdateProfileLink($business_id, $id=0)
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $old = BusinessProfileLink::find()->where(['id' => $id])->one();
        $model = $old ? $old : new BusinessProfileLink();

        if ($this->request->isPost && $model->load($this->request->post())) {
           
            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
            }else{
                $model->business_id = $model->id;
                $model->created_at = date('Y-m-d h:i:s');
                $model->status = 1;
            }

            $model->save();
            
            return $this->redirect(['view', 'id' => $model->business_id]);
        }

        return $this->render('create-profile-link', [
            'model' => $model,
            'details' => $businessProfileLink,
        ]);
    }

    public function actionDeleteProfileLink()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $userProfileLink = BusinessProfileLink::find()->where(['id' => $profile_link_id, 'business_id' => $id, 'status' => 1])->one();

        if (!empty($userProfileLink)) {
            $userProfileLink->status = 0;
            $userProfileLink->updated_at = date('Y-m-d h:i:s');
            $userProfileLink->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionCreateWorkingDay()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $businessWorkingDay = new BusinessWorkingDay();

        if ($this->request->isPost && $businessWorkingDay->load($this->request->post())) {
           
            $businessWorkingDay->business_id = $model->id;
            $businessWorkingDay->created_at = date('Y-m-d h:i:s');
            $businessWorkingDay->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create-working-day', [
            'model' => $model,
            'details' => $businessWorkingDay,
        ]);
    }

    public function actionUpdateWorkingDay()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $businessWorkingDay = BusinessWorkingDay::find()->where(['id' => $working_day_id, 'business_id' => $id])->one();

        if ($this->request->isPost && $businessWorkingDay->load($this->request->post())) {
            
            $businessWorkingDay->updated_at = date('Y-m-d h:i:s');
            $businessWorkingDay->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        return $this->render('update-working-day', [
            'model' => $model,
            'details' => $businessWorkingDay,
        ]);
    }

    /**
     * Updates an existing Business model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCatalog($id)
    {
        $model = $this->findModel($id);

        $catalog = $model->assignmentCatalog;

        return $this->render('view_catalog', [
            'model' => $catalog,
            'business_id' => $id
        ]);
    }

    /**
     * Creates a new BusinessCatalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdateCatalog($business_id, $id=0)
    {
        $old = BusinessCatalog::find()->where(['id' => $id])->one();
        $model = $old ? $old : new BusinessCatalog();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($old){

                    $model->updated_at = date('Y-m-d h:i:s');
                    $model->save();

                }else{
                    $model->catalog_token = "".rand(1234, 56789);
                    $model->created_at = date('Y-m-d h:i:s');
                    $model->save();
                    $assignmentModel = new AssignmentCatalog();
                    $assignmentModel->catalog_id = $model->id;
                    $assignmentModel->business_id = $business_id;
                    $assignmentModel->save();
                }

                return $this->redirect(['catalog-view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update-catalog', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BusinessCatalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCatalogView($id)
    {
        $model = $this->findCatalogModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('details-catalog', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BusinessCatalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCatalogUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update-catalog', [
            'model' => $model,
        ]);
    }

    public function actionUpdateCatalogDetails($id)
    {
        $old = BusinessCatalogDetail::find()->where(['catalog_id' => $id])->one();
        $model = $old ? $old : new BusinessCatalogDetail();
        $model->catalog_id = $id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if($old){
                    //$model->updated_at = date('Y-m-d h:i:s');
                }else{
                    //$model->created_at = date('Y-m-d h:i:s');
                }

                $model->save();
                return $this->redirect(['catalog-view', 'id' => $model->catalog_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update-catalog-details', [
            'model' => $model
        ]);
    }

    public function actionCatalogLink($catalogId, $id=0)
    {
        
        $old = BusinessCatalogLink::find()->where(['id' => $id])->one();

        $model = $old ? $old : new BusinessCatalogLink();

        $model->catalog_id = $catalogId;

        if ($this->request->isPost && $model->load($this->request->post())) {
           
            
            
            $model->status = 1;
            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
            }else{
                $model->created_at = date('Y-m-d h:i:s');
            }

            $model->save();
            return $this->redirect(['catalog-view', 'id' => $model->catalog_id]);
        }

        return $this->render('catalog-link', [
            'model' => $model
        ]);
    }



    /**
     * Updates an existing BusinessCatalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionCatalogDelete($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update-catalog', [
            'model' => $model,
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

    protected function findCatalogModel($id)
    {
        if (($model = BusinessCatalog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
