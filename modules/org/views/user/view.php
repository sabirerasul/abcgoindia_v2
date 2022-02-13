<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php /*
    Modal::begin([
        'header'=>'<h4>Job Created</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";
    Modal::end();*/
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Personal Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>

                        <tr>
                            <th>User ID</th>
                            <td><?=$model->id?></td>
                        <tr>
                            <th>Name</th>
                            <td><?=$model->name?></td>
                        <tr>
                            <th>Username</th>
                            <td><?=$model->username?></td>
                        <tr>
                            <th>Mobile</th>
                            <td><?=$model->mobile?></td>
                        <tr>
                            <th>Password Hash</th>
                            <td><?=$model->password_hash?></td>
                        <tr>
                            <th>Reset Token</th>
                            <td><?=$model->reset_token?></td>
                        <tr>
                            <th>Updated At</th>
                            <td><?=$model->updated_at?></td>
                        <tr>
                            <th>User Since</th>
                            <td><?=date("jS \of F Y", strtotime($model->created_at))?></td>
                        <tr>
                            <th>Status</th>
                            <td><?php
                    if($model->status == 0){
                        $newStatus = '<span style=color:red>Deactive</span>';
                    }
                    if($model->status == 1){
                        $newStatus = '<span style=color:green>Active</span>';
                    }
                    echo $newStatus;
                    ?></td>

                    </tbody>
                </table>
                <a class="btn btn-primary"
                    href="<?=Yii::getAlias('@web')?>/org/user/update?id=<?=$model->id?>">Update</a>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Other Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <?php if(!empty($model->userDetails)>0){ ?>
                        <tr>
                            <th scop="col">Email</th>
                            <td><a href="mailto:<?=$model->userDetails->email?>"
                                    target="_blank"><?=$model->userDetails->email?></a></td>
                        </tr>
                        <tr>
                            <th scop="col">Date of Birth</th>
                            <td><?=$model->userDetails->dob?></td>
                        </tr>
                        <tr>
                            <th scop="col">Whatsapp Number</th>
                            <td><a
                                    href="http://wa.me/+91<?=$model->userDetails->whatsapp_number?>"><?=$model->userDetails->whatsapp_number?></a>
                            </td>
                        </tr>
                        <tr>
                            <th scop="col">Gender</th>
                            <td><?=$model->userDetails->gender?></td>
                        </tr>
                        <tr>
                            <th scop="col">Profile Photo</th>
                            <td><?=$model->userDetails->profile_photo?></td>
                        </tr>
                        <tr>
                            <th scop="col">Job</th>
                            <td><?=$model->userDetails->job?></td>
                        </tr>
                        <tr>
                            <th scop="col">About</th>
                            <td><?=$model->userDetails->about?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <a class="btn btn-primary"
                    href="<?=Yii::getAlias('@web')?>/org/user/update-other?id=<?=$model->id?>">Update</a>

            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Address</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">



                <?php if(!empty($model->userAddresses)>0){ ?>

                <?php foreach ($model->userAddresses as $key => $userAddress) {
                                if($userAddress->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <td colspan='2' style="text-align:right">
                                <a class="btn btn-primary"
                                    href="<?=Yii::getAlias('@web')?>/org/user/update-address?id=<?=$model->id?>&address_id=<?=$userAddress->id?>">Update</a>
                                <a class="btn btn-danger"
                                    href="<?=Yii::getAlias('@web')?>/org/user/delete-address?id=<?=$model->id?>&address_id=<?=$userAddress->id?>">Delete</a>

                            </td>
                        </tr>
                        <tr>
                            <th scop="col">Zipcode</th>
                            <td><?=$userAddress->zipcode?></td>
                        </tr>
                        <tr>
                            <th scop="col">City</th>
                            <td><?=$userAddress->city?></td>
                        </tr>
                        <tr>
                            <th scop="col">State</th>
                            <td><?=$userAddress->state?></td>
                        </tr>
                        <tr>
                            <th scop="col">Country</th>
                            <td><?=$userAddress->country?></td>
                        </tr>
                        <tr>
                            <th scop="col">Address Type</th>
                            <td><?=$userAddress->address_type?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }} ?>

                <?php } ?>

                <div>
                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/org/user/create-address?id=<?=$model->id?>">Add New</a>
                </div>

            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Hobbies</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <?php if(!empty($model->userHobbies)>0){
                            foreach ($model->userHobbies as $key => $userHobbies) {
                                if($userHobbies->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <td colspan='2' style="text-align:right">
                            <a class="btn btn-primary"
                                href="<?=Yii::getAlias('@web')?>/org/user/update-hobby?id=<?=$model->id?>&hobby_id=<?=$userHobbies->id?>">Update</a>
                            <a class="btn btn-danger"
                                href="<?=Yii::getAlias('@web')?>/org/user/delete-hobby?id=<?=$model->id?>&hobby_id=<?=$userHobbies->id?>">Delete</a>

                        </td>
                        <tr>
                            <th scop="col">Hobby</th>
                            <td><?=$userHobbies->hobby?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }}} ?>

                <div>
                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/org/user/create-hobby?id=<?=$model->id?>">Add New</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Links</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <?php if(!empty($model->userProfileLinks)>0){
                            foreach ($model->userProfileLinks as $key => $userProfileLinks) {
                                if($userProfileLinks->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>

                        <td colspan='2' style="text-align:right">
                            <a class="btn btn-primary"
                                href="<?=Yii::getAlias('@web')?>/org/user/update-profile-link?id=<?=$model->id?>&profile_link_id=<?=$userProfileLinks->id?>">Update</a>
                            <a class="btn btn-danger"
                                href="<?=Yii::getAlias('@web')?>/org/user/delete-profile-link?id=<?=$model->id?>&profile_link_id=<?=$userProfileLinks->id?>">Delete</a>

                        </td>
                        <tr>
                            <th scop="col"><?=$userProfileLinks->title?></th>
                            <td><a href="<?=$userProfileLinks->link?>" target="_blank"><?=$userProfileLinks->link?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php }}} ?>

                <div>
                    <a onclick="showModal" class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/org/user/create-profile-link?id=<?=$model->id?>">Add New</a>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
    function showModal(){
        //alert();
    }
</script>