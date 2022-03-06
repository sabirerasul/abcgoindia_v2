<?php

namespace app\modules\org\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

use app\models\User;
use app\models\UserAddress;
use app\models\UserDetail;
use app\models\UserHobby;
use app\models\UserProfileLink;
use app\modules\org\models\UserSearch;
use yii\widgets\Pjax;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $layout = '@app/themes/backend/main';
    /**
     * @inheritDoc
     */
    /*
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
        );*/

    

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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUserProfile($id)
    {
        return $this->render('user-profile', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUserNew()
    {
        $user = new User();
        $userDetail = new UserDetail();
        $userDetail->gender = 'male';
        $userDetail->job = 'Student';
        $user->scenario = 'adminCreate';

        if ($this->request->isPost) {
            if ($user->load($this->request->post()) && $userDetail->load($this->request->post())) {
                
                $model = $user->saveUser($user, $userDetail);
                $userDetail->user_id = $model->id;
                if($model){
                    if($userDetail->saveUserDetail($userDetail)){
                        return $this->redirect(['user-profile', 'id' => $user->id]);
                    }
                }

            }
        }

        return $this->render('user-new', [
            'user' => $user,
            'userDetail' => $userDetail
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionUserUpdate()
    {
        extract($_REQUEST);
        $user = $this->findModel($id);
        $userDetail = UserDetail::find()->where(['user_id' => $user->id])->one();
        
        $user->scenario = 'adminUpdate';

        if ($this->request->isPost) {
            if ($user->load($this->request->post()) && $userDetail->load($this->request->post())) {
                
                $model = $user->updateUser($user, $userDetail);
                $userDetail->user_id = $model->id;
                if($model){
                    if($userDetail->saveUserDetail($userDetail)){
                        return $this->redirect(['user-profile', 'id' => $user->id]);
                    }
                }

            }
        }

        return $this->render('user-update', [
            'user' => $user,
            'userDetail' => $userDetail
        ]);
    }

    public function actionSaveUserAddress()
    {
        extract($_REQUEST);
        $userModel = $this->findModel($userId);
        $old = UserAddress::find()->where(['id' => $userAddressId])->one();
        $model = $old ? $old : new UserAddress();

        if ($this->request->isPost && $model->load($this->request->post())) {
           
            $model->user_id = $userModel->id;
            
            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
            }else{
                $model->created_at = date('Y-m-d h:i:s');
            }
            
            $model->status = 1;
            $model->save();
            return $this->redirect(['user-profile', 'id' => $userModel->id]);
        }

        return $this->render('user-address', [
            'model' => $userModel,
            'details' => $model,
        ]);
    }

    public function actionDeleteUserAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($userId);
        $addressModel = UserAddress::find()->where(['id' => $userAddressId])->one();

        if (!empty($addressModel)) {
            $addressModel->status = 0;
            $addressModel->updated_at = date('Y-m-d h:i:s');
            $addressModel->save();
            return $this->redirect(['user_profile', 'id' => $model->id]);
        }
    }

    public function actionSaveUserHobby()
    {
        extract($_REQUEST);
        $userModel = $this->findModel($userId);

        $old = UserHobby::find()->where(['id' => $userHobbyId])->one();

        $model = $old ? $old : new UserHobby();

        if ($this->request->isPost && $model->load($this->request->post())) {
           
            $model->user_id = $userModel->id;

            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
            }else{
                $model->created_at = date('Y-m-d h:i:s');
            }
            
            $model->status = 1;
            $model->save();
            return $this->redirect(['user-profile', 'id' => $userModel->id]);
        }

        return $this->render('user-hobby', [
            'model' => $userModel,
            'details' => $model,
        ]);
    }

    public function actionDeleteUserHobby()
    {
        extract($_REQUEST);
        $model = $this->findModel($userId);
        
        $userHobby = UserHobby::find()->where(['id' => $userHobbyId])->one();

        if (!empty($userHobby)) {
            $userHobby->status = 0;
            $userHobby->updated_at = date('Y-m-d h:i:s');
            $userHobby->save();
            return $this->redirect(['user-profile', 'id' => $model->id]);
        }
    }

    public function actionSaveUserProfileLink()
    {
        extract($_REQUEST);
        $userModel = $this->findModel($userId);

        $old = UserProfileLink::find()->where(['id' => $userProfileLinkId])->one();
        $model = $old ? $old : new UserProfileLink();

        if ($this->request->isPost && $model->load($this->request->post())) {
           
            $model->user_id = $userModel->id;

            if($old){
                $model->updated_at = date('Y-m-d h:i:s');
            }else{
                $model->created_at = date('Y-m-d h:i:s');
            }
            
            $model->status = 1;
            $model->save();
            return $this->redirect(['user-profile', 'id' => $userModel->id]);
        }

        return $this->render('user-profile-link', [
            'model' => $userModel,
            'details' => $model,
        ]);
    }

    public function actionDeleteUserProfileLink()
    {
        extract($_REQUEST);
        
        $userProfileLink = UserProfileLink::find()->where(['id' => $userProfileLinkId])->one();

        if (!empty($userProfileLink)) {
            $userProfileLink->status = 0;
            $userProfileLink->updated_at = date('Y-m-d h:i:s');
            $userProfileLink->save();
            return $this->redirect(['user-profile', 'id' => $userId]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUserDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->is_deleted = 1;
        $model->save();
        //->delete();

        return $this->redirect(['index']);
    }


    public function actionUserBusiness(){
        extract($_REQUEST);
        $url = Yii::getAlias('@web')."/org/user-business/index?user_id=".$id;
        $this->redirect($url);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}
