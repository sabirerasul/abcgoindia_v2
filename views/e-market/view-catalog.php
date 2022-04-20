<?php

/* @var $this yii\web\View */

$this->title = $model->catalog_name .' | '. $businessModel->bus_name. ' | ABCGO INDIA';
?>

<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12">

                    <div class="row">
                        <?php
                            $value = $model;
                        ?>
                        <div class="col-12">
                            <div class="card shadow mb-4 riunded" data-aos='zoom-in' data-aos-duration="500">
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
                                                        <img class="catalog-img" alt="<?=$value->catalog_name?>"
                                                            src="<?=$tlogo?>" data-holder-rendered="true">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-8">
                                            <div style="white-space:nowrap;overflow:hidden" class='my-3'>
                                                
                                                <h6>
                                                    <?=$value->catalog_name?>
                                                </h6>
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