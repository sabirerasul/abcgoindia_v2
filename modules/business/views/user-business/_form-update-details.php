<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\business\BusinessDetail */
/* @var $form ActiveForm */
?>
<div class="formUpdateDetails">

    <?php $form = ActiveForm::begin(); ?>

        <?php //= $form->field($model, 'business_id') ?>
        
        <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>
        <?= $form->field($model, 'keyword')->textarea(['rows' => '6']) ?>
        <?= $form->field($model, 'business_logo') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'business_banner') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- formUpdateDetails -->
