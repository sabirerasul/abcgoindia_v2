<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>


<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404" style="font-family: Nunito">404 <?php ///= Html::encode($this->title) ?></div>
        <p class="lead text-gray-800 mb-5"><?= nl2br(Html::encode($message)) ?></p>
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <a href="<?=Yii::getAlias('@web')?>/">&larr; Back to Home</a>
    </div>

</div>