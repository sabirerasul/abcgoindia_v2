<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'mobile',
            'dob',
            //'w_n',
            //'p',
            //'token',
            //'gender',
            //'created_at',
            //'status',
            //'profile_photo',
            //'job',
            //'homeplace_pin',
            //'homeplace_city',
            //'homeplace_state',
            //'homeplace_country',
            //'workplace_pin',
            //'workplace_city',
            //'workplace_state',
            //'workplace_country',
            //'otherplace_pin',
            //'otherplace_city',
            //'otherplace_state',
            //'otherplace_country',
            //'website',
            //'facebook',
            //'hobbie1',
            //'hobbie2',
            //'hobbie3',
            //'about:ntext',
            //'ip_addr',
            //'os',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
