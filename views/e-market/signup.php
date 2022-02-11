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
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            <?php $form = ActiveForm::begin(); ?>

                                <?= $form->field($model, 'name') ?>
                                <?= $form->field($model, 'mobile') ?>
                                <?= $form->field($model, 'password')->passwordInput() ?>
                                <?= $form->field($model, 'c_password')->passwordInput() ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-user btn-block']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                            
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?=Yii::getAlias('@web')?>/site/forgot">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?=Yii::getAlias('@web')?>/site/login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>