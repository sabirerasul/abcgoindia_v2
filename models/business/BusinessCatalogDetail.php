<?php

namespace app\models\business;

use Yii;
use app\models\business\BusinessCatalog;
use app\models\business\Business;

/**
 * This is the model class for table "ai_business_catalog_details".
 *
 * @property int $id
 * @property int $catalog_id
 * @property string|null $catalog_picture
 * @property string|null $catalog_video
 * @property string|null $catalog_price
 * @property string|null $catalog_description
 * @property string|null $catalog_keyword
 *
 * @property Business $business
 * @property BusinessCatalog $catalog
 */
class BusinessCatalogDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_catalog_details}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_id'], 'required'],
            [['catalog_id'], 'integer'],
            [['catalog_description', 'catalog_keyword'], 'string'],
            [['catalog_picture'], 'string', 'max' => 255],
            [['catalog_video'], 'string', 'max' => 150],
            [['catalog_price'], 'string', 'max' => 100],
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
            'catalog_id' => Yii::t('app', 'Catalog ID'),
            'catalog_picture' => Yii::t('app', 'Catalog Picture'),
            'catalog_video' => Yii::t('app', 'Catalog Video'),
            'catalog_price' => Yii::t('app', 'Catalog Price'),
            'catalog_description' => Yii::t('app', 'Catalog Description'),
            'catalog_keyword' => Yii::t('app', 'Catalog Keyword'),
        ];
    }

    /**
     * Gets query for [[Business]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*public function getBusiness()
    {
        return $this->hasOne(Business::className(), ['id' => 'business_id']);
    }*/

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
