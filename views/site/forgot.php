<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Forgot Password - ABCGO INDIA";

?>

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                    and we'll send you a link to reset your password!</p>
                            </div>
                            
                            <?php $form = ActiveForm::begin(['action' => '', 'options' => ['class' => 'user']]); ?>

                            <?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Email / Mobile'])->label(false) ?>

                            <?= Html::submitButton('Reset Password', ['class' => 'btn btn-primary btn-user btn-block']) ?>
                            
                            <?php ActiveForm::end(); ?>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?=Url::to(['/site/signup/'])?>">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=Url::to(['/site/login/'])?>">Already have an account?
                                    Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=Url::to(['/'])?>">Go Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>