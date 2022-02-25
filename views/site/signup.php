<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Signup - ABCGO INDIA";
?>

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4" style="font-size: 1.5rem;font-weight: 400;">Create an Account!
                        </h1>
                    </div>

                    <?php $form = ActiveForm::begin(['action' => '/abcgoindia_v2/signup','options' => ['class' => 'user']]); ?>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <?= $form->field($model, 'name')->textInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Name'])->label(false) ?>
                        </div>
                        <div class="col-sm-12">
                            <?= $form->field($model, 'mobile')->textInput(['maxlength' => 15, 'class' => 'form-control form-control-user', 'placeholder' => 'Mobile'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Password'])->label(false) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($model, 'c_password')->passwordInput(['maxlength' => 255, 'class' => 'form-control form-control-user', 'placeholder' => 'Repeat Password'])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton('Register Account', ['class' => 'btn btn-primary btn-user btn-block']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                    <hr>
                    <div class="text-center">
                        <a class="small" href="<?=Yii::getAlias('@web')?>/forgot">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="<?=Yii::getAlias('@web')?>/login">Already have an account?
                            Login!</a>
                    </div>

                    <div class="text-center">
                        <a class="small" href="<?=Yii::getAlias('@web')?>/">Go Home</a>
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