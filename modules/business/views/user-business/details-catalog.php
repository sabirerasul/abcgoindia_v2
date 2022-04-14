<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\Business */

$this->title = $model->catalog_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Catalog'), 'url' => ['index']];
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
            <h6 class="m-0 font-weight-bold text-primary">Catalog</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <tr>
                            <td colspan='2' style="text-align:right">
                                <a class="btn btn-primary"
                                    href="<?=Yii::getAlias('@web')?>/business/user-business/update-catalog?businessId=0&id=<?=$model->id?>">Update</a>
                            </td>
                        </tr>

                        <tr>
                            <th>Catalog Name</th>
                            <td><?=$model->catalog_name?></td>
                        </tr>

                        <tr>
                            <th>catalog Since</th>
                            <td><?=date("jS \of F Y", strtotime($model->created_at))?></td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td><?=date("jS \of F Y", strtotime($model->updated_at))?></td>
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
            <h6 class="m-0 font-weight-bold text-primary">Catalog Details</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <td colspan='2' style="text-align:right">
                        <a class="btn btn-primary"
                            href="<?=Yii::getAlias('@web')?>/business/user-business/update-catalog-details?id=<?=$model->id?>">Update</a>

                    </td>
                    <tbody>
                        <?php if(!empty($model->businessCatalogDetails)>0){ ?>
                            
                        <tr>
                            <th scop="col">Catalog Picture</th>
                            <td>
                                <?php if($model->businessCatalogDetails->catalog_picture){ ?>
                                <img 
                                    src='<?=Yii::getAlias('@web')?>/web/img/business/catalog/image/high/<?=$model->businessCatalogDetails->catalog_picture?>' 
                                    alt='<?=$model->businessCatalogDetails->catalog_picture?>'
                                    style="width:300px;max-width:100%"
                                     
                                />
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th scop="col">Catalog Video</th>
                            <td>
                                <?php if($model->businessCatalogDetails->catalog_video){ ?>
                                <video 
                                    src='<?=Yii::getAlias('@web')?>/web/img/business/catalog/video/<?=$model->businessCatalogDetails->catalog_video?>' 
                                    width='100%'
                                    controls
                                >
                                </video>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th scop="col">Catalog Price</th>
                            <td><?=$model->businessCatalogDetails->catalog_price?></td>
                        </tr>
                        <tr>
                            <th scop="col">Catalog Description</th>
                            <td><?=$model->businessCatalogDetails->catalog_description?></td>
                        </tr>
                        <tr>
                            <th scop="col">Catalog Keyword</th>
                            <td><?=$model->businessCatalogDetails->catalog_keyword?></td>
                        </tr>

                        <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Catalog Links</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">


                <?php if(!empty($model->businessCatalogLinks)>0){
                            foreach ($model->businessCatalogLinks as $key => $businessCatalogLinks) {
                                if($businessCatalogLinks->status == 1){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <tbody>

                        <td colspan='2' style="text-align:right">
                            <a class="btn btn-primary"
                                href="<?=Yii::getAlias('@web')?>/business/user-business/catalog-link?catalogId=<?=$model->id?>&id=<?=$businessCatalogLinks->id?>">Update</a>
                            <a class="btn btn-danger"
                                href="<?=Yii::getAlias('@web')?>/business/user-business/catalog-link?catalogId=<?=$model->id?>&id=<?=$businessCatalogLinks->id?>">Delete</a>

                        </td>
                        <tr>
                            <th scop="col"><?=$businessCatalogLinks->title?></th>
                            <td><a href="<?=$businessCatalogLinks->link?>"
                                    target="_blank"><?=$businessCatalogLinks->link?></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php }}} ?>

                <div>

                    <a class="btn btn-success"
                        href="<?=Yii::getAlias('@web')?>/business/user-business/catalog-link?catalogId=<?=$model->id?>">Add
                        New</a>
                </div>

            </div>
        </div>
    </div>

</div>