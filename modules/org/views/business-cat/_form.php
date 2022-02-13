<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\business\BusinessCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-cat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_name')->textarea(['rows' => 6]) ?>

    <?php //= $form->field($model, 'created_at')->textInput() ?>

    <?php //= $form->field($model, 'status')->textInput() ?>
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
