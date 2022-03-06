<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "{{%business_catalog_link}}".
 *
 * @property int $id
 * @property string $link
 * @property string|null $title
 * @property int $catalog_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property BusinessCatalog $catalog
 */
class BusinessCatalogLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%business_catalog_link}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link', 'catalog_id'], 'required'],
            [['link', 'title'], 'string'],
            [['catalog_id'], 'integer'],
            ['link', 'url'],
            [['created_at', 'updated_at', 'status'], 'safe'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessCatalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'link' => 'Link',
            'title' => 'Title',
            'catalog_id' => 'Catalog ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
