<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessItems */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Business Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="business-items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'items',
            'picture',
            'video',
            'price',
            'link:ntext',
            'description:ntext',
            'rand_code',
            'uid',
            'keyword',
            'imei',
            'ip_addr',
            'loc',
            'os',
            'created_at',
            'bid',
        ],
    ]) ?>

</div>
