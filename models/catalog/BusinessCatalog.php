<?php

namespace app\models\catalog;

use Yii;

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
 * @property AiBusinessCatalogDetail[] $aiBusinessCatalogDetails
 * @property AiBusinessCatalogLink[] $aiBusinessCatalogLinks
 * @property AiBusiness $business
 * @property AiUser $user
 */
class BusinessCatalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_business_catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id', 'user_id', 'catalog_name', 'catalog_token', 'created_at'], 'required'],
            [['business_id', 'user_id'], 'integer'],
            [['catalog_name'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['catalog_token'], 'string', 'max' => 20],
            [['business_id'], 'exist', 'skipOnError' => true, 'targetClass' => AiBusiness::className(), 'targetAttribute' => ['business_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AiUser::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => Yii::t('app', 'User ID'),
            'catalog_name' => Yii::t('app', 'Catalog Name'),
            'catalog_token' => Yii::t('app', 'Catalog Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[AiBusinessCatalogDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAiBusinessCatalogDetails()
    {
        return $this->hasMany(AiBusinessCatalogDetail::className(), ['catalog_id' => 'id']);
    }

    /**
     * Gets query for [[AiBusinessCatalogLinks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAiBusinessCatalogLinks()
    {
        return $this->hasMany(AiBusinessCatalogLink::className(), ['catalog_id' => 'id']);
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AiUser::className(), ['id' => 'user_id']);
    }
}
