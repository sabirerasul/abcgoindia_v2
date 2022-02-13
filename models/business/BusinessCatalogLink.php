<?php

namespace app\models\business;

use Yii;

/**
 * This is the model class for table "ai_business_catalog_link".
 *
 * @property int $id
 * @property string $link
 * @property int $catalog_id
 *
 * @property AiBusinessCatalog $catalog
 */
class BusinessCatalogLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_business_catalog_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['link', 'catalog_id'], 'required'],
            [['link'], 'string'],
            [['catalog_id'], 'integer'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => AiBusinessCatalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'link' => Yii::t('app', 'Link'),
            'catalog_id' => Yii::t('app', 'Catalog ID'),
        ];
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(AiBusinessCatalog::className(), ['id' => 'catalog_id']);
    }
}
