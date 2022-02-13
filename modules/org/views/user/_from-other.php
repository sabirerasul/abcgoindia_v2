<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserDetail */
/* @var $form ActiveForm */
?>
<div class="site-_from-update-other">

    <?php $form = ActiveForm::begin(); ?>

        <?php // = $form->field($model, 'user_id') ?>
        
        <?= $form->field($model, 'email') ?>
        <?php //= $form->field($model, 'profile_photo') ?>
        <?= $form->field($model, 'job')->dropDownList(
            [
                'Government Org' => 'Government Org',
                'Private Org' => 'Private Org',
                'Agent' => 'Agent',
                'Student' => 'Student',
                'Jobs Seekers(job searcher)' => 'Jobs Seekers(job searcher)',
                'Farmer' => 'Farmer',
                'Unemployed' => 'Unemployed',
            ],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Occupation']    // options
        ); ?>
        <?= $form->field($model, 'dob') ?>
        <?= $form->field($model, 'whatsapp_number') ?>
        <?php //= $form->field($model, 'gender') ?>
        <?= $form->field($model, 'about')->textarea(['rows' => '6']) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-_from-update-other -->
