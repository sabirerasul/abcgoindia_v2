<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */

$this->title = Yii::t('app', 'Update User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="m-3">
<?= Html::a( 'Back', Yii::$app->request->referrer)?>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->render('_form-user-update0', [
        'user' => $user,
        'userDetail' => $userDetail,
    ]) ?>

</div>