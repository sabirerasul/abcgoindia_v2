<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\business\BusinessWorkingDay */
/* @var $form ActiveForm */
?>
<div class="form-working-day">

    <?php $form = ActiveForm::begin(); ?>

        <?php //= $form->field($model, 'business_id') ?>
        <?= $form->field($model, 'day') ?>
        <?= $form->field($model, 'from_time') ?>
        <?= $form->field($model, 'to_time') ?>
        <?= $form->field($model, 'working_day') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form-working-day -->
