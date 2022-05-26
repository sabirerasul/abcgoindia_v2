<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->catalog_name .' | '. $businessModel->bus_name. ' | ABCGO INDIA';
?>

<div class="container-fluid">

    <div class="body-content">

        <div class='container'>

            <div class="row mt-5">
                <div class="m-3">
                    <?= Html::a( 'Back', ['/e-market/catalog', 'id' => $id])?>
                </div>
                <div class="col-lg-12">

                    <div class="row">
                        <?php
                            $value = $model;
                        ?>
                        <div class="col-12">
                            <div class="card shadow mb-4 riunded">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-4 px-3 py-3">
                                            <div class="">
                                                <div class="">
                                                    <div class="">


                                                        <?php
                                                        $logo = ($value->businessCatalogDetails && $value->businessCatalogDetails->catalog_picture) ? $value->businessCatalogDetails->catalog_picture : $value->catalog_name[0].'.jpg';
                                                        
                                                        $tlogo = Yii::getAlias('@web');
                                                        $tlogo .= ($value->businessCatalogDetails && $value->businessCatalogDetails->catalog_picture) ? '/web/img/business/catalog/image/high/'.$logo : '/web/img/alphabet/'.$logo;
                                                        ?>
                                                        <img class="catalog-img object-fit-cover"
                                                            alt="<?=$value->catalog_name?>" src="<?=$tlogo?>"
                                                            data-holder-rendered="true">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div style="white-space:nowrap;overflow:hidden" class='my-3'>

                                                <h1 class="catalog-title">
                                                    <?=$value->catalog_name?>
                                                </h1>
                                                <hr>

                                                <?php $storeLink = Url::to(['e-market/catalog', 'id' => $value->assignmentCatalog->business->bus_username]);?>
                                                <p>
                                                    <a href="<?=$storeLink?>">Visit the
                                                        <?=$value->assignmentCatalog->business->bus_name?> Store</a>
                                                </p>

                                                <span
                                                    class="badge badge-pill badge-secondary"><?=$value->businessCatalogCat->title?></span>
                                            </div>

                                            <div class="price-box">
                                                <h4 class="catalog-price">
                                                    <?php
                                                        if(!empty($value->businessCatalogDetails->catalog_price)){
                                                            echo "Price ₹ ".$value->businessCatalogDetails->catalog_price;
                                                        }
                                                    ?>
                                                </h4>
                                            </div>
                                            <hr>
                                            <div class="link-box">
                                                <ul>
                                                    <?php
                                                    foreach($value->businessCatalogLinks as $k1 => $v1){
                                                        if($v1->status == 1){
                                                    ?>
                                                    <li><a href="<?=$v1->link?>"><?=$v1->title?></a></li>
                                                    <?php }} ?>
                                                </ul>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card shadow mb-4 riunded">
                                <div class="card-body">

                                    <?php 
                                    if($value->businessCatalogDetails && $value->businessCatalogDetails->catalog_video){ 
                                    $vLink = Yii::getAlias('@web')."/web/img/business/catalog/video/".$value->businessCatalogDetails->catalog_video;
                                    ?>
                                    <div class="mx-auto" style="width:80%">
                                        <video width="100%" class="mx-auto" controls>
                                            <source src="<?=$vLink?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                        
                                    <?php }else{
                                        echo "<h1>Video not found</h1>";
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card shadow mb-4 riunded">
                                <div class="card-body">
                                    <div class="description-box">
                                        <h6>Description</h6>
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

.catalog-title {
    margin-bottom: 0 !important;
    text-rendering: optimizeLegibility;
    font-size: 24px !important;
    line-height: 32px !important;
    font-weight: 400;
}

.catalog-price {
    font-size: 14px !important;
    line-height: 20px !important;
    color: #565959 !important;
}
</style>

<script>
AOS.init();
</script>