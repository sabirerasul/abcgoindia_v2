<?php

namespace app\modules\org\models\business;

use Yii;

/**
 * This is the model class for table "ai_business_details".
 *
 * @property int $id
 * @property int $business_id
 * @property string|null $business_logo
 * @property string|null $business_banner
 * @property string|null $description
 * @property string|null $email
 * @property string|null $keyword
 * @property int $user_id
 *
 * @property AiBusiness $business
 * @property AiUser $user
 */
class BusinessDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_business_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['business_id', 'user_id'], 'required'],
            [['business_id', 'user_id'], 'integer'],
            [['description', 'keyword'], 'string'],
            [['business_logo', 'email'], 'string', 'max' => 100],
            [['business_banner'], 'string', 'max' => 50],
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
            'business_logo' => Yii::t('app', 'Business Logo'),
            'business_banner' => Yii::t('app', 'Business Banner'),
            'description' => Yii::t('app', 'Description'),
            'email' => Yii::t('app', 'Email'),
            'keyword' => Yii::t('app', 'Keyword'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
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
