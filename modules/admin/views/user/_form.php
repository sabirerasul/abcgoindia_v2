<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'w_n')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homeplace_pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homeplace_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homeplace_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'homeplace_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'workplace_pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'workplace_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'workplace_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'workplace_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otherplace_pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otherplace_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otherplace_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otherplace_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hobbie1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hobbie2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hobbie3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ip_addr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'os')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
