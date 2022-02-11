<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\org\models\catalog\BusinessCatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Business Catalogs');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Business Catalog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="mb-4">Here you can manage all business catalog easily.</p>

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
                    [
                        'attribute' => 'business_id',  
                        'format' => 'html', 
                        'value' => function ($data) {
                            return $data->business->bus_name;
                        },
                    ],
                    
                    [
                        'attribute' => 'user_id',  
                        'format' => 'html', 
                        'value' => function ($data) {
                            return $data->user->name;
                        },
                    ],
                    
                    'catalog_name:ntext',
                    //'catalog_token',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>

</div>
