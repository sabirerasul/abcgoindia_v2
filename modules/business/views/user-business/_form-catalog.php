<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\business\BusinessCatalog */
/* @var $form ActiveForm */

?>
<div class="form-catalog">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'catalog_name') ?>


        
                <?= $form->field($model, 'catalog_cat_id')->dropDownList($categories, ['prompt'=>'Select Catalog Category']) ?>
            

            <div class="my-3">
                <a href="<?=Yii::getAlias('@web')?>/business/user-business/add-catalog-cat?businessId=<?=$businessId?>&type=<?=$type?>&id=<?=$catalogId?>" class="btn btn-primary">Add</a>
            </div>
                
        <?php //= $form->field($model, 'catalog_token') ?>
        <?php //= $form->field($model, 'created_at') ?>
        <?php //= $form->field($model, 'updated_at') ?>
        <?php //= $form->field($model, 'status') ?>

        <?= $form->field($modelDetails, 'catalog_description') ?>
        <?= $form->field($modelDetails, 'catalog_keyword') ?>
        <?= $form->field($modelDetails, 'catalog_price') ?>
        <?= $form->field($modelDetails, 'catalog_picture_file')->fileInput() ?>
        <?= $form->field($modelDetails, 'catalog_video_file')->fileInput() ?>

        <?= $form->field($model, 'status')
        ->dropDownList(
            [0 => 'Deactive', 1 => 'Active', 2 => 'Hide'],           // Flat array ('id'=>'label')
            ['prompt'=>'Select Status']    // options
        ); ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- form-catalog -->
