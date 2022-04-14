<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CadCamIndia */

$this->title = 'Update Cad Cam India: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cad Cam Indias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cad-cam-india-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
