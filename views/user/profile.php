<?php
/* @var $this yii\web\View */

$this->title = $model->name. '-' . 'Profile';
?>

<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" style="background-color:#fff; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h2>Personal Info</h2>
                    <table class="table">
                        <tr>
                            <th scop="col">name</th>
                            <td><?=$model->name?></td>
                        </tr>

                        <tr>
                            <th scop="col">username</th>
                            <td><?=$model->username?></td>
                        </tr>

                        <tr>
                            <th scop="col">mobile</th>
                            <td><a href="tel:<?=$model->mobile?>"><?=$model->mobile?></a></td>
                        </tr>

                        <tr>
                            <th scop="col">User Since</th>
                            <td><?=date("jS \of F Y", strtotime($model->created_at))?></td>
                        </tr>
 
                    </table>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" style="background-color:#fff; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h2>Other Details</h2>
                    <table class="table">
                        <?php if(!empty($model->userDetails)>0){ ?>
                        <tr>
                            <th scop="col">email</th>
                            <td><a href="mailto:<?=$model->userDetails->email?>" target="_blank"><?=$model->userDetails->email?></a></td>
                        </tr>
                        <tr>
                            <th scop="col">dob</th>
                            <td><?=$model->userDetails->dob?></td>
                        </tr>
                        <tr>
                            <th scop="col">whatsapp_number</th>
                            <td><a href="http://wa.me/+91<?=$model->userDetails->whatsapp_number?>"><?=$model->userDetails->whatsapp_number?></a></td>
                        </tr>
                        <tr>
                            <th scop="col">gender</th>
                            <td><?=$model->userDetails->gender?></td>
                        </tr>
                        <tr>
                            <th scop="col">profile_photo</th>
                            <td><?=$model->userDetails->profile_photo?></td>
                        </tr>
                        <tr>
                            <th scop="col">job</th>
                            <td><?=$model->userDetails->job?></td>
                        </tr>
                        <tr>
                            <th scop="col">about</th>
                            <td><?=$model->userDetails->about?></td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" style="background-color:#fff; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h2>User Address</h2>
                    <table class="table">
                        <?php if(!empty($model->userAddresses)>0){
                            foreach ($model->userAddresses as $key => $userAddress) { ?>
                            
                        <tr>
                            <th scop="col">zipcode</th>
                            <td><?=$userAddress->zipcode?></td>
                        </tr>
                        <tr>
                            <th scop="col">city</th>
                            <td><?=$userAddress->city?></td>
                        </tr>
                        <tr>
                            <th scop="col">state</th>
                            <td><?=$userAddress->state?></td>
                        </tr>
                        <tr>
                            <th scop="col">country</th>
                            <td><?=$userAddress->country?></td>
                        </tr>
                        <tr>
                            <th scop="col">address_type</th>
                            <td><?=$userAddress->address_type?></td>
                        </tr>
                        <?php }} ?>
                    </table>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" style="background-color:#fff; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h2>User Hobbies</h2>
                    <table class="table">
                        <?php if(!empty($model->userHobbies)>0){
                            foreach ($model->userHobbies as $key => $userHobbies) { ?>
                                <tr>
                                    <th scop="col">Hobby</th>
                                    <td><?=$userHobbies->hobby?></td>
                                </tr>
                        <?php }} ?>
                    </table>
                </div>
            </div>
        </div>

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" style="background-color:#fff; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h2>User Links</h2>
                    <table class="table">
                        <?php if(!empty($model->userProfileLinks)>0){
                            foreach ($model->userProfileLinks as $key => $userProfileLinks) { ?>
                            <tr>
                                <th scop="col"><?=$userProfileLinks->url_name?></th>
                                <td><a href="<?=$userProfileLinks->url_link?>" target="_blank"><?=$userProfileLinks->url_name?></a></td>
                            </tr>
                        <?php }} ?>
                    </table>
                </div>
            </div>
        </div>

        <br>
    </div>
</div>
