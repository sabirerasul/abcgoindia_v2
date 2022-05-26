<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'catalog | '. $businessModel->bus_name. ' | ABCGO INDIA';
?>

<style>
#wrapper #content-wrapper {
    background-color: #ffffff;
}
</style>

<div class="container">
    <div class="m-3">
        <?= Html::a( 'Back', ['/e-market/business-profile', 'id' => $id])?>
    </div>
</div>

<div class="container search-body">

    <h1 class="title">Search in <?=$businessModel->bus_name?></h1>
    <div class="row">
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="GET" action="">
                <input type="text" name="query" placeholder="Search Item as you want..." title="Enter search keyword" value="<?php if(isset($query)){echo $query;}?>">
                <button type="submit" title="Search"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="body-content">

        <div class='container'>
            <div class="row mt-5">
                <div class="col-lg-12">


                    <!--<div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="business-header">

                                <?php
                                    $bpath = Yii::getAlias('@web');
                                    $bpath .= ($businessModel->businessDetails && $businessModel->businessDetails->business_banner) ? '/web/img/business/business-banner/high/'.$businessModel->businessDetails->business_banner : '/web/img/blog/banner/upload_banner.png';
                                ?>
                                <div class="profile-banner">
                                    <img src='<?=$bpath?>' class="object-fit-cover" width="100%" height="420px">
                                </div>

                                <div class="profile-picture" data-aos="zoom-in" data-aos-duration="500">
                                    

                                    <?php
                                        $logo = ($businessModel->businessDetails && $businessModel->businessDetails->business_logo) ? $businessModel->businessDetails->business_logo : $businessModel->bus_name[0].'.jpg';               
                                        $tlogo = Yii::getAlias('@web');
                                        $tlogo .= ($businessModel->businessDetails && $businessModel->businessDetails->business_logo) ? '/web/img/business/business-logo/high/'.$logo : '/web/img/alphabet/'.$logo;
                                    ?>

                                    <div class="">
                                        <img class="rounded-circle z-depth-2 picture-circle object-fit-cover" alt="100x100"
                                            src="<?=$tlogo?>" data-holder-rendered="true">  
                                    </div>                                    
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <h5><?=$businessModel->bus_name?></h5>
                            </div>
                        </div>
                    </div>-->

                    <div class="row">
                        <?php
                            // foreach ($model as $key => $val) {
                            //     $value = $val->catalog;

                            //     if($value->status != 1){
                            //         continue;
                            //     }

                            foreach ($catalogCatArr as $key1 => $value1) {
                                                                
                        ?>

                        <div class="col-lg-12 ">

                            <div class="card mb-3 riunded " data-aos="zoom-in" data-aos-duration="500 "
                                style="border: none; ">
                                <h3 class="pl-3 pt-3 "><?=$value1['title'] ?></h3>
                            </div>

                        </div>

                        <?php

                    foreach ($catalogArr as $key => $value) {
                            
                                if($value->status != 1){
                                    continue;
                                }

                                if($value->catalog_cat_id != $value1['id']){
                                    continue;
                                }
                    ?>

                        <div class="col-lg-6">
                            <div class="card mb-4 riunded card-catalog-wrapper" data-aos='zoom-in'
                                data-aos-duration="500"
                                style="border: none;background:#fbfbfb;height:160px;overflow:hidden">
                                <div class="card-body" style="border:1px solid #e5e5e5">

                                    <div class="row">
                                        <div class="col-3 px-3 py-3 box-left">
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

                                        <div class="col-9 px-3 py-3 box-right">
                                            <div style="white-space:nowrap;overflow:hidden" class=''>

                                                <?php
                                                    $linkpath = Url::to(['/e-market/view/', 'id' => $businessModel->bus_username, 'catalogId' => $value->id]);
                                                ?>

                                                <ul class="list-group ">
                                                    <li class="cat-list d-flex justify-content-between align-items-center"
                                                        style="border:none;">


                                                        <a href='<?=$linkpath?>' style='display:block'
                                                            class='item-link'>
                                                            <?=$value->catalog_name?>
                                                        </a>


                                                        <span class="badge rounded-pill"
                                                            style="font-weight: bold;color:#5c5c5c ">
                                                            <h5>₹
                                                                <?php
                                                                    if(!empty($value->businessCatalogDetails->catalog_price)){
                                                                        echo $value->businessCatalogDetails->catalog_price;
                                                                    }
                                                                ?>
                                                            </h5>
                                                        </span>
                                                    </li>
                                                </ul>

                                            </div>

                                            <!-- <div class="price-box">
                                                <h1>
                                                
                                                </h1>
                                            </div> -->

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

.item-link {
    font-weight: bold;
    color: #5c5c5c;
    font-size: 18px;
}

@media screen and (max-width:568px) {

    .box-left,
    .box-right {
        flex: 0 0 auto !important;
        width: 100% !important;
        max-width: 100%;
    }

    .card-catalog-wrapper {
        height: auto !important;
    }

    .item-link {
        white-space: wrap;
    }

    .cat-list {
        flex-direction: column;
        justify-content: left;
    }

}

.title {
    text-align: center;
    margin-bottom: 20px;
    margin-top: 50px;
    color: #aaf8d8;
}

.search-bar {
    min-width: 100%;
    padding: 0;

}

.search-bar-show {
    top: 60px;
    visibility: visible;
    opacity: 1;
}

.search-form {
    width: 100%;

}

::placeholder {
  font-size: 18px;
  padding-left: 30px;
}

.search-form input {
    border: 0;
    font-size: 14px;
    color: #012970;
    border: 1px solid rgba(1, 41, 112, 0.2);
    padding: 7px 38px 7px 25px;
    border-radius: 50px;
    transition: 0.3s;
    width: 100%;
    height: 50px;
}

.search-form input:focus,
.header .search-form input:hover {
    outline: none;
    box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
    border: 1px solid rgba(1, 41, 112, 0.3);
}

.search-form button {
    border: 0;
    padding: 0;
    margin-left: -50px;
    background: none;
}

.search-form button i {
    color: #012970;
}
</style>

<script>
AOS.init();
</script>