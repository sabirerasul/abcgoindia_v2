<?php

namespace app\models\business;

use Yii;
use app\models\business\Business;

/**
 * This is the model class for table "ai_business_address".
 *
 * @property int $id
 * @property string $zipcode
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $business_id
 * @property string|null $address_type
 *
 * @property AiBusiness $business
 */
class BusinessAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_address}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'address', 'zipcode', 'city', 'state', 'country', 'business_id'], 'required'],
            [['id', 'business_id'], 'integer'],
            [['zipcode', 'address_type'], 'string', 'max' => 20],
            [['city', 'state', 'country'], 'string', 'max' => 100],
            ['address', 'string'],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => AiBusiness::className(), 'targetAttribute' => ['business_id' => 'id']],
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
            'business_id' => Yii::t('app', 'Business ID'),
            'address_type' => Yii::t('app', 'Address Type'),
        ];
    }

    /**
     * Gets query for [[Business]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(AiBusiness::className(), ['id' => 'business_id']);
    }
}
