<?php

namespace app\modules\org\models;

use Yii;

/**
 * This is the model class for table "ai_user_hobby".
 *
 * @property int $id
 * @property int $user_id
 * @property string $hobby
 *
 * @property AiUser $user
 */
class UserHobby extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ai_user_hobby';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'hobby'], 'required'],
            [['user_id'], 'integer'],
            [['hobby'], 'string'],
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
            'hobby' => Yii::t('app', 'Hobby'),
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
