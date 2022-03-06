<?php

namespace app\modules\org;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * org module definition class
 */
class index extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\org\controllers';

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
