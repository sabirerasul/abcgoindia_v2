<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\business\BusinessCatalog */
/* @var $form ActiveForm */
?>
<div class="form-catalog">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'catalog_name') ?>
        <?php //= $form->field($model, 'catalog_token') ?>
        <?php //= $form->field($model, 'created_at') ?>
        <?php //= $form->field($model, 'updated_at') ?>
        <?php //= $form->field($model, 'status') ?>

        <?= $form->field($model, 'status')
        ->dropDownList(
            [0 => 'Deactive', 1 => 'Active', 2 => 'Hide'],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Status']    // options
        ); ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form-catalog -->
