<?php

/* @var $this yii\web\View */

$this->title = 'catalogs | '. $businessModel->bus_name. ' | ABCGO INDIA';
?>

<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12">


                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="business-header">

                                <?php
                                    $bpath = Yii::getAlias('@web');
                                    $bpath .= ($businessModel->businessDetails && $businessModel->businessDetails->business_banner) ? '/web/img/business/business-banner/high/'.$businessModel->businessDetails->business_banner : '/web/img/blog/banner/upload_banner.png';
                                ?>
                                <div class="profile-banner">
                                    <img src='<?=$bpath?>' width="100%" height="420px">
                                </div>

                                <div class="profile-picture" data-aos="zoom-in" data-aos-duration="1000">
                                    

                                    <?php
                                        $logo = ($businessModel->businessDetails && $businessModel->businessDetails->business_logo) ? $businessModel->businessDetails->business_logo : $businessModel->bus_name[0].'.jpg';               
                                        $tlogo = Yii::getAlias('@web');
                                        $tlogo .= ($businessModel->businessDetails && $businessModel->businessDetails->business_logo) ? '/web/img/business/business-logo/high/'.$logo : '/web/img/alphabet/'.$logo;
                                    ?>

                                    <div class="">
                                        <img class="rounded-circle z-depth-2 picture-circle" alt="100x100"
                                            src="<?=$tlogo?>" data-holder-rendered="true">  
                                    </div>                                    
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <h5><?=$businessModel->bus_name?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php 
                            foreach ($model as $key => $val) {
                                $value = $val->catalog;
                        ?>
                        <div class="col-12">
                            <div class="card shadow mb-4 riunded" data-aos='zoom-in' data-aos-duration="500">
                                <div class="card-body">

                                <div class="row">
                                        <div class="col-lg-2 px-3 py-3">
                                            <div class="">
                                                <div class="">
                                                    <div class="">

                                                        
                                                        <?php
                                                        $logo = ($value->businessCatalogDetails && $value->businessCatalogDetails->catalog_picture) ? $value->businessCatalogDetails->catalog_picture : $value->catalog_name[0].'.jpg';
                                                        
                                                        $tlogo = Yii::getAlias('@web');
                                                        $tlogo .= ($value->businessCatalogDetails && $value->businessCatalogDetails->catalog_picture) ? '/web/img/business/catalog/image/high/'.$logo : '/web/img/alphabet/'.$logo;
                                                        ?>
                                                        <img class="catalog-img" alt="<?=$value->catalog_name?>"
                                                            src="<?=$tlogo?>" data-holder-rendered="true">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-10">
                                            <div style="white-space:nowrap;overflow:hidden" class='my-3'>
                                                <?php
                                                    $linkpath = Yii::getAlias('@web').'/e-market/catalog-view?id='.$businessModel->bus_username.'&catalog_id='.$value->id;
                                                ?>
                                                <a href='<?=$linkpath?>'>
                                                    <?=$value->catalog_name?>
                                                </a>
                                            </div>
                                            
                                            <div class="price-box">
                                                <h1>
                                                <?php
                                                        if(!empty($value->businessCatalogDetails->catalog_price)){
                                                            echo $value->businessCatalogDetails->catalog_price;
                                                        }
                                                    ?>
                                                </h1>
                                            </div>

                                            <div class="description-box">
                                                <p>
                                                    <?php
                                                        if(!empty($value->businessCatalogDetails->catalog_description)){
                                                            echo $value->businessCatalogDetails->catalog_description;
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
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

<style>
.table-bordered th,
.table-bordered td {
    border: 0 !important;
}

.catalog-img {
    width: 100%;
}
</style>

<script>
AOS.init();
</script>