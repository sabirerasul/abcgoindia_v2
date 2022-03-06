<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\org\models\business\BusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalog';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <h1 class="h3 mb-2 text-gray-800"><?= Html::encode($this->title) ?></h1>

    <p>
        <a class="btn btn-success" href="<?=Yii::getAlias('@web')?>/org/user-business/update-catalog?business_id=<?=$business_id?>">Add
            Catalog</a>
    </p>

    <p class="mb-4">Here you can manage all business catalogs easily.</p>

    <div class="row">
        <!-- DataTales Example -->
        <?php foreach ($model as $key => $val) { ?>
        <?php $value = $val->catalog; ?>
        <div class="col-md-6 col">
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $value->catalog_name ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tbody>
                                
                                <tr>
                                    <th>Cataog Name</th>
                                    <td><?=$value->catalog_name?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                            
                                $newStatus = 1;
                            
                                if($value->status == 0){
                                    $newStatus = '<span style=color:red>Deactive</span>';
                                }
                                if($value->status == 1){
                                    $newStatus = '<span style=color:green>Active</span>';
                                }
                                if($value->status == 2){
                                    $newStatus = '<span style=color:grey>Hide</span>';
                                }
                                echo $newStatus;

                                ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>catalog Since</th>
                                    <td><?=date("jS \of F Y", strtotime($value->created_at))?></td>
                                </tr>

                                <tr>
                                    <th>Updated At</th>
                                    <td><?=date("jS \of F Y", strtotime($value->updated_at))?></td>
                                </tr>

                                <tr>
                                    <td colspan='2'>
                                        
                                        <?= Html::a(Yii::t('app', 'view'), ['catalog-view', 'id' => $value->id], ['class' => 'btn btn-success']) ?>

                                        <?= Html::a(Yii::t('app', 'Edit'), ['update-catalog','business_id' => 0, 'id' => $value->id], ['class' => 'btn btn-primary']) ?>
                                        
                                        <?= Html::a(Yii::t('app', 'Delete'), ['catalog-delete', 'id' => $value->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                                'method' => 'post',
                                            ],
                                        ]) ?>

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