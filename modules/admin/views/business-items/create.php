<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessItems */

$this->title = 'Create Business Items';
$this->params['breadcrumbs'][] = ['label' => 'Business Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
