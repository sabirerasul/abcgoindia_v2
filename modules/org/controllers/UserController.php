<?php

namespace app\modules\org\controllers;

use app\models\User;
use app\models\UserAddress;
use app\models\UserDetail;
use app\models\UserHobby;
use app\models\UserProfileLink;

use app\modules\org\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $layout = '@app/themes/backend/main';
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->scenario = 'adminCreate';

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                extract($_REQUEST);
                $username = $model->name.rand(1,789);
                $username = str_replace(' ', '', $username);
                $password_hash = password_hash($model->password, PASSWORD_DEFAULT);
                $model->username = $username;
                $model->password_hash = $password_hash;
                $model->auth_key = password_hash($model->password_hash, PASSWORD_DEFAULT);
                $model->created_at = date('Y-m-d h:i:s');

                if( $model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $model->scenario = 'adminUpdate';

        if ($this->request->isPost && $model->load($this->request->post())) {

            if(!empty($model->password)){
                $model->password_hash = password_hash($model->password, PASSWORD_DEFAULT);
            }
            
            $model->updated_at = date('Y-m-d h:i:s');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionBusiness(){
        extract($_REQUEST);
        $url = Yii::getAlias('@web')."/org/user-business?user_id=".$id;
        $this->redirect($url);
    }
    

    public function actionUpdateOther()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $detailModel = ($model->userDetails) ? $model->userDetails : new UserDetail();
        $detailModel->user_id = $model->id;

        if ($this->request->isPost && $detailModel->load($this->request->post())) {
            
            $detailModel->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        return $this->render('update-other', [
            'model' => $model,
            'details' => $detailModel,
        ]);
    }

    public function actionCreateAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $addressModel = new userAddress();

        if ($this->request->isPost && $addressModel->load($this->request->post())) {
           
            $addressModel->user_id = $model->id;
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

    public function actionUpdateAddress()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $addressModel = userAddress::find()->where(['id' => $address_id, 'user_id' => $id])->one();

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
        $addressModel = userAddress::find()->where(['id' => $address_id, 'user_id' => $id, 'status' => 1])->one();

        if (!empty($addressModel)) {
            $addressModel->status = 0;
            $addressModel->updated_at = date('Y-m-d h:i:s');
            $addressModel->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionCreateHobby()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        $userHobby = new UserHobby();

        if ($this->request->isPost && $userHobby->load($this->request->post())) {
           
            $userHobby->user_id = $model->id;
            $userHobby->created_at = date('Y-m-d h:i:s');
            $userHobby->status = 1;
            $userHobby->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create-hobby', [
            'model' => $model,
            'details' => $userHobby,
        ]);
    }

    public function actionUpdateHobby()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
               
        $userHobby = UserHobby::find()->where(['id' => $hobby_id, 'user_id' => $id])->one();

        if ($this->request->isPost && $userHobby->load($this->request->post())) {
            
            $userHobby->updated_at = date('Y-m-d h:i:s');
            $userHobby->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        return $this->render('update-hobby', [
            'model' => $model,
            'details' => $userHobby,
        ]);
    }

    public function actionDeleteHobby()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);
        
        $userHobby = UserHobby::find()->where(['id' => $address_id, 'user_id' => $id, 'status' => 1])->one();

        if (!empty($userHobby)) {
            $userHobby->status = 0;
            $userHobby->updated_at = date('Y-m-d h:i:s');
            $userHobby->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionCreateProfileLink()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $userProfileLink = new UserProfileLink();

        if ($this->request->isPost && $userProfileLink->load($this->request->post())) {
           
            $userProfileLink->user_id = $model->id;
            $userProfileLink->created_at = date('Y-m-d h:i:s');
            $userProfileLink->status = 1;
            $userProfileLink->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create-profile-link', [
            'model' => $model,
            'details' => $userProfileLink,
        ]);
    }

    public function actionUpdateProfileLink()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $userProfileLink = UserProfileLink::find()->where(['id' => $profile_link_id, 'user_id' => $id])->one();

        if ($this->request->isPost && $userProfileLink->load($this->request->post())) {
            
            $userProfileLink->updated_at = date('Y-m-d h:i:s');
            $userProfileLink->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        return $this->render('update-profile-link', [
            'model' => $model,
            'details' => $userProfileLink,
        ]);
    }

    public function actionDeleteProfileLink()
    {
        extract($_REQUEST);
        $model = $this->findModel($id);

        $userProfileLink = UserProfileLink::find()->where(['id' => $address_id, 'user_id' => $id, 'status' => 1])->one();

        if (!empty($userProfileLink)) {
            $userProfileLink->status = 0;
            $userProfileLink->updated_at = date('Y-m-d h:i:s');
            $userProfileLink->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->save();
        //->delete();

        return $this->redirect(['index']);
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
