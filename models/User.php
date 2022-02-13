<?php

namespace app\models;

use Yii;
$addressStatus = 1;

/**
 * This is the model class for table "ai_user".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $mobile
 * @property string $password_hash
 * @property string|null $reset_token
 * @property string|null $updated_at
 * @property string $created_at
 * @property int $status
 *
 * @property UserAddress[] $aiUserAddresses
 * @property UserDetail[] $aiUserDetails
 * @property UserHobby[] $aiUserHobbies
 * @property UserProfileLink[] $aiUserProfileLinks
 */
class User extends \yii\db\ActiveRecord
{
    public $password;
    public $c_password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username', 'mobile', 'password_hash', 'created_at', 'password', 'c_password'], 'required'],
            [['password'], 'string', 'min'=>6, 'max'=>64],
            [['c_password'], 'string', 'min'=>6, 'max'=>64],
            ['password', 'match', 'pattern' => '/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', 'message' => "Password must contain at least one lower and upper case character and a digit."],
            ['c_password', 'match', 'pattern' => '/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/', 'message' => "Confirm Password must contain at least one lower and upper case character and a digit."],
            ['c_password', 'compare', 'compareAttribute'=>'password'],
            ['name', 'string', 'max' => 60],
            [['password_hash', 'reset_token'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['status'], 'integer'],
            [['name', 'username'], 'string', 'max' => 100],
            [['mobile'], 'number', 'min' => 10],
        ];
    }

    public function checkPassword($passData)
    {
        if(preg_match("/^\w*(?=\w*\d)(?=\w*[A-Z])(?=\w*[^0-9A-Za-z])(?=\w*[a-z])\w*$/", $passData))
            return true;
        else
            return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'username' => Yii::t('app', 'Username'),
            'mobile' => Yii::t('app', 'Mobile'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'c_password' => Yii::t('app', 'Confirm Password'),
            'reset_token' => Yii::t('app', 'Reset Token'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddress::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[AiUserDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetails()
    {
        return $this->hasOne(UserDetail::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[AiUserHobbies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserHobbies()
    {
        return $this->hasMany(UserHobby::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[AiUserProfileLinks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfileLinks()
    {
        return $this->hasMany(UserProfileLink::className(), ['user_id' => 'id']);
    }
}
