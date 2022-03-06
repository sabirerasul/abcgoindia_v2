<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */
/* @var $form ActiveForm */
?>
<div class="site-_from-update-address">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address') ?>
    <?= $form->field($model, 'zipcode') ?>
    <?= $form->field($model, 'city') ?>
    <?= $form->field($model, 'state') ?>
    <?= $form->field($model, 'country') ?>
    <?php //= $form->field($value, 'user_id') ?>
    <?= $form->field($model, 'address_type')->dropDownList(
        [
            'permanent' => 'Permanent',
            'temporary' => 'Temporary',
                    
        ],           
        ['prompt'=>'Select Address type']
    ); ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_from-update-address -->
