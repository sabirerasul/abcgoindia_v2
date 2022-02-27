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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Business</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <td colspan='2' style="text-align:right">
                                <a class="btn btn-primary"
                                    href="<?=Yii::getAlias('@web')?>/org/user-business/update?id=<?=$model->id?>">Update</a>
                            </td>
                        </tr>

                        <tr>
                            <th>Business Name</th>
                            <td><?=$model->bus_name?></td>
                        </tr>

                        <tr>
                            <th>Business Username</th>
                            <td><?=$model->bus_username?></td>
                        </tr>

                        <tr>
                            <th>Business Category</th>
                            <td><?=$model->busCat->cat_name?></td>
                        </tr>

                        <tr>
                            <th>QR Code</th>
                            <td><?=$model->bus_qrcode?></td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td><?=$model->bus_number?></td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td><?=$model->updated_at?></td>
                        </tr>
                        <tr>
                            <th>Business Since</th>
                            <td><?=date("jS \of F Y", strtotime($model->created_at))?></td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td><?php
                            if($model->status == 0){
                                $newStatus = '<span style=color:red>Deactive</span>';
                            }
                            if($model->status == 1){
                                $newStatus = '<span style=color:green>Active</span>';
                            }
                            if($model->status == 3){
                                $newStatus = '<span style=color:grey>Hide</span>';
                            }
                            echo $newStatus;
                            ?></td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Business Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <td colspan='2' style="text-align:right">
                        <a class="btn btn-primary"
                            href="<?=Yii::getAlias('@web')?>/org/user-business/update-details?id=<?=$model->id?>">Update</a>

                    </td>
                    <tbody>
                        <?php if(!empty($model->businessDetails)>0){ ?>
                        <tr>
                            <th scop="col">Business Logo</th>
                            <td><?=$model->businessDetails->business_logo?></td>
                        </tr>
                        <tr>
                            <th scop="col">Business Banner</th>
                            <td><?=$model->businessDetails->business_banner?></td>
                        </tr>
                        <tr>
                            <th scop="col">Description</th>
                            <td><?=$model->businessDetails->description?></td>
                        </tr>
                        <tr>
                            <th scop="col">Email</th>
                            <td><?=$model->businessDetails->email?></td>
                        </tr>
                        <tr>
                            <th scop="col">Keyword</th>
                            <td><?=$model->businessDetails->keyword?></td>
                        </tr>

                        <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Business Working Day</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php if(!empty($model->businessWorkingDay)>0){
                            foreach ($model->businessWorkingDay as $key => $businessWorkingDay) {
                                //if($businessWorkingDay->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <td colspan='2' style="text-align:right">
                            <a class="btn btn-primary"
                                href="<?=Yii::getAlias('@web')?>/org/user-business/update-working-day?id=<?=$model->id?>&working_day_id=<?=$businessWorkingDay->id?>">Update</a>
                            
                        </td>
                        <tr>
                            <th scop="col">Day</th>
                            <td><?=$businessWorkingDay->day?></td>
                        </tr>
                        <tr>
                            <th scop="col">From Time</th>
                            <td><?=$businessWorkingDay->from_time?></td>
                        </tr>
                        <tr>
                            <th scop="col">To Time</th>
                            <td><?=$businessWorkingDay->to_time?></td>
                        </tr>

                        <tr>
                            <th scop="col">Is Working Day</th>
                            <td><?=$businessWorkingDay->working_day?></td>
                        </tr>
                    </tbody>
                </table>
                <?php //}
                }} ?>

                <div>
                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/org/user-business/create-working-day?id=<?=$model->id?>">Add New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Business Address</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">



                <?php if(!empty($model->businessAddresses)>0){ ?>

                <?php foreach ($model->businessAddresses as $key => $businessAddresses) {
                                if($businessAddresses->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <td colspan='2' style="text-align:right">
                                <a class="btn btn-primary"
                                    href="<?=Yii::getAlias('@web')?>/org/user-business/update-address?id=<?=$model->id?>&address_id=<?=$businessAddresses->id?>">Update</a>
                                <a class="btn btn-danger"
                                    href="<?=Yii::getAlias('@web')?>/org/user-business/delete-address?id=<?=$model->id?>&address_id=<?=$businessAddresses->id?>">Delete</a>

                            </td>
                        </tr>
                        <tr>
                            <th scop="col">Address</th>
                            <td><?=$businessAddresses->address?></td>
                        </tr>
                        <tr>
                            <th scop="col">Zipcode</th>
                            <td><?=$businessAddresses->zipcode?></td>
                        </tr>
                        <tr>
                            <th scop="col">City</th>
                            <td><?=$businessAddresses->city?></td>
                        </tr>
                        <tr>
                            <th scop="col">State</th>
                            <td><?=$businessAddresses->state?></td>
                        </tr>
                        <tr>
                            <th scop="col">Country</th>
                            <td><?=$businessAddresses->country?></td>
                        </tr>
                        <tr>
                            <th scop="col">Address Type</th>
                            <td><?=$businessAddresses->address_type?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }} ?>

                <?php } ?>

                <div>
                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/org/user-business/create-address?id=<?=$model->id?>">Add New</a>
                </div>

            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Business Profile Links</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <?php if(!empty($model->businessProfileLinks)>0){
                            foreach ($model->businessProfileLinks as $key => $businessProfileLinks) {
                                if($businessProfileLinks->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>

                        <td colspan='2' style="text-align:right">
                            <a class="btn btn-primary"
                                href="<?=Yii::getAlias('@web')?>/org/user-business/update-profile-link?id=<?=$model->id?>&profile_link_id=<?=$businessProfileLinks->id?>">Update</a>
                            <a class="btn btn-danger"
                                href="<?=Yii::getAlias('@web')?>/org/user-business/delete-profile-link?id=<?=$model->id?>&profile_link_id=<?=$businessProfileLinks->id?>">Delete</a>

                        </td>
                        <tr>
                            <th scop="col"><?=$businessProfileLinks->title?></th>
                            <td><a href="<?=$businessProfileLinks->link?>" target="_blank"><?=$businessProfileLinks->link?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php }}} ?>

                <div>

                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/org/user-business/create-profile-link?id=<?=$model->id?>">Add New</a>
                </div>

            </div>
        </div>
    </div>

</div>