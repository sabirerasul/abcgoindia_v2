<?php

namespace app\modules\business;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * business module definition class
 */
class business extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\business\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if(Yii::$app->user->isGuest) {
            throw new NotFoundHttpException('Not logging in');
        }

        // custom initialization code goes here
    }
}
