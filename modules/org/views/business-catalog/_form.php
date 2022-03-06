<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\catalog\BusinessCatalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //= $form->field($model, 'business_id')->textInput() ?>

    <?php //= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'catalog_name')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'catalog_token')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'status')
        ->dropDownList(
            [0 => 'Deactive', 1 => 'Active', 2 => 'Hide'],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Status']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
