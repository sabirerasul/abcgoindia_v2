<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Login - ABCGO INDIA";
?>


<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">

                        
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="icon fa fa-check"></i>Saved!</h4>
                                <?= Yii::$app->session->getFlash('success') ?>
                            </div>
                        <?php endif; ?>


                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <h4><i class="icon fa fa-check"></i>Saved!</h4>
                                <?= Yii::$app->session->getFlash('error') ?>
                            </div>
                        <?php endif; ?>


                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4" style="font-size: 1.5rem;font-weight: 400;">Welcome Back!</h1>
                            </div>
                            <?php $form = ActiveForm::begin(['action' => '', 'options' => ['class' => 'user']]); ?>
                                <div class="form-group">
                                    <?= $form->field($model, 'username')->textInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Mobile / Username'])->label(false) ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Password'])->label(false) ?>
                                    <?= Html::checkbox('reveal-password', false, ['id' => 'reveal-password']) ?> <?= Html::label('Show password', 'reveal-password') ?>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <!--<input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>-->

                                            <?= $form->field($model, 'rememberMe')->checkBox(); ?>
                                            
                                    </div>
                                </div>
                                
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block']) ?>
                                <?php ActiveForm::end(); ?>

                                <?php
                                    $this->registerJs("jQuery('#reveal-password').change(function(){jQuery('#loginform-password').attr('type',this.checked?'text':'password');})");
                                ?>

                                <hr>
                                <!--<a href="index.html" style='visibility: hidden'
                                    class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="index.html" style='visibility: hidden'
                                    class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                            
                            <hr>-->
                            <div class="text-center">
                                <a class="small" href="<?=Yii::getAlias('@web')?>/forgot">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=Yii::getAlias('@web')?>/register">Create an Account!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=Yii::getAlias('@web')?>/">Go Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<style>
.container,
.container-fluid,
.container-lg,
.container-md,
.container-sm,
.container-xl {
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}
</style>