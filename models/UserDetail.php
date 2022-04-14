<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ai_user_details".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $email
 * @property string|null $dob
 * @property string|null $whatsapp_number
 * @property string|null $gender
 * @property string|null $profile_photo
 * @property string|null $job
 * @property string|null $about
 *
 * @property User $user
 */
class UserDetail extends \yii\db\ActiveRecord
{
    public $userProfilePhoto = '';
    public $profile_photo_file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_details}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['about'], 'string'],
            [['profile_photo', 'job'], 'string', 'max' => 100],
            ['profile_photo_file', 'file'],
            ['email', 'email'],
            [['dob'], 'string', 'max' => 12],
            [['userProfilePhoto'], 'file'],
            [['whatsapp_number'], 'number', 'min' => 10],
            [['gender'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'email' => Yii::t('app', 'Email'),
            'dob' => Yii::t('app', 'Date of Birth'),
            'whatsapp_number' => Yii::t('app', 'Whatsapp Number'),
            'gender' => Yii::t('app', 'Gender'),
            'profile_photo' => Yii::t('app', 'Profile Photo'),
            'profile_photo_file' => Yii::t('app', 'Profile Photo'),
            'job' => Yii::t('app', 'Occupation'),
            'about' => Yii::t('app', 'About'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function saveUserDetail($model){

        $model->profile_photo_file = UploadedFile::getInstance($model, 'profile_photo_file');

        if(!empty($model->profile_photo_file)){
            $uploadPath2 = Yii::getAlias('@webroot') .'/web/img/user/high/';
            $fileName2 = $model->profile_photo_file->baseName . '.' . $model->profile_photo_file->extension;
            $model->profile_photo = $fileName2;
            $model->profile_photo_file->saveAs($uploadPath2 . $fileName2);
        }

        $model->save();
        return true;
    }
}
