<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "ai_business_hours".
 *
 * @property int $id
 * @property int $day_name
 * @property string|null $from_time
 * @property string|null $to_time
 * @property int $business_id
 *
 * @property AiBusiness $business
 */
class BusinessHour extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_business_hours';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day_name', 'business_id'], 'required'],
            [['day_name', 'business_id'], 'integer'],
            [['from_time', 'to_time'], 'safe'],
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
            'day_name' => Yii::t('app', 'Day Name'),
            'from_time' => Yii::t('app', 'From Time'),
            'to_time' => Yii::t('app', 'To Time'),
            'business_id' => Yii::t('app', 'Business ID'),
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
