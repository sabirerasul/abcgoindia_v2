<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessCat */

$this->title = 'Create Business Cat';
$this->params['breadcrumbs'][] = ['label' => 'Business Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
