<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'CadCamIndia - ABCGOINDIA.COM(service provider portal)';

?>

<div class="container-fluid">

    <div class="body-content">
        <div class='container-fluid bg-white'>
            <div class="row mt-4">
                <div class="col col-lg-5 col-md-6 col-sm-12 justify-content-center">
                    <div class="my-2">
                        <img src="<?=Yii::getAlias('@web')?>/web/img/cad-cam-india/img/a.jpeg" width="100%">
                    </div>

                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="icon fa fa-check"></i>Saved! form successfully</h4>
                                <?= Yii::$app->session->getFlash('success') ?>
                            </div>
                        <?php endif; ?>


                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="icon fa fa-check"></i>Server Error! Please try again later</h4>
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>


                    <?php
                    
                    echo $this->render('_form', [
                        'model' => $model,
                    ]);

                    ?>
                </div>
            </div>
        </div>
        <br>

    </div>
</div>