<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserProfileLink */
/* @var $form ActiveForm */
?>
<div class="site-_from-profile-link">

    <?php $form = ActiveForm::begin(); ?>

        <?php //= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'link') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_from-profile-link -->
