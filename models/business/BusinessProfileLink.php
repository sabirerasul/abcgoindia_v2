<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "{{%business_profile_link}}".
 *
 * @property int $id
 * @property int $business_id
 * @property string $title
 * @property string $link
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Business $business
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
            [['business_id', 'title', 'link'], 'required'],
            [['business_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            ['link', 'url'],
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
            'title' => 'Title',
            'link' => 'Link',
            'status' => 'Status',
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
