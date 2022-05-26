<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Search | E-Market | ABCGO INDIA';
?>

<style>
    #wrapper #content-wrapper{
        background-color:#ffffff;
    }
</style>

<div class="container-fluid">

    <div class="body-content">

        <!-- Begin Page Content -->
        <div class="container search-body">

            <h1 class="title">What you want to search</h1>
            <div class="row">
                <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="POST" action="#">
                        <input type="text" name="query" placeholder="Search Item as you want..." title="Enter search keyword">
                        <button type="submit" title="Search"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            </div>
            <div class="detail"></div>

            <style>
            .table-bordered th,
            .table-bordered td {
                border: 0 !important;
            }

            .catalog-img {
                width: 100%;
            }
            </style>
        <br>
    </div>
</div>

<style>
.table-bordered th,
.table-bordered td {
    border: 0 !important;
}

.catalog-img {
    width: 100%;
}

.item-link{
    font-weight: bold;
    color:#5c5c5c;
    font-size: 18px;
}

@media screen and (max-width:568px){
    .box-left, .box-right{
        flex: 0 0 auto !important;
        width: 100% !important;
        max-width:100%;
    }

    .card-catalog-wrapper{
        height:auto !important;
    }
    .item-link{
        white-space: wrap;
    }
    .cat-list{
        flex-direction:column;
        justify-content:left;
    }

}





body
{
  background-color:#fff;

}
.detail
{
  background-color:#aaf2c1;
  background-color:#fff;
  height: 100px;
  margin-top: 100px;
  width:100%;
}
.title
{
  text-align: center;
  margin-bottom: 20px;
  margin-top: 50px;
  color:#aaf8d8;
}
 .toggle-sidebar-btn {
  font-size: 35px;
  padding-left: 10px;
  cursor: pointer;
  color: #012970;
}
 .search-bar {
  min-width: 100%;
  padding: 0;

}
  .search-bar-show {
    top: 60px;
    visibility: visible;
    opacity: 1;
  }
}
.search-form {
  width: 100%;

}
::placeholder
{
  font-size: 18px;
  padding-left: 30px;
}
.search-form input {
  border: 0;
  font-size: 14px;
  color: #012970;
  border: 1px solid rgba(1, 41, 112, 0.2);
  padding: 7px 38px 7px 8px;
  border-radius: 50px;
  transition: 0.3s;
  width: 100%;
  height: 50px;
}
.search-form input:focus, .header .search-form input:hover {
  outline: none;
  box-shadow: 0 0 10px 0 rgba(1, 41, 112, 0.15);
  border: 1px solid rgba(1, 41, 112, 0.3);
}
.search-form button {
  border: 0;
  padding: 0;
  margin-left: -50px;
  background: none;
}
.search-form button i {
  color: #012970;
}
</style>

<script>
AOS.init();
</script>