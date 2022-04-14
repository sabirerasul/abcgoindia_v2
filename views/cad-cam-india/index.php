<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\CadCamIndia;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CadCamIndiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cad Cam Indias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cad-cam-india-index" style="background-color:#ffffff;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cad Cam India', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'email:email',
            'mobile',
            'date_of_joining',
            //'qualification',
            //'institute_name:ntext',
            //'address:ntext',
            //'autocad',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CadCamIndia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
