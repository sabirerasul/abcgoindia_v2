<?php

use yii\helpers\Html;

use yii\bootstrap4\Breadcrumbs;

use yii\bootstrap4\Modal;
//use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


    if($model->status == 0){
        $newStatus = 'Deactive';
    }

    if($model->status == 1){
        $newStatus = 'Active';
    }
                            
                        

?>

<div class="m-3">
<?= Html::a( 'Back', Yii::$app->request->referrer)?>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="card shadow mb-4">

                <div class="card-body">

                    <div class="col-12 p-4 d-flex justify-content-center align-item-center"
                        style="display: flex;align-items: center;justify-content: center;flex-direction: column;">

                        <div class="image-container">
                            <?php
                                if($model && $model->userDetails->profile_photo != ''){
                                    $path = Yii::getAlias('@web').'/web/img/user/high/'.$model->userDetails->profile_photo;
                                }else{
                                    $path = Yii::getAlias('@web').'/themes/backend/img/undraw_profile.svg';
                                }
                            ?>
                            <img 
                                class="img-circle rounded-circle"
                                style="width:120px;height:120px;flex-direction:column"
                                src='<?=$path?>'
                            />


                        </div>

                        <div style="text-align:center" class="mt-4">

                            <p class="h5"><?=$model->name?></p>
                            <p class="text"><?=$model->username?></p>

                            <p><span class="badge badge-pill badge-success" style='min-width:60px'><?=$model->user_role?></span></p>
                                                        
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>
                                    <th>Personal Info</th>
                                    <td style='text-align:right';>
                                            <a class="btn btn-primary"
                                                href="<?=Yii::getAlias('@web')?>/business/user/user-update"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td><?=$model->name?></td>
                                </tr>

                                <tr>
                                    <th>Username</th>
                                    <td><?=$model->username?></td>
                                </tr>

                                <tr>
                                    <th>Mobile</th>
                                    <td><?=$model->mobile?></td>
                                </tr>

                                <tr>
                                    <th>Updated At</th>
                                    <td><?=$model->updated_at?></td>
                                </tr>

                                <tr>
                                    <th>User Since</th>
                                    <td><?=date("jS \of F Y", strtotime($model->created_at))?></td>
                                </tr>
                                
                                <tr>
                                    <th>Status </th>
                                    <td>
                                        <p><span class="badge badge-pill badge-success"><?=$newStatus?></span></p>
                                    </td>
                                </tr>

                            <tbody>

                            <thead>
                                <th colspan="2">User Details</th>
                            </thead>
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


                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th colspan="2">Address Info</th>
                            </thead>

                            <?php if(!empty($model->userAddresses)>0){ ?>

                            <?php foreach ($model->userAddresses as $key => $userAddress) {
        if($userAddress->status == 1){ ?>
                            <tbody>

                                <tr>
                                    <th scop="col">Address</th>
                                    <td><?=$userAddress->address?></td>
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
                                <tr>
                                    <td colspan='2'>
                                        <a class="btn btn-primary"
                                            href="<?=Yii::getAlias('@web')?>/business/user/save-user-address?userAddressId=<?=$userAddress->id?>">
                                            <i class="fas fa-edit"></i>

                                        </a>
                                        <a class="btn btn-danger"
                                            href="<?=Yii::getAlias('@web')?>/business/user/delete-user-address?userAddressId=<?=$userAddress->id?>">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                            <?php }} } ?>

                            <tbody>
                                <tr>
                                    <td colspan='2'>
                                        <a class="btn btn-success"
                                            href="<?=Yii::getAlias('@web')?>/business/user/save-user-address?userAddressId=0"><i
                                                class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>




                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                            <thead>
                                <th colspan="2">Hobbies</th>
                            </thead>
                            <?php if(!empty($model->userHobbies)>0){
                            foreach ($model->userHobbies as $key => $userHobbies) {
                                if($userHobbies->status == 1){ ?>

                            <tbody>

                                <tr>
                                    <td><?=$userHobbies->hobby?></td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="<?=Yii::getAlias('@web')?>/business/user/save-user-hobby?userHobbyId=<?=$userHobbies->id?>">
                                            <i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger"
                                            href="<?=Yii::getAlias('@web')?>/business/user/delete-user-hobby?userHobbyId=<?=$userHobbies->id?>">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                            <?php }}} ?>

                            <tbody>
                                <tr>
                                    <td colspan='2'>
                                        <a class="btn btn-success"
                                            href="<?=Yii::getAlias('@web')?>/business/user/save-user-hobby?userHobbyId=0"><i
                                                class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                                <tr>

                                    <th colspan="2">Links</th>
                                </tr>
                            </thead>
                            <?php if(!empty($model->userProfileLinks)>0){
                            foreach ($model->userProfileLinks as $key => $userProfileLinks) {
                                if($userProfileLinks->status == 1){ ?>


                            <tbody>


                                <tr>
                                    <td><a href="<?=$userProfileLinks->link?>"
                                            target="_blank"><?=$userProfileLinks->title?></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="<?=Yii::getAlias('@web')?>/business/user/save-user-profile-link?userProfileLinkId=<?=$userProfileLinks->id?>">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger"
                                            href="<?=Yii::getAlias('@web')?>/business/user/delete-user-profile-link?userProfileLinkId=<?=$userProfileLinks->id?>">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>

                            </tbody>
                            <?php }}} ?>

                            <tbody>
                                <tr>

                                    <td colspan="2">
                                        <a class="btn btn-success"
                                            href="<?=Yii::getAlias('@web')?>/business/user/save-user-profile-link?userProfileLinkId=0"><i
                                                class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>



    </div>
</div>

<style>

</style>