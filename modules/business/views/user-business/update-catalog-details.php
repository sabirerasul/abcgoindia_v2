<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */

$this->title = Yii::t('app', 'Update Address: {name}', [
    'name' => 'ddfd',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'sdsdsd', 'url' => ['view', 'id' => '32']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>


<div class="m-3">
<?= Html::a( 'Back', Yii::$app->request->referrer)?>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

            <?= $this->render('_form-catalog-details', [
                'model' => $model,
            ]) ?>

            </div>
        </div>
    </div>

</div>
