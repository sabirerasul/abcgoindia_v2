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
use app\models\business\BusinessCatalogCat;
use yii\web\UploadedFile;
use yii\helpers\Url;

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
    public function actionCreateBusiness()
    {
        $user_id = $this->userId();

        $model = new Business();
        $modelDetails = new BusinessDetail();
        $AssignmentBusiness = new AssignmentBusiness();

        $categories = ArrayHelper::map(BusinessCat::find()->where(['status' => 1])->all(), 'id', 'cat_name');

        if ($this->request->isPost && $model->load($this->request->post())) {
                                    
            $username = $model->bus_name.rand(1,789);
            $username = str_replace(' ', '', $username);
            $password_hash = password_hash($username, PASSWORD_DEFAULT);
            $model->bus_username = $username;

            //start creating qrcode
            $iddat = "https://abcgoindia.com/e-market/".$username;
            $root_path = Yii::getAlias('@webroot').'/web/img/business/qr-code/';
            $img_url = 'https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl='.$iddat;
            $labelle_name = basename(md5($iddat).'.png');
            $this->grabImage($img_url, $root_path.$labelle_name);

            //$model->bus_qrcode = "demoqr.png";
            $model->bus_qrcode = $labelle_name;
            $model->bus_token = password_hash($password_hash, PASSWORD_DEFAULT);
            $model->created_at = date('Y-m-d h:i:s');
            $model->save();

            $modelDetails->business_id = $model->id;
            $modelDetails->save();

            $openTime = "10:00:00";
            $closeTime = "17:00:00";

            $day = [
                '0' => 'Sunday',
                '1' => 'Monday',
                '2' => 'Tuesday',
                '3' => 'Wednesday',
                '4' => 'Thursday',
                '5' => 'Friday',
                '6' => 'Saturday'
            ];
            
            foreach ($day as $k => $v) {
                $m = new BusinessWorkingDay();
                $m->business_id = $model->id;
                $m->day = $v;
                $m->from_time = $openTime;
                $m->to_time = $closeTime;
                if($v == 'Sunday'){
                    $m->working_day = 0;
                }else{
                    $m->working_day = 1;
                }
                
                $m->created_at = date('Y-m-d h:i:s');
                $m->save();
            }

            $AssignmentBusiness->user_id = $user_id;
            $AssignmentBusiness->business_id = $model->id;
            $AssignmentBusiness->save();

            return $this->redirect(['index']);
        }else{
            $model->loadDefaultValues();
        }

        return $this->render('business-create', [
            'model' => $model,
            'categories' => $categories,
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

    public function actionUpdateBusiness($id)
    {
        $user_id = $this->userId();

        $model = Business::find()->where(['id' => $id])->one();
        $modelDetails = BusinessDetail::find()->where(['business_id' => $id])->one();
        
        $categories = ArrayHelper::map(BusinessCat::find()->where(['status' => 1])->all(), 'id', 'cat_name');

        if ($this->request->isPost && $model->load($this->request->post()) && $modelDetails->load($this->request->post())) {
            
            $model->created_at = date('Y-m-d h:i:s');            
            $model->save();

            $modelDetails->business_logo_file = UploadedFile::getInstance($modelDetails, 'business_logo_file');
            if(!empty($modelDetails->business_logo_file)){
                $uploadPath1 = Yii::getAlias('@webroot') .'/web/img/business/business-logo/high/';
                $fileName1 = $modelDetails->business_logo_file->baseName . '.' . $modelDetails->business_logo_file->extension;
                $modelDetails->business_logo = $fileName1;
                $modelDetails->business_logo_file->saveAs($uploadPath1 . $fileName1);

            }

            $modelDetails->business_banner_file = UploadedFile::getInstance($modelDetails, 'business_banner_file');
            if(!empty($modelDetails->business_banner_file)){
                $uploadPath2 = Yii::getAlias('@webroot') .'/web/img/business/business-banner/high/';
                $fileName2 = $modelDetails->business_banner_file->baseName . '.' . $modelDetails->business_banner_file->extension;
                $modelDetails->business_banner = $fileName2;
                $modelDetails->business_banner_file->saveAs($uploadPath2 . $fileName2);
            }

            $modelDetails->save();
            
            return $this->redirect(['business-profile', 'id' =>$model->id]);
        }else{
            $model->loadDefaultValues();
        }

        return $this->render('business-update', [
            'model' => $model,
            'categories' => $categories,
            'modelDetails' => $modelDetails
        ]);
    }
    
    public function actionDeleteBusiness($id){
        $model = $this->findModel($id);

        $model->is_deleted = 1;
        $model->status = 0;
        $model->save();
        
        $url = Url::to(['/business/user-business']);
        return $this->redirect($url);
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

        //$catalog = $model->assignmentCatalog;
        $catalog = assignmentCatalog::find()->where(['business_id' => $model->id])->orderBy(['catalog_id' => SORT_DESC])->all();

        return $this->render('view_catalog', [
            'model' => $catalog,
            'business_id' => $id
        ]);
    }

    public function actionCreateCatalog($businessId)
    {
        $model = new BusinessCatalog();
        $modelDetails = new BusinessCatalogDetail();

        $categories = ArrayHelper::map(BusinessCatalogCat::find()->where(['status' => 1])->all(), 'id', 'title');

        if ($this->request->isPost && $model->load($this->request->post()) && $modelDetails->load($this->request->post())) {

            $model->catalog_token = "".rand(1234, 56789);
            $model->created_at = date('Y-m-d h:i:s');
            $model->save();
            $assignmentModel = new AssignmentCatalog();
            $assignmentModel->catalog_id = $model->id;
            $assignmentModel->business_id = $businessId;
            $assignmentModel->save();
            
            $modelDetails->catalog_id = $model->id;
            $modelDetails->catalog_picture_file = UploadedFile::getInstance($modelDetails, 'catalog_picture_file');
            if(!empty($modelDetails->catalog_picture_file)){
                $uploadPath1 = Yii::getAlias('@webroot') .'/web/img/business/catalog/image/high/';
                $fileName1 = $modelDetails->catalog_picture_file->baseName . '.' . $modelDetails->catalog_picture_file->extension;
                $modelDetails->catalog_picture = $fileName1;
                $modelDetails->catalog_picture_file->saveAs($uploadPath1 . $fileName1);
            }

            $modelDetails->catalog_video_file = UploadedFile::getInstance($modelDetails, 'catalog_video_file');
            if(!empty($modelDetails->catalog_video_file)){
                $uploadPath2 = Yii::getAlias('@webroot') .'/web/img/business/catalog/video/';
                $fileName2 = $modelDetails->catalog_video_file->baseName . '.' . $modelDetails->catalog_video_file->extension;
                $modelDetails->catalog_video = $fileName2;
                $modelDetails->catalog_video_file->saveAs($uploadPath2 . $fileName2);
            }

            $modelDetails->save();
            return $this->redirect(['catalog', 'id' => $businessId]);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update-catalog', [
            'model' => $model,
            'modelDetails' => $modelDetails,
            'categories' => $categories,
            'businessId' => $businessId,
            'type' => 'new',
            'catalogId' => 0
        ]);
    }

    /**
     * Creates a new BusinessCatalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUpdateCatalog($id=0)
    {
        $old = BusinessCatalog::find()->where(['id' => $id])->one();
        $bid = $old->assignmentCatalog->business_id;
        
        if($old){
            $model = $old;
            $modelDetails = BusinessCatalogDetail::find()->where(['catalog_id' => $model->id])->one();
        }else{
            $model = new BusinessCatalog();
            $modelDetails = new BusinessCatalogDetail();
        }

        $categories = ArrayHelper::map(BusinessCatalogCat::find()->where(['status' => 1])->all(), 'id', 'title');

        if ($this->request->isPost && $model->load($this->request->post()) && $modelDetails->load($this->request->post())) {
                
            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
                $model->save();
            }else{
                $model->catalog_token = "".rand(1234, 56789);
                $model->created_at = date('Y-m-d h:i:s');
                $model->save();
            }

            $modelDetails->catalog_picture_file = UploadedFile::getInstance($modelDetails, 'catalog_picture_file');
            if(!empty($modelDetails->catalog_picture_file)){
                $uploadPath1 = Yii::getAlias('@webroot') .'/web/img/business/catalog/image/high/';
                $fileName1 = $modelDetails->catalog_picture_file->baseName . '.' . $modelDetails->catalog_picture_file->extension;
                $modelDetails->catalog_picture = $fileName1;
                $modelDetails->catalog_picture_file->saveAs($uploadPath1 . $fileName1);
            }

            $modelDetails->catalog_video_file = UploadedFile::getInstance($modelDetails, 'catalog_video_file');
            if(!empty($modelDetails->catalog_video_file)){
                $uploadPath2 = Yii::getAlias('@webroot') .'/web/img/business/catalog/video/';
                $fileName2 = $modelDetails->catalog_video_file->baseName . '.' . $modelDetails->catalog_video_file->extension;
                $modelDetails->catalog_video = $fileName2;
                $modelDetails->catalog_video_file->saveAs($uploadPath2 . $fileName2);
            }

            $modelDetails->save();
            return $this->redirect(['catalog', 'id' => $bid]);

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update-catalog', [
            'model' => $model,
            'modelDetails' => $modelDetails,
            'categories' => $categories,
            'businessId' => $bid,
            'type' => 'old',
            'catalogId' => $model->id
        ]);
    }
    
    public function actionAddCatalogCat($businessId=0, $id=0, $type='new')
    {
        $model = new BusinessCatalogCat();

        if(empty($businessId)){
            $this->redirect(Yii::getAlias('@web').'/business/user-business/');
        }
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->created_at = date('Y-m-d h:i:s');
                
                $model->save();
                
                if($type == 'new'){
                    $link = Url::to(['/business/user-business/create-catalog', 'businessId' => $businessId]);
                }else{
                    $link = Url::to(['/business/user-business/update-catalog', 'id' => $businessId]);
                }
                return $this->redirect($link);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add_catalog_cat', [
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
        $model = $this->findCatalogModel($id);
        $model->status = 0;
        $model->save();

        $bid = $model->assignmentCatalog->business_id;
        $url = Url::to(['/business/user-business/catalog', 'id' => $bid]);
        return $this->redirect($url);
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
