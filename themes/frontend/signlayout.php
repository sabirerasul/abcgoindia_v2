<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Custom fonts for this template-->
    <link href="<?=Yii::getAlias('@web')?>/themes/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?=Yii::getAlias('@web')?>/themes/backend/css/sb-admin-2.min.css" rel="stylesheet">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="bg-gradient-primary">
    <?php $this->beginBody() ?>

    <div class='container'>
    <?=$content?>
    </div>
        
    <?php $this->endBody() ?>
    <!-- Bootstrap core JavaScript-->
    <?php /*<script src="<?=Yii::getAlias('@web')?>/themes/backend/vendor/jquery/jquery.min.js"></script> */ ?>
    <script src="<?=Yii::getAlias('@web')?>/themes/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=Yii::getAlias('@web')?>/themes/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=Yii::getAlias('@web')?>/themes/backend/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!--<script src="<?=Yii::getAlias('@web')?>/themes/backend/vendor/chart.js/Chart.min.js"></script>-->

    <!-- Page level custom scripts -->
    <!--<script src="<?=Yii::getAlias('@web')?>/themes/backend/js/demo/chart-area-demo.js"></script>-->
    <!--<script src="<?=Yii::getAlias('@web')?>/themes/backend/js/demo/chart-pie-demo.js"></script>-->

</body>
</html>
<?php $this->endPage() ?>
