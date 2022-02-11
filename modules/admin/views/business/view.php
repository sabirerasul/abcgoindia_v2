<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Business */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Businesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="business-view">

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
            'business_logo',
            'business_banner',
            'business_name',
            'username',
            'catagory',
            'working_day',
            'working_time',
            'description:ntext',
            'qr_code',
            'number',
            'email:email',
            'website',
            'area_pin',
            'city',
            'state',
            'country',
            'address',
            'YLink:ntext',
            'FLink:ntext',
            'PLink:ntext',
            'created_at',
            'uid',
            'status',
            'security_pin',
            'keyword:ntext',
            'ip_addr',
            'loc',
            'os',
            'token',
            'vbid',
        ],
    ]) ?>

</div>
