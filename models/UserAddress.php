<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ai_user_address".
 *
 * @property int $id
 * @property string $zipcode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $user_id
 * @property string|null $address_type
 *
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zipcode', 'city', 'state', 'country', 'user_id', 'address'], 'required'],
            [['user_id'], 'integer'],
            ['address', 'string', 'max' => 255],
            [['zipcode', 'address_type'], 'string', 'max' => 20],
            [['city', 'state', 'country'], 'string', 'max' => 100],
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
            'zipcode' => Yii::t('app', 'Zipcode'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'user_id' => Yii::t('app', 'User ID'),
            'address_type' => Yii::t('app', 'Address Type'),
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
