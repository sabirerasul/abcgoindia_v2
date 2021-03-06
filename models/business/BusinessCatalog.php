<?php

namespace app\models\business;

use Yii;
use app\models\business\BusinessCatalogDetail;
use app\models\business\BusinessCatalogLink;
use app\models\AssignmentBusiness;
use app\models\business\AssignmentCatalog;

/**
 * This is the model class for table "ai_business_catalog".
 *
 * @property int $id
 * @property int $business_id
 * @property int $user_id
 * @property string $catalog_name
 * @property string $catalog_token
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property BusinessCatalogDetail[] $aiBusinessCatalogDetails
 * @property BusinessCatalogLink[] $aiBusinessCatalogLinks
 * @property Business $business
 * @property User $user
 */
class BusinessCatalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_catalog}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_name', 'catalog_token', 'created_at'], 'required'],
            [['catalog_name'], 'string'],
            [['catalog_cat_id', 'created_at', 'updated_at', 'status'], 'safe'],
            [['catalog_token'], 'string', 'max' => 20],            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'catalog_name' => Yii::t('app', 'Catalog Name'),
            'catalog_cat_id' => Yii::t('app', 'Catalog Category'),
            'catalog_token' => Yii::t('app', 'Catalog Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[BusinessCatalogDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCatalogDetails()
    {
        return $this->hasOne(BusinessCatalogDetail::className(), ['catalog_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessCatalogLinks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCatalogLinks()
    {
        return $this->hasMany(BusinessCatalogLink::className(), ['catalog_id' => 'id']);
    }

    /**
     * Gets query for [[Business]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignmentCatalog()
    {
        return $this->hasOne(AssignmentCatalog::className(), ['catalog_id' => 'id']);
    }

    /**
     * Gets query for [[BusinessCatalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCatalogCat()
    {
        return $this->hasOne(BusinessCatalogCat::className(), ['id' => 'catalog_cat_id']);
    }

}
