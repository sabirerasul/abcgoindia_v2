<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\Business */

$this->title =  Yii::t('app', $model->bus_name);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Businesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>

<div class="m-3">
<?= Html::a( 'Back', Yii::$app->request->referrer)?>
</div>

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
                                    href="<?=Yii::getAlias('@web')?>/business/user-business/business-update?user_id=<?=$user_id?>&id=<?=$model->id?>">Update</a>
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
                            <td>
                                <?php if($model->bus_qrcode){ ?>
                                <img 
                                    src='<?=Yii::getAlias('@web')?>/web/img/business/qr-code/<?=$model->bus_qrcode?>' 
                                    width='150px' alt='<?=$model->bus_qrcode?>'
                                    style="border:1px solid #7A0BC0;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;" 
                                />
                                <?php } ?>
                                </td>
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
                            href="<?=Yii::getAlias('@web')?>/business/user-business/business-update-details?&id=<?=$model->id?>">Update</a>

                    </td>
                    <tbody>
                        <?php if(!empty($model->businessDetails)>0){ ?>
                        <tr>
                            <th scop="col">Business Logo</th>
                            <td>
                                <?php if($model->businessDetails->business_logo){ ?>
                                <img
                                    src="<?=Yii::getAlias('@web')?>/web/img/business/business-logo/high/<?=$model->businessDetails->business_logo?>"
                                    style="width:100px;height:100px;border-radius:50%;border:2px solid #7A0BC0;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;"
                                    alt='<?=$model->businessDetails->business_logo?>'
                                />
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th scop="col">Business Banner</th>
                            <td>
                                <?php if($model->businessDetails->business_banner){ ?>
                                <img
                                    src="<?=Yii::getAlias('@web')?>/web/img/business/business-banner/high/<?=$model->businessDetails->business_banner?>"
                                    width='100%'
                                    alt='<?=$model->businessDetails->business_banner?>'
                                />
                                <?php } ?>
                            </td>
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
                                href="<?=Yii::getAlias('@web')?>/business/user-business/update-working-day?user_id=<?=$user_id?>&business_id=<?=$model->id?>&working_day_id=<?=$businessWorkingDay->id?>">Update</a>
                            
                        </td>
                        <tr>
                            <th scop="col">Day</th>
                            <td><?php echo ucwords($businessWorkingDay->day)?></td>
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
                            <td><?=($businessWorkingDay->working_day == 1) ? 'Yes' : 'No'?></td>
                        </tr>
                    </tbody>
                </table>
                <?php //}
                }} ?>

                <div>
                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/business/user-business/create-working-day?id=<?=$model->id?>">Add New</a>
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
                                    href="<?=Yii::getAlias('@web')?>/business/user-business/update-address?id=<?=$model->id?>&address_id=<?=$businessAddresses->id?>">Update</a>
                                <a class="btn btn-danger"
                                    href="<?=Yii::getAlias('@web')?>/business/user-business/delete-address?id=<?=$model->id?>&address_id=<?=$businessAddresses->id?>">Delete</a>

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
                        href="<?=Yii::getAlias('@web')?>/business/user-business/create-address?id=<?=$model->id?>">Add New</a>
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
                                href="<?=Yii::getAlias('@web')?>/business/user-business/update-profile-link?id=<?=$model->id?>&profile_link_id=<?=$businessProfileLinks->id?>">Update</a>
                            <a class="btn btn-danger"
                                href="<?=Yii::getAlias('@web')?>/business/user-business/delete-profile-link?id=<?=$model->id?>&profile_link_id=<?=$businessProfileLinks->id?>">Delete</a>

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
                        href="<?=Yii::getAlias('@web')?>/business/user-business/update-profile-link?id=<?=$model->id?>&profile_link_id=0">Add New</a>
                </div>

            </div>
        </div>
    </div>

</div>