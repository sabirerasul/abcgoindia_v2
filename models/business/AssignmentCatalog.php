<?php

namespace app\models\business;

use Yii;
use app\models\business\Business;
use app\models\business\BusinessCatalog;

/**
 * This is the model class for table "ai_assignment_catalog".
 *
 * @property int $id
 * @property int $business_id
 * @property int $catalog_id
 *
 * @property Business $business
 * @property BusinessCatalog $catalog
 */
class AssignmentCatalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%assignment_catalog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id', 'catalog_id'], 'required'],
            [['business_id', 'catalog_id'], 'integer'],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => Business::className(), 'targetAttribute' => ['business_id' => 'id']],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessCatalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
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
            'catalog_id' => Yii::t('app', 'Catalog ID'),
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

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(BusinessCatalog::className(), ['id' => 'catalog_id']);
    }
}
