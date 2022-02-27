<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\Business */

$this->title = Yii::t('app', 'Update Business: {name}', [
    'name' => $model->bus_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Businesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="container-fluid">
    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

            <?= $this->render('_form-update', [
                'model' => $model,
                'categories' => $categories,
            ]) ?>

            </div>
        </div>
    </div>

</div>
