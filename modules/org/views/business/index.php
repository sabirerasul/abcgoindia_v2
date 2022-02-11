<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\org\models\business\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Businesses';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Business', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p class="mb-4">Here you can manage all business easily.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
                    //'user_id',
                    [
                        'attribute' => 'user_id',  
                        'format' => 'html', 
                        'value' => function ($data) {
                            return $data->user->name;
                        },
                    ],
                    'bus_name',
                    'bus_username',
                    //'bus_cat',
                    [
                        'attribute' => 'bus_cat',  
                        'format' => 'html', 
                        'value' => function ($data) {
                            return $data->busCat->cat_name;
                        },
                    ],
                    //'bus_qrcode',
                    //'bus_number',
                    //'status',
                    //'bus_token:ntext',
                    //'created_at',
                    //'updated_at',
                    [
                        'attribute' => 'status',
                        'format' => 'html',    
                        'value' => function ($data) {
                            $newStatus = 1;
                            
                            if($data->status == 0){
                                $newStatus = '<span style=color:red>Deactive</span>';
                            }
                            if($data->status == 1){
                                $newStatus = '<span style=color:green>Active</span>';
                            }
                            if($data->status == 2){
                                $newStatus = '<span style=color:grey>Hide</span>';
                            }
                            return $newStatus;
                        },
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>

</div>
