<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cad_cam_india}}".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $date_of_joining
 * @property string $qualification
 * @property string $institute_name
 * @property string $address
 */
class CadCamIndia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cad_cam_india}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'mobile', 'date_of_joining', 'autocad'], 'required'],
            [['date_of_joining'], 'safe'],
            ['email', 'email'],
            [['institute_name', 'address', 'autocad'], 'string'],
            [['name', 'email', 'qualification'], 'string', 'max' => 100],
            [['mobile'], 'string', 'max' => 20],
            [['email', 'mobile'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'date_of_joining' => 'Date Of Joining',
            'qualification' => 'Qualification',
            'institute_name' => 'College Name',
            'address' => 'Address',
            'autocad' => 'Select Software',
        ];
    }
}
