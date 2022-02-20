<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\Business */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList($users, ['prompt'=>'Select Users']) ?>

    <?= $form->field($model, 'bus_name')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'bus_username')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'bus_cat')->textInput() ?>

    <?= $form->field($model, 'bus_cat')->dropDownList($categories, ['prompt'=>'Select Business Category']) ?>

    <?php //= $form->field($model, 'bus_qrcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bus_number')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'status')
        ->dropDownList(
            [0 => 'Deactive', 1 => 'Active', 2 => 'Hide'],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Status']    // options
        ); ?>

    <?php //= $form->field($model, 'bus_token')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
