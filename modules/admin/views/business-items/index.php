<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Business Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'items',
            'picture',
            'video',
            'price',
            //'link:ntext',
            //'description:ntext',
            //'rand_code',
            //'uid',
            //'keyword',
            //'imei',
            //'ip_addr',
            //'loc',
            //'os',
            //'created_at',
            //'bid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
