<?php

/** @var yii\web\View $this */
/** @var string $content */

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
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="abcgo india, abcgoindia.com, india abcgo, abcgo, india, all branch communicate, group of india, abcgoindia, ABCGO, INDIA, ABCGO INDIA, ABCGOINDIA.COM, Add business, online add businesses, free qr code, business qr code provider, qr code generator, free business listing">
    <!-- Custom fonts for this template-->
    <link href="<?=Yii::getAlias('@web')?>/themes/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?=Yii::getAlias('@web')?>/themes/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=Yii::getAlias('@web')?>/web/img/logo/fevicon.ico" rel="icon" type="image" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <?php $this->head() ?>
</head>
<body id="page-top">
<?php $this->beginBody() ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('menu.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?=$content?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
        <?php include('footer.php'); ?>
    <!-- End of Footer -->

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
