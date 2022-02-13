<?php

namespace app\models;

use Yii;

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
 * @property AiUser $user
 */
class UserDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_user_details';
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
            [['email', 'profile_photo', 'job'], 'string', 'max' => 100],
            [['dob'], 'string', 'max' => 12],
            [['whatsapp_number'], 'string', 'max' => 15],
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
}
