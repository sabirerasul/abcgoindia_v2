<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Begin Page Content -->
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
                    'name',
                    'username',
                    'mobile',
                    //'password_hash:ntext',
                    //'reset_token:ntext',
                    'updated_at',
                    'created_at',
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
                            return $newStatus;
                        },
                    ],
                ],
            ]) ?>
            </div>
        </div>
    </div>

</div>
