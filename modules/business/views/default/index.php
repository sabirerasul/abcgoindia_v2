<?php
use app\models\User;
use app\models\business\Business;
use app\models\business\BusinessCatalog;
use app\models\business\BusinessCat;

use app\models\business\AssignmentBusiness;
use app\models\business\AssignmentCatalog;


$this->title = "ABCGO INDIA ADMIN PANEL";

$userId = (Yii::$app->user->identity) ? Yii::$app->user->identity->id : 0;
$userRole = 

$user = User::find()->count();

$assignBusiness = AssignmentBusiness::find()->where(['user_id' => $userId])->count();
$business = $assignBusiness;

/*
foreach ($assignBusiness as $k => $v) {
    
}*/
$assignBusiness1 = AssignmentBusiness::find()->where(['user_id' => $userId])->select('business_id')->asArray()->all();

$bids = array_column($assignBusiness1, 'business_id');

$bids1 = implode(',', $bids);

$cond = " business_id IN ($bids1)";
$businessCatalog = AssignmentCatalog::find()->where(['IN', 'business_id', $bids])->count();

$link = Yii::getAlias("@web")."/business/user-business/";
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="<?=$link?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Business</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$business?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href='#'>
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Business Catalog</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$businessCatalog?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                        <a href='#'>
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Employee</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart for Business -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Business Overview</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChartBusiness"></canvas>
                                    </div>
                                </div>
                            </div>

                            <!-- Area Chart for Items -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Items Overview</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChartItems"></canvas>
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
<style>
    .row div a{
        text-decoration:none;
    }
</style>