<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\business\BusinessCatalogDetail */
/* @var $form ActiveForm */
?>
<div class="form-catalog-details">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'catalog_description') ?>
        <?= $form->field($model, 'catalog_keyword') ?>
        <?= $form->field($model, 'catalog_picture') ?>
        <?= $form->field($model, 'catalog_video') ?>
        <?= $form->field($model, 'catalog_price') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form-catalog-details -->