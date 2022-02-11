<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Businesses';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Business', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p class="mb-4">Here you can manage business easily.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'business_logo',
            //'business_banner',
            'business_name',
            //'username',
            //'catagory',
            //'working_day',
            //'working_time',
            //'description:ntext',
            //'qr_code',
            'number',
            'email:email',
            //'website',
            //'area_pin',
            //'city',
            //'state',
            //'country',
            //'address',
            //'YLink:ntext',
            //'FLink:ntext',
            //'PLink:ntext',
            //'created_at',
            //'uid',
            'status',
            //'security_pin',
            //'keyword:ntext',
            //'ip_addr',
            //'loc',
            //'os',
            //'token',
            //'vbid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            </div>
        </div>
    </div>

</div>

<!--
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Business Logo</th>
                            <th>Business Banner</th>
                            <th>Business Name</th>
                            <th>Username</th>
                            <th>QR Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Business Logo</th>
                            <th>Business Banner</th>
                            <th>Business Name</th>
                            <th>Username</th>
                            <th>QR Code</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td><?php //=$model->?></td>
                            <td><?php //=$model->number?></td>
                            <td><?php //=$model->email?></td>
                            <td><?php //=$model->business_name?></td>
                            <td><?php //=$model->qr_code ?></td>
                            <td><?php //=$model->description?></td>
                        </tr>                        
                    </tbody>
                </table> -->