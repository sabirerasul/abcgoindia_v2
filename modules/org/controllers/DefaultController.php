<?php

namespace app\modules\org\controllers;

use yii\web\Controller;

/**
 * Default controller for the `org` module
 */
class DefaultController extends Controller
{
    public $layout = '@app/themes/backend/main';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
