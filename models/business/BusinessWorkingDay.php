<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "{{%business_working_day}}".
 *
 * @property int $id
 * @property int $business_id
 * @property string $day
 * @property string|null $from_time
 * @property string|null $to_time
 * @property int $is_day_off
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Business $business
 */
class BusinessWorkingDay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_working_day}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id', 'day'], 'required'],
            [['business_id', 'working_day'], 'integer'],
            [['from_time', 'to_time', 'created_at', 'updated_at'], 'safe'],
            [['day'], 'string', 'max' => 15],
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
            'business_id' => 'Business ID',
            'day' => 'Day',
            'from_time' => 'From Time',
            'to_time' => 'To Time',
            'working_day' => 'Is Working Day',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
