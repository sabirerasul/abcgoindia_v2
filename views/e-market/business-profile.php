<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $model->bus_name.' | ABCGO INDIA';
?>

<style>
    @media screen and (max-width: 425px){
        .business-header {
            margin-bottom: 60px;
        }

        .business-header > .profile-banner > img{
            height:150px;
        }
        
        .business-header>.profile-picture {
            bottom: -50px;
        }

        .table-bordered th, .table-bordered td{
            border: 0 !important;
        }

        .business-header>.profile-picture>div>.picture-circle {
            width: 100px;
            height: 100px;
        }
    }
</style>
<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
        <div class="m-3">
            <?= Html::a( 'Back', ['/e-market/'])?>
        </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="business-header">
                        
                        <?php
                            $bpath = Yii::getAlias('@web');
                            $bpath .= ($model->businessDetails && $model->businessDetails->business_banner) ? '/web/img/business/business-banner/high/'.$model->businessDetails->business_banner : '/web/img/blog/banner/upload_banner.png';
                        ?>
                        <div class="profile-banner">
                            <img src='<?=$bpath?>' class="object-fit-cover"
                                width="100%" height="420px">
                        </div>

                        <div class="profile-picture" data-aos="zoom-in" data-aos-duration="1000">
                            <!-- <img 
                                src='https://images.unsplash.com/file-1635990775102-c9800842e1cdimage'
                                width="200px"
                                height="200px"
                                class="rounded"
                            > -->

                            <?php
                                $logo = ($model->businessDetails && $model->businessDetails->business_logo) ? $model->businessDetails->business_logo : $model->bus_name[0].'.jpg';
                                                
                                $tlogo = Yii::getAlias('@web');
                                $tlogo .= ($model->businessDetails && $model->businessDetails->business_logo) ? '/web/img/business/business-logo/high/'.$logo : '/web/img/alphabet/'.$logo;
                            ?>

                            <div class="">
                                <img 
                                    class="rounded-circle z-depth-2 picture-circle object-fit-cover" 
                                    alt="100x100" 
                                    src="<?=$tlogo?>"
                                    data-holder-rendered="true"
                                >
                            </div>
                        </div>
                    </div>

                    <?php

                        if(!empty($model->businessProfileLinks)>0){

                    ?>
                    <div class="business-links">
                        <div class="links">

                            <?php

                            foreach ($model->businessProfileLinks as $urlKey => $urlValue) {
                                if($urlValue->status == 1){
                            ?>
                            <div class="links-item px-3 m-1">
                                <a href="<?=$urlValue->link?>">
                                <i class="fa fa-link"></i>
                                <?=$urlValue->title?>
                                </a>
                            </div>
                            
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <?php } ?>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                               
                            <tbody>

                                <tr>
                                    <th>Business Name</th>
                                    <td><?=$model->bus_name?></td>
                                </tr>

                                <tr>
                                    <th>QR Code</th>
                                    <td>

                                    <?php
                                    $qrpath = Yii::getAlias('@web');


                                    $qrpath .= ($model->bus_qrcode != '' && $model->bus_qrcode != 'demoqr.png') ? '/web/img/business/qr-code/'.$model->bus_qrcode : '/web/img/alphabet/noqrcode.jpg';

                                    ?>

                                        <img 
                                            src='<?=$qrpath?>'
                                            width='150px'
                                            style="border:1px solid #7A0BC0;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;"
                                            class="rounded"
                                            data-aos="zoom-in"
                                            data-aos-duration="1000"
                                        />

                                    </td>
                                </tr>

                                <tr>
                                    <th>Mobile</th>
                                    <td><a href="tel:<?=$model->bus_number?>"> <i class="fas fa-phone"></i> Call</a></td>
                                </tr>

                                <tr>
                                    <th scop="col">Email</th>
                                    <td><a href="mailto:<?=$model->businessDetails->email?>"> <i class="fas fa-envelope"></i> Mail </a></td>
                                </tr>
                            
                                <tr>
                                    <th scop="col">Description</th>
                                    <td><?=$model->businessDetails->description?></td>
                                </tr>

                                <tr>
                                    <th>Business Since</th>
                                    <td><?=date("jS \of F Y", strtotime($model->created_at))?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-h3 my-4">
                            <h6>Working Day</h6>
                    </div>

                    <?php if(!empty($model->businessWorkingDay)>0){
                    ?>
                    <div class="working-day-wrapper">
                        <?php
                            foreach ($model->businessWorkingDay as $key => $businessWorkingDay) {
                        ?>
                        <div class="working-day-box <?=($businessWorkingDay->working_day == 1) ? 'border-green' : 'border-secondary bg-f1f1f1'?>">
                            <div>
                                <div class="day-name"><?=$businessWorkingDay->day?></div>
                                <div class="timing">

                                
                                    <?=date("g:i A", strtotime($businessWorkingDay->from_time))?>
                                     - 
                                     <?=date("g:i A", strtotime($businessWorkingDay->to_time))?>
                                </div>
                                <div class="isworking"><h6><span class="badge <?=($businessWorkingDay->working_day == 1) ? 'badge-success' : 'badge-secondary'?>"><?=($businessWorkingDay->working_day == 1) ? 'Open' : 'Close'?></span></h6></div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <div class="text-h3 my-4">
                            <h6>Business Address</h6>
                    </div>

                    <?php
                        if(!empty($model->businessAddresses)){ 
                    ?>
                    <div class="address-wrapper">
                        <?php
                            foreach ($model->businessAddresses as $key => $businessAddresses) {
                                if($businessAddresses->status == 1){
                        ?>
                        <div class="address-box">
                            <div class="address-text">
                                <?=$businessAddresses->address?>,<br>
                                <?=$businessAddresses->city?>, <?=$businessAddresses->state?>,<br>
                                <?=$businessAddresses->country?> - <?=$businessAddresses->zipcode?>
                            </div>
                            <div class="address-type">
                                <?=$businessAddresses->address_type?> Address
                            </div>
                        </div>
                        <?php
                                }
                            } 
                        ?>
                    </div>
                    <?php
                        }
                    ?>

                    <div class="text-h3 my-4">
                            <h6>Catalogs</h6>
                    </div>
                    <div class="working-day-wrapper">
                        <a href="<?=Url::to(['/e-market/catalog/', 'id' => $_GET['id']])?>" class="btn btn-primary btn-lg">View Catalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>

    .working-day-wrapper{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-wrap:wrap;
        gap:15px;
    }
    .working-day-box{
        width:250px;
        max-width:100%;
        height:70px;
        
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        border-radius:50px;
    }

    .border-green{
        border:2px solid green;
    }

    .border-secondary{
        border:2px solid #d3d3d3;
    }

    .bg-f1f1f1{
        background-color: #f1f1f1;
    }

    .day-name{
        text-transform: uppercase;
        font-family: sans-serif;
        font-weight: bold;
        font-size:14px;
    }
    .timing{
        font-size:12px;
    }
    .address-wrapper{
        display:flex;
    }
    .address-box{
        border: 1px solid #d3d3d3;
        padding: 10px;
        border-radius: 25px;
    }
    .address-text{
        text-align:right;
        text-transform:uppercase;
    }
    .address-type{
        margin-top:5px;
        border-top:1px solid #d3d3d3;
        font-size:20px;
        font: weight bold;
        text-align:right;
        text-transform:uppercase;
    }
</style>

<script>
  AOS.init();
</script>