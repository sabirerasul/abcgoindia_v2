<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\business\BusinessCatalogLink */
/* @var $form ActiveForm */
?>
<div class="form-catalog-link">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'link') ?>
        <?php //= $form->field($model, 'catalog_id') ?>
        <?= $form->field($model, 'title') ?>
        <?php //= $form->field($model, 'created_at') ?>
        <?php //= $form->field($model, 'updated_at') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form-catalog-link -->
