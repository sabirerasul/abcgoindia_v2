<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\org\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-12 p-4 d-flex justify-content-center align-item-center"
                        style="display: flex;align-items: center;justify-content: center;flex-direction: column;">

                        <?= $form->field($userDetail, 'profile_photo_file')->fileInput() ?>

                        <div class="image-container">
                            <?php
                                if($user && $userDetail->profile_photo != ''){
                                    $path = Yii::getAlias('@web').'/web/img/user/high/'.$userDetail->profile_photo;
                                }else{
                                    $path = Yii::getAlias('@web').'/themes/backend/img/undraw_profile.svg';
                                }
                                ?>
                            <img 
                                class="img-circle rounded-circle"
                                style="width:120px;height:120px;flex-direction:column"
                                src='<?=$path?>'
                            />


                        </div>

                        
                    </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-8">


            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($user, 'name')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($user, 'mobile')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($userDetail, 'email') ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?=$form->field($userDetail, 'gender')->radioList( ['male'=>'male', 'female' => 'female', 'other' => 'other'] );?>
                        </div>
                        

                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($userDetail, 'dob')
                                ->widget(\yii\jui\DatePicker::className(), [
                                    'dateFormat' => "yyyy-MM-dd",
                                    'options' => ['class' => 'form-control'],
                                
                            ]) ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($userDetail, 'whatsapp_number') ?>
                        </div>

                        

                        <div class="col-md-6 col-sm-12">

                            <?= $form->field($userDetail, 'job')->dropDownList(
                                [
                                    'Government Org' => 'Government Org',
                                    'Private Org' => 'Private Org',
                                    'Agent' => 'Agent',
                                    'Student' => 'Student',
                                    'Jobs Seekers(job searcher)' => 'Jobs Seekers(job searcher)',
                                    'Farmer' => 'Farmer',
                                    'Unemployed' => 'Unemployed',
                                ],
                                ['prompt'=>'Select Occupation']
                            ); ?>

                        </div>
                        
                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($user, 'username') ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <?= $form->field($user, 'status')
                                ->dropDownList(
                                    [0 => 'Deactive', 1 => 'Active'],
                                    ['prompt'=>'Select Status']
                                ); 
                            ?>
                        </div>

                        <div class="col-12">
                            <?= $form->field($userDetail, 'about')->textarea(['rows' => '6']) ?>
                        </div>

                        

                        <div class="col-12">
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>