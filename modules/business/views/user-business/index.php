<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\org\models\business\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Business');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="m-3">
    <?=Html::a("Back", ["/business/"]);?>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <a class="btn btn-success" href="<?=Yii::getAlias('@web')?>/business/user-business/create-business">Add
            Business</a>
    </p>

    <p class="mb-4">Here you can manage all business easily.</p>

    <div class="row">
        <!-- DataTales Example -->
        <?php foreach ($model as $key => $val) { ?>
        <?php $value = $val->business; ?>

        <?php if($value->is_deleted == 1){continue;} ?>
        <div class="col-md-6 col">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $value->bus_name ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tbody>
                                
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
                                    <td>
                                        <?php if($value->bus_qrcode){ ?>
                                        <img 
                                            src='<?=Yii::getAlias('@web')?>/web/img/business/qr-code/<?=$value->bus_qrcode?>' 
                                            width='150px' 
                                            alt='<?=$value->bus_qrcode?>' 
                                        />
                                        <?php } ?>
                                    </td>
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
                                    <td><?=date("jS \of F Y", strtotime($value->created_at))?></td>
                                </tr>

                                <tr>
                                    <th>Updated At</th>
                                    <td><?=date("jS \of F Y", strtotime($value->updated_at))?></td>
                                </tr>

                                <tr>
                                    <td colspan='2'>
                                        
                                        <?= Html::a(Yii::t('app', 'Public Profile'), ['/e-market/business-profile', 'id' => $value->bus_username], ['target' => '_blank', 'class' => 'btn btn-success']) ?>
                                        <?= Html::a(Yii::t('app', 'Profile'), ['business-profile', 'id' => $value->id], ['class' => 'btn btn-success']) ?>

                                        <?= Html::a(Yii::t('app', 'Catalog'), ['catalog', 'id' => $value->id], ['class' => 'btn btn-primary']) ?>
                                        
                                        <?= Html::a(Yii::t('app', 'Delete'), ['delete-business', 'id' => $value->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => Yii::t('app', 'Are you sure you want to delete this business?'),
                                                'method' => 'post',
                                            ],
                                        ]) ?>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <?php } ?>
    </div>

</div>