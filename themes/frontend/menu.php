<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id='nav-desktop'>

    <a class="navbar-brand" href="<?=Yii::getAlias('@web')?>/">
        <img src="https://www.abcgoindia.com/img/banner/1.jpg" width="30" height="30" class="d-inline-block align-top"
            alt="">
        ABCGO INDIA
    </a>

    <!--ml-auto -->
    <ul class="navbar-nav desk-nav">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="<?=Yii::getAlias('@web')?>/"> <i class="fas fa-home"></i> Home</a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="<?=Yii::getAlias('@web')?>/business"> <i class="fas fa-briefcase"></i>
                Business</a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="<?=Yii::getAlias('@web');?>/e-market"> <i class="fas fa-cube"></i> E-Market</a>
        </li>

    </ul>
    <?php /*
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> */ ?>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <?php /*
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        */ ?>


        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <?php 
            $u = Yii::$app->user->identity;
        ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                    class="mr-2 d-lg-inline text-gray-600 small"><?php if($u){echo $u->name; } ?></span>
                <img class="img-profile rounded-circle"
                    src="<?=Yii::getAlias('@web')?>/themes/backend/img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <?php 
                
                if(Yii::$app->user->isGuest){

                 /*
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a> 
                */ ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=Yii::getAlias('@web')?>/site/login">
                    <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log In
                </a>

                <a class="dropdown-item" href="<?=Yii::getAlias('@web')?>/site/register">
                    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                    Register
                </a>
                <?php }else{ ?>

                <a class="dropdown-item" href="<?=Yii::getAlias('@web');?>/user/profile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a> -->

                <div class="dropdown-divider"></div>
                
                <a class="dropdown-item" href="<?=Yii::getAlias('@web')?>/site/logout" data-method="post">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>                   
                    Logout
                </a>               

                <?php } ?>
            </div>
        </li>
    </ul>

</nav>
<nav class='navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow mobile-nav' id="nav-mobile">
    <ul class="navbar-nav">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="<?=Yii::getAlias('@web')?>"> <i class="fas fa-home"></i> Home</a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="<?=Yii::getAlias('@web')?>/business"> <i class="fas fa-briefcase"></i>
                Business</a>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="<?=Yii::getAlias('@web');?>/e-market"> <i class="fas fa-cube"></i> E-Market</a>
        </li>

    </ul>
</nav>


<style>
#nav-mobile {
    display: none;
}

@media (max-width:768px) {

    nav .desk-nav {
        display: none;
    }

    #nav-mobile {
        display: flex !important;
    }

    #nav-desktop{
        margin-bottom:1px !important;
    }
}

nav li a i {
    margin-right: 10px;
}

#nav-mobile ul li a, #nav-desktop ul li a{
    color: #333;
}
</style>