<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "{{%business_catalog_cat}}".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 *
 * @property BusinessCatalog[] $businessCatalogs
 */
class BusinessCatalogCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_catalog_cat}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'created_at'], 'required'],
            [['title'], 'string'],
            [['created_at', 'status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[BusinessCatalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCatalogs()
    {
        return $this->hasMany(BusinessCatalog::className(), ['catalog_cat_id' => 'id']);
    }
}
