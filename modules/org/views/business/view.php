<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\Business */

$this->title = $model->bus_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Businesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'id',
                        [
                            'attribute' => 'user_id',  
                            'format' => 'html', 
                            'value' => function ($data) {
                                return $data->assignmentBusiness->user->name;
                            },
                        ],
                        'bus_name',
                        'bus_username',
                        [
                            'attribute' => 'bus_cat',  
                            'format' => 'html', 
                            'value' => function ($data) {
                                return $data->busCat->cat_name;
                            },
                        ],
                        'bus_qrcode',
                        'bus_number',
                        //'status',
                        'bus_token:ntext',
                        'created_at',
                        'updated_at',
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
                                if($data->status == 3){
                                    $newStatus = '<span style=color:grey>Hide</span>';
                                }
                                return $newStatus;
                            },
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>

</div>
