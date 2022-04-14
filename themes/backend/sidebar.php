
<?php

$userRole = (\Yii::$app->user->identity) ? \Yii::$app->user->identity->user_role : 'undefined';
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion bg-gradient-secon" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=Yii::getAlias('@web')?>/">
        <div class="sidebar-brand-icon rotate-n-15">
            <!--<i class="fas fa-laugh-wink"></i>-->
            <img src="<?=Yii::getAlias('@web')?>/web/img/logo/Relogo.png" width="30" height="30"
                class="d-inline-block align-top" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">ABCGO INDIA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">

        <?php if ($userRole == 'org') { ?>
        <a class="nav-link" href="<?=Yii::getAlias('@web')?>/org">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        <?php } else { ?>

        <a class="nav-link" href="<?=Yii::getAlias('@web')?>/business">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

        <?php } ?>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($userRole == 'org') { ?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-briefcase"></i>
            <span>Business</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Business Components:</h6>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/business">
                    <i class="fas fa-briefcase"></i>
                    Business
                </a>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/business/create">
                    <i class="fas fa-plus"></i>
                    Add
                </a>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/business-catalog">
                    <i class="fas fa-boxes"></i>
                    Catalog
                </a>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/business-catalog/create">
                    <i class="fas fa-plus"></i>
                    Add
                </a>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/business-cat">
                    <i class="fas fa-clipboard-list"></i>
                    Category
                </a>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/business-cat/create">
                    <i class="fas fa-plus"></i>
                    Add
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Components:</h6>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/user">
                    <i class="fas fa-user"></i>
                    Users
                </a>

                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/create">
                    <i class="fas fa-plus"></i>
                    Add
                </a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
            aria-controls="collapseThree">
            <i class="fas fa-tasks"></i>
            <span>Assignment</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Assignment Components:</h6>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/user">
                    <i class="fas fa-user"></i>
                    Business
                </a>

                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/create">
                    <i class="fas fa-plus"></i>
                    Category
                </a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
            aria-controls="collapseFour">
            <i class="fas fa-user-tag"></i>
            <span>User Role</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Role Components:</h6>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/user">
                    <i class="fas fa-user"></i>
                    user
                </a>

                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/org/create">
                    <i class="fas fa-plus"></i>
                    role
                </a>

            </div>
        </div>
    </li>

    <?php } ?>

    <?php if ($userRole == 'user') { ?>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-briefcase"></i>
            <span>Business</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Business Components:</h6>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/business/user-business">
                    <i class="fas fa-briefcase"></i>
                    Business
                </a>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/business/user-business/business-update">
                    <i class="fas fa-plus"></i>
                    Add
                </a>

            </div>
        </div>

        <a class="nav-link" href="<?=Yii::getAlias('@web')?>/" target="_blank">
            <i class="fas fa-fw fa-globe"></i>
            <span>Visit Site</span></a>
    </li>

    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
            aria-controls="collapseFive">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Settings Components:</h6>
                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/business/user/change-password">
                    <i class="fas fa-lock"></i>
                    Change Password
                </a>

                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/business/user/user-update">
                    <i class="fas fa-user-edit"></i>
                    Edit Profile
                </a>

                <a class="collapse-item" href="<?=Yii::getAlias('@web')?>/business/user/user-profile">
                    <i class="fas fa-user-circle"></i>
                    View Profile
                </a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>