<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\org\models\business\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Business';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <a class="btn btn-success" href="<?=Yii::getAlias('@web')?>/org/user-business/create?user_id=<?=$user_id?>">Add Business</a>
    </p>

    <p class="mb-4">Here you can manage all business easily.</p>

    <!-- DataTales Example -->
    <?php foreach ($model as $key => $val) { ?>
        <?php $value = $val->business; ?>
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $value->bus_name ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <td colspan='2' style="text-align:right">
                                <a class="btn btn-primary"
                                    href="<?=Yii::getAlias('@web')?>/org/user-business/update?id=<?=$value->id?>">Update</a>
                                <a class="btn btn-danger"
                                    href="<?=Yii::getAlias('@web')?>/org/user-business/delete-address?id=<?=$value->id?>">Delete</a>

                            </td>
                        </tr>

                        <tr>
                            <th>Business Name</th>
                            <td><?=$value->bus_name?></td>
                        </tr>

                        <tr>
                            <th>Business Username</th>
                            <td><?=$value->bus_username?></td>
                        </tr>

                        <tr>
                            <th>Business Category</th>
                            <td><?=$value->busCat->cat_name?></td>
                        </tr>

                        <tr>
                            <th>Business Qrcode</th>
                            <td><?=$value->bus_qrcode?></td>
                        </tr>

                        <tr>
                            <th>Business Number</th>
                            <td><?=$value->bus_number?></td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <?php
                            
                                $newStatus = 1;
                            
                                if($value->status == 0){
                                    $newStatus = '<span style=color:red>Deactive</span>';
                                }
                                if($value->status == 1){
                                    $newStatus = '<span style=color:green>Active</span>';
                                }
                                if($value->status == 2){
                                    $newStatus = '<span style=color:grey>Hide</span>';
                                }
                                echo $newStatus;

                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Business Since</th>
                            <td><?=$value->created_at?></td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td><?=$value->updated_at?></td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
        
    </div>
    <?php } ?>

</div>