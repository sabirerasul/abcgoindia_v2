<?php

namespace app\modules\org\models\business;

use Yii;

/**
 * This is the model class for table "ai_business_cat".
 *
 * @property int $id
 * @property string $cat_name
 * @property string $created_at
 * @property int $status
 *
 * @property AiBusiness[] $aiBusinesses
 */
class BusinessCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_business_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name', 'created_at', 'status'], 'required'],
            [['cat_name'], 'string'],
            [['created_at'], 'safe'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cat_name' => Yii::t('app', 'Cat Name'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[AiBusinesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinesses()
    {
        return $this->hasMany(Business::className(), ['bus_cat' => 'id']);
    }
}
