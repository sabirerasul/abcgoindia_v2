<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "ai_business_profile_link".
 *
 * @property int $id
 * @property int $business_id
 * @property string|null $youtube
 * @property string|null $facebook
 * @property string|null $paytm
 * @property string $website
 *
 * @property AiBusiness $business
 */
class BusinessProfileLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_profile_link}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id', 'website'], 'required'],
            [['business_id'], 'integer'],
            [['youtube', 'facebook', 'paytm', 'website'], 'string'],
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
            'business_id' => Yii::t('app', 'Business ID'),
            'youtube' => Yii::t('app', 'Youtube'),
            'facebook' => Yii::t('app', 'Facebook'),
            'paytm' => Yii::t('app', 'Paytm'),
            'website' => Yii::t('app', 'Website'),
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
