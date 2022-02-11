<?php

namespace app\modules\org\models;

use Yii;

/**
 * This is the model class for table "ai_user_profile_link".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $website
 * @property string|null $facebook
 *
 * @property AiUser $user
 */
class UserProfileLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_user_profile_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['website', 'facebook'], 'string'],
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
            'user_id' => Yii::t('app', 'User ID'),
            'website' => Yii::t('app', 'Website'),
            'facebook' => Yii::t('app', 'Facebook'),
        ];
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
