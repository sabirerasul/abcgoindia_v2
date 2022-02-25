<?php

namespace app\models\business;

use Yii;
use app\models\business\BusinessAddress;
use app\models\business\BusinessCatalogDetail;
use app\models\business\AssignmentCatalog;
use app\models\business\BusinessDetail;
use app\models\business\BusinessHour;
use app\models\business\BusinessProfileLink;
use app\models\business\BusinessCat;
use app\models\business\AssignmentBusiness;
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
    public $user_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_name', 'bus_username', 'bus_cat', 'bus_qrcode', 'bus_number', 'bus_token', 'created_at'], 'required'],
            [['bus_cat', 'status'], 'integer'],
            [['bus_token'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['bus_name', 'bus_username', 'bus_qrcode'], 'string', 'max' => 100],
            [['bus_number'], 'string', 'max' => 15],
            [['bus_cat'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessCat::className(), 'targetAttribute' => ['bus_cat' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bus_name' => Yii::t('app', 'Business Name'),
            'bus_username' => Yii::t('app', 'Business Username'),
            'bus_cat' => Yii::t('app', 'Business Category'),
            'bus_qrcode' => Yii::t('app', 'Business Qrcode'),
            'bus_number' => Yii::t('app', 'Business Number'),
            'status' => Yii::t('app', 'Status'),
            'bus_token' => Yii::t('app', 'Business Token'),
            'created_at' => Yii::t('app', 'Business Since'),
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
        return $this->hasMany(AssignmentCatalog::className(), ['business_id' => 'id']);
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
    public function getAssignmentBusiness()
    {
        return $this->hasOne(AssignmentBusiness::className(), ['business_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignmentCatalog()
    {
        return $this->hasMany(AssignmentCatalog::className(), ['business_id' => 'id']);
    }
}
