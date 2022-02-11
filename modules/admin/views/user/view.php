<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

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
            'name',
            'email:email',
            'mobile',
            'dob',
            'w_n',
            'p',
            'token',
            'gender',
            'created_at',
            'status',
            'profile_photo',
            'job',
            'homeplace_pin',
            'homeplace_city',
            'homeplace_state',
            'homeplace_country',
            'workplace_pin',
            'workplace_city',
            'workplace_state',
            'workplace_country',
            'otherplace_pin',
            'otherplace_city',
            'otherplace_state',
            'otherplace_country',
            'website',
            'facebook',
            'hobbie1',
            'hobbie2',
            'hobbie3',
            'about:ntext',
            'ip_addr',
            'os',
        ],
    ]) ?>

</div>
