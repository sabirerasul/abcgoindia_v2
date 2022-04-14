<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserHobby */
/* @var $form ActiveForm */
?>
<div class="site-_from-hobby">

    <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('danger1')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><span class="icon">X </span> Error!</h4>
        <?= Yii::$app->session->getFlash('danger1') ?>
    </div>
    <?php endif; ?>


    <?php if (Yii::$app->session->hasFlash('danger')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><span class="icon">X </span> Error!</h4>
        <?= Yii::$app->session->getFlash('danger') ?>
    </div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>



    <?php //= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'old_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Old Password'])->label(false) ?>

    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'New Password'])->label(false) ?>

    <?= $form->field($model, 'confirm_new_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Confirm New Password'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_from-hobby -->