<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */

$this->title = Yii::t('app', 'Update User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->render('_form-user-update', [
        'user' => $user,
        'userDetail' => $userDetail,
    ]) ?>

</div>