<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>
    <?php //= $form->field($model, 'password_hash')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'reset_token')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'status')
        ->dropDownList(
            [0 => 'Deactive', 1 => 'Active'],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Status']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
