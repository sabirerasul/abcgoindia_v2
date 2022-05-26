<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ForgotVerify */
/* @var $form ActiveForm */
?>

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                    <div class="col-lg-6" style="padding:30px">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'c_password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
