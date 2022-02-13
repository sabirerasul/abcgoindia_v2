<?php

namespace app\models\business;
use app\models\User;

use Yii;

/**
 * This is the model class for table "ai_business".
 *
 * @property int $id
 * @property int $user_id
 * @property string $bus_name
 * @property string $bus_username
 * @property int $bus_cat
 * @property string $bus_qrcode
 * @property string $bus_number
 * @property int $status
 * @property string $bus_token
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property BusinessAddress[] $BusinessAddresses
 * @property BusinessCatalogDetail[] $BusinessCatalogDetails
 * @property BusinessCatalog[] $BusinessCatalogs
 * @property BusinessDetail[] $BusinessDetails
 * @property BusinessHour[] $BusinessHours
 * @property BusinessProfileLink[] $BusinessProfileLinks
 * @property BusinessCat $busCat
 * @property User $user
 */
class Business extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_business';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'bus_name', 'bus_username', 'bus_cat', 'bus_qrcode', 'bus_number', 'bus_token', 'created_at'], 'required'],
            [['user_id', 'bus_cat', 'status'], 'integer'],
            [['bus_token'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['bus_name', 'bus_username', 'bus_qrcode'], 'string', 'max' => 100],
            [['bus_number'], 'string', 'max' => 15],
            [['bus_cat'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessCat::className(), 'targetAttribute' => ['bus_cat' => 'id']],
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
            'bus_name' => Yii::t('app', 'Bus Name'),
            'bus_username' => Yii::t('app', 'Bus Username'),
            'bus_cat' => Yii::t('app', 'Bus Cat'),
            'bus_qrcode' => Yii::t('app', 'Bus Qrcode'),
            'bus_number' => Yii::t('app', 'Bus Number'),
            'status' => Yii::t('app', 'Status'),
            'bus_token' => Yii::t('app', 'Bus Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[AiBusinessAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessAddresses()
    {
        return $this->hasMany(BusinessAddress::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessCatalogDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCatalogDetails()
    {
        return $this->hasMany(BusinessCatalogDetail::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessCatalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCatalogs()
    {
        return $this->hasMany(BusinessCatalog::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessDetails()
    {
        return $this->hasMany(BusinessDetail::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessHours]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessHours()
    {
        return $this->hasMany(BusinessHour::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessProfileLinks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessProfileLinks()
    {
        return $this->hasMany(BusinessProfileLink::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[BusCat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusCat()
    {
        return $this->hasOne(BusinessCat::className(), ['id' => 'bus_cat']);
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
