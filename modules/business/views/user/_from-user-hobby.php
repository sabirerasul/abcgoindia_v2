<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserHobby */
/* @var $form ActiveForm */
?>
<div class="site-_from-hobby">

    <?php $form = ActiveForm::begin(); ?>

        <?php //= $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'hobby') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_from-hobby -->
