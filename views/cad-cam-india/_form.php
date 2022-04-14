<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CadCamIndia */
/* @var $form ActiveForm */
?>
<div class="form">

    <?php $form = ActiveForm::begin([
            'id' => 'cad-cam-india-form',
            'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'date_of_joining')
        ->widget(\yii\jui\DatePicker::className(), [
        'dateFormat' => "yyyy-MM-dd",
        'options' => ['class' => 'form-control'],
                                
    ]) ?>

    <?= $form->field($model, 'qualification') ?>
    
    <?= $form->field($model, 'institute_name')->textarea(['rows' => '6']) ?>
    <?= $form->field($model, 'address')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'autocad')->dropDownList(
        [
            'AutoCAD + Solidworks (₹ 10000)' => 'AutoCAD + Solidworks (₹ 10000)',
            'AutoCAD with Autodesk Certificate (₹ 6000)' => 'AutoCAD with Autodesk Certificate (₹ 6000)',
            'AutoCAD (₹ 4000)' => 'AutoCAD (₹ 4000)',
        ],
        ['prompt'=>'Select Autocad Option']
    ); ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
