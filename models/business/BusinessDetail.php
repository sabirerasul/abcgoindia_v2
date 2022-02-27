<?php

namespace app\models\business;

use Yii;
use app\models\business\Business;
use app\models\User;

/**
 * This is the model class for table "ai_business_details".
 *
 * @property int $id
 * @property int $business_id
 * @property string|null $business_logo
 * @property string|null $business_banner
 * @property string|null $description
 * @property string|null $email
 * @property string|null $keyword
 * @property int $user_id
 *
 * @property Business $business
 * @property User $user
 */
class BusinessDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_details}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id'], 'required'],
            [['business_id'], 'integer'],
            [['description', 'keyword'], 'string'],
            [['business_logo'], 'string', 'max' => 100],
            ['email', 'email'],
            [['business_banner'], 'string', 'max' => 50],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'business_id' => Yii::t('app', 'Business ID'),
            'business_logo' => Yii::t('app', 'Business Logo'),
            'business_banner' => Yii::t('app', 'Business Banner'),
            'description' => Yii::t('app', 'Description'),
            'email' => Yii::t('app', 'Email'),
            'keyword' => Yii::t('app', 'Keyword'),
            
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
