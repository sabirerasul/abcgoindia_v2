<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\org\models\business\BusinessCatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Business Categories');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Business Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p class="mb-4">Here you can manage all business categories easily.</p>

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
                    'cat_name:ntext',
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

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'template' => '{view}{business}{delete}',
                        'buttons' => [
                            
                            'view' => function ($data) {
                                
                                $html = "<a class='btn btn-primary btn-circle btn-sm ml-1 mb-1' href='".$data."'><i class='fas fa-eye'></i></a>";
                                return $html;
                            },
                            'business' => function ($data) {
                                $html = "<a class='btn btn-success btn-circle btn-sm ml-1 mb-1'  href='".$data."'><i class='fas fa-briefcase'></i></a>";
                                return $html;
                            },
                            'delete' => function ($data) {
                                $html = "<a class='btn btn-danger btn-circle btn-sm ml-1 mb-1'  href='".$data."'><i class='fas fa-trash'></i></a>";
                                return $html;
                            },
                          ],
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>

</div>
