<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\BusinessCat */

$this->title = Yii::t('app', 'Update Business Category: {name}', [
    'name' => $model->cat_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Cats'), 'url' => ['index']];
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
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
            </div>
        </div>
    </div>

</div>
