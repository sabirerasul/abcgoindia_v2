<?php

namespace app\modules\business\controllers;

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
use yii\web\UploadedFile;

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
     * Lists all Business models.
     * @return mixed
     */
    public function actionIndex()
    {
        extract($_REQUEST);
        $userId = $this->userId();
        if(empty($userId)){
            return $this->redirect('../');
        }
        $user = User::find()->where(['id' => $userId])->one();
        $model = $user->assignmentBusiness;
        return $this->render('index', ['model' => $model]);
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
        $user_id = $this->userId();
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
    public function actionBusinessUpdate($id=0)
    {
        $user_id = $this->userId();
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

                    //start creating qrcode
                    $iddat = "https://www.abcgoindia.com/services/profile.php?user=".$username;
                    $root_path = Yii::getAlias('@webroot').'/web/img/business/qr-code/';
                    $img_url = 'https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$iddat;
                    $labelle_name = basename(md5($iddat).'.png');
                    $this->grabImage($img_url, $root_path.$labelle_name);

                    //$model->bus_qrcode = "demoqr.png";
                    $model->bus_qrcode = $labelle_name;
                    $model->bus_token = password_hash($password_hash, PASSWORD_DEFAULT);
                    $model->created_at = date('Y-m-d h:i:s');
                    $model->save();

                    $AssignmentBusiness = new AssignmentBusiness();
                    $AssignmentBusiness->user_id = $user_id;
                    $AssignmentBusiness->business_id = $model->id;
                    $AssignmentBusiness->save();
                }

                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('business-update', [
            'model' => $model,
            'categories' => $categories
        ]);


    }

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
        $user_id = $this->userId();
        $business = $this->findModel($id);
        $old = BusinessDetail::find()->where(['business_id' => $id])->one();
        $model = $old ? $old : new BusinessDetail();
                 
        if ($this->request->isPost && $model->load($this->request->post())) {

            $model->business_id = $business->id;

            $model->business_logo_file = UploadedFile::getInstance($model, 'business_logo_file');
            if(!empty($model->business_logo_file)){
                $uploadPath1 = Yii::getAlias('@webroot') .'/web/img/business/business-logo/high/';
                $fileName1 = $model->business_logo_file->baseName . '.' . $model->business_logo_file->extension;
                $model->business_logo = $fileName1;
                $model->business_logo_file->saveAs($uploadPath1 . $fileName1);

            }
            $model->business_banner_file = UploadedFile::getInstance($model, 'business_banner_file');
            if(!empty($model->business_banner_file)){
                $uploadPath2 = Yii::getAlias('@webroot') .'/web/img/business/business-banner/high/';
                $fileName2 = $model->business_banner_file->baseName . '.' . $model->business_banner_file->extension;
                $model->business_banner = $fileName2;
                $model->business_banner_file->saveAs($uploadPath2 . $fileName2);
            }

            $model->save();

            return $this->redirect(['business-profile', 'id' => $business->id]);
        }

        return $this->render('update-details', [
            'model' => $business,
            'businessDetails' => $model,
            'user_id' => $user_id
        ]);
    }

    

    public function actionCreateAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        
        $addressModel = new BusinessAddress();

        if ($this->request->isPost && $addressModel->load($this->request->post())) {
           
            $addressModel->business_id = $model->id;
            $addressModel->created_at = date('Y-m-d h:i:s');
            $addressModel->status = 1;
            $addressModel->save();
            return $this->redirect(['business-profile', 'id' => $model->id]);
        }

        return $this->render('create-address', [
            'model' => $model,
            'details' => $addressModel,
        ]);
    }

    public function actionUpdateAddress()
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
    }

    public function actionDeleteAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $addressModel = BusinessAddress::find()->where(['id' => $address_id, 'business_id' => $id, 'status' => 1])->one();

        if (!empty($addressModel)) {
            $addressModel->status = 0;
            $addressModel->updated_at = date('Y-m-d h:i:s');
            $addressModel->save();
            return $this->redirect(['business-profile', 'id' => $model->id]);
        }
    }

    public function actionUpdateProfileLink()
    {
        extract($_REQUEST);
        $modelBusiness = $this->findModel($id);

        $old = BusinessProfileLink::find()->where(['id' => $profile_link_id])->one();
        $model = $old ? $old : new BusinessProfileLink();
        $model->business_id = $modelBusiness->id;
        if ($this->request->isPost && $model->load($this->request->post())) {
           
            

            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
            }else{
                //$model->business_id = $model->id;
                $model->created_at = date('Y-m-d h:i:s');
                $model->status = 1;
            }



            $model->save();

            
            return $this->redirect(['business-profile', 'id' => $id]);
        }

        return $this->render('create-profile-link', [
            'model' => $modelBusiness,
            'details' => $model,
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
            return $this->redirect(['business-profile', 'id' => $model->id]);
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
            return $this->redirect(['business-profile', 'id' => $model->id]);
        }

        return $this->render('create-working-day', [
            'model' => $model,
            'details' => $businessWorkingDay,
        ]);
    }

    public function actionUpdateWorkingDay()
    {
        extract($_REQUEST);
        $model = $this->findModel($business_id);

        $businessWorkingDay = BusinessWorkingDay::find()->where(['id' => $working_day_id, 'business_id' => $business_id])->one();

        if ($this->request->isPost && $businessWorkingDay->load($this->request->post())) {
            
            $businessWorkingDay->updated_at = date('Y-m-d h:i:s');
            $businessWorkingDay->save();
            return $this->redirect(['business-profile', 'id' => $model->id]);
            
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
    public function actionUpdateCatalog($businessId, $id=0)
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
                    $assignmentModel->business_id = $businessId;
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


                $model->catalog_picture_file = UploadedFile::getInstance($model, 'catalog_picture_file');
                if(!empty($model->catalog_picture_file)){
                    $uploadPath1 = Yii::getAlias('@webroot') .'/web/img/business/catalog/image/high/';
                    $fileName1 = $model->catalog_picture_file->baseName . '.' . $model->catalog_picture_file->extension;
                    $model->catalog_picture = $fileName1;
                    $model->catalog_picture_file->saveAs($uploadPath1 . $fileName1);
                }

                $model->catalog_video_file = UploadedFile::getInstance($model, 'catalog_video_file');
                if(!empty($model->catalog_video_file)){
                    $uploadPath2 = Yii::getAlias('@webroot') .'/web/img/business/catalog/video/';
                    $fileName2 = $model->catalog_video_file->baseName . '.' . $model->catalog_video_file->extension;
                    $model->catalog_video = $fileName2;
                    $model->catalog_video_file->saveAs($uploadPath2 . $fileName2);
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
    /*public function actionCatalogUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update-catalog', [
            'model' => $model,
        ]);
    }*/

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

    public function userId(){
        $id = 0;
        $id = Yii::$app->user->identity->id ? Yii::$app->user->identity->id : $id;
        return $id;
    }
}
