<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\Business */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bus_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bus_cat')->dropDownList($categories, ['prompt'=>'Select Business Category']) ?>

    <?php //= $form->field($model, 'bus_qrcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bus_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
