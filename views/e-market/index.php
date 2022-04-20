<?php

/* @var $this yii\web\View */

$this->title = 'E - Market - ABCGOINDIA.COM(service provider portal)';
?>

<style>
    .business-header {
        margin-bottom: 60px;
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
</style>

<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12" >
                    <h2>E - Market</h2>

                    <div class="row">
                        <?php 
                            foreach ($model as $key => $value) {
                                # code...
                            
                        ?>
                        <div class="col-lg-4">
                            <div class="card shadow mb-4 riunded" data-aos='zoom-in' data-aos-duration="1000">
                                <div class="card-body">
                                    <div class="business-header">
                                        <?php
                                            $bpath = Yii::getAlias('@web');
                                            $bpath .= ($value->businessDetails && $value->businessDetails->business_banner) ? '/web/img/business/business-banner/high/'.$value->businessDetails->business_banner : '/web/img/blog/banner/upload_banner.png';
                                        ?>
                                        <div class="profile-banner">
                                            <img src='<?=$bpath?>'
                                                width="100%" height="150px">
                                        </div>

                                        <div class="profile-picture">
                                            <!-- <img 
                                src='https://images.unsplash.com/file-1635990775102-c9800842e1cdimage'
                                width="200px"
                                height="200px"
                                class="rounded"
                            > -->
                                            <div class="">
                                                <?php
                                                $logo = ($value->businessDetails && $value->businessDetails->business_logo) ? $value->businessDetails->business_logo : $value->bus_name[0].'.jpg';
                                                
                                                $tlogo = Yii::getAlias('@web');
                                                $tlogo .= ($value->businessDetails && $value->businessDetails->business_logo) ? '/web/img/business/business-logo/high/'.$logo : '/web/img/alphabet/'.$logo;
                                                ?>
                                                <img class="rounded-circle z-depth-2 picture-circle" alt="<?=$value->bus_name?>"
                                                    src="<?=$tlogo?>"
                                                    data-holder-rendered="true">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                            <tbody>

                                                <tr>
                                                    <th class='text-center' colspan='2'><?=$value->bus_name?></th>
                                                </tr>

                                                <tr>
                                                    <th class='text-center' colspan="2">QR Code</th>
                                                </tr>

                                                <tr>
                                                    <td class='text-center' colspan='2'>

                                                    <?php
                                                        $qrpath = Yii::getAlias('@web');


                                                        $qrpath .= ($value->bus_qrcode != '' && $value->bus_qrcode != 'demoqr.png') ? '/web/img/business/qr-code/'.$value->bus_qrcode : '/web/img/alphabet/noqrcode.jpg';

                                                    
                                                    ?>

                                                        <img src='<?=$qrpath?>'
                                                            width='150px'
                                                            style="border:1px solid #7A0BC0;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;"
                                                            class="rounded" data-aos="zoom-in"
                                                            data-aos-duration="1000" />

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class='text-center'>
                                                        <a class="btn btn-success" style="white-space:nowrap" href="<?=Yii::getAlias('@web')?>/e-market/business-profile?id=<?=$value->bus_username?>"> <i class="fas fa-eye"></i> Profile</a>
                                                    </td>

                                                    <td class='text-center'>
                                                        <a class="btn btn-success" style="white-space:nowrap" href="<?=Yii::getAlias('@web')?>/e-market/catalogs?id=<?=$value->bus_username?>"> <i class="fas fa-eye"></i> Catalog</a>
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
            </div>
        </div>
        <br>
    </div>
</div>

<script>
AOS.init();
</script>