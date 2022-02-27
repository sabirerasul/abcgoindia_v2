<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "{{%business_address}}".
 *
 * @property int $id
 * @property string $zipcode
 * @property string|null $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $business_id
 * @property string|null $address_type
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $status
 *
 * @property Business $business
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
            [['zipcode', 'city', 'state', 'country', 'business_id'], 'required'],
            [['address'], 'string'],
            [['business_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['zipcode', 'address_type'], 'string', 'max' => 20],
            [['city', 'state', 'country'], 'string', 'max' => 100],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zipcode' => 'Zipcode',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'business_id' => 'Business ID',
            'address_type' => 'Address Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Business]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['id' => 'business_id']);
    }
}
