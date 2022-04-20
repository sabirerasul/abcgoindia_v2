<?php

/* @var $this yii\web\View */

$this->title = 'Demo | E - Market | ABCGO INDIA';
?>
<style>
    .business-header{
        position:relative;
        margin-bottom:150px
    }
    
    .business-header > .profile-banner > img{
        border-radius:16px;
    }

    .business-header > .profile-picture > div > .picture-circle{
        border:5px solid #fff;
    }

    .business-header > .profile-picture{
        position: absolute;
        z-index: 2;
        left: 0;
        right: 0;
        bottom: -120px;
        display: flex;
        width: 100%;
        justify-content: center;
    }
</style>
<div class="container-fluid">

    <div class="body-content">

        <div class='container'>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="business-header">

                    <div class="profile-banner">
                        <img src='https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80'
                            width="100%" height="420px">
                    </div>

                    <div class="profile-picture ">
                        <!-- <img 
                            src='https://images.unsplash.com/file-1635990775102-c9800842e1cdimage'
                            width="200px"
                            height="200px"
                            class="rounded"
                        > -->
                        <div class="">
                            <img 
                                class="rounded-circle z-depth-2 picture-circle" 
                                alt="100x100" 
                                src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg"
                                data-holder-rendered="true"
                            >
                        </div>

                    </div>

                    </div>
                    



                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Business Name</th>
                                    <td>demo</td>
                                </tr>

                                <tr>
                                    <th>Business Username</th>
                                    <td>demo123</td>
                                </tr>

                                <tr>
                                    <th>Business Category</th>
                                    <td>retail</td>
                                </tr>

                                <tr>
                                    <th>QR Code</th>
                                    <td>

                                        <img src='http://localhost/abcgoindia_v2/web/img/business/qr-code/b4554f013948cd818f7df926e70beb79.png'
                                            width='150px'
                                            style="border:1px solid #7A0BC0;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;" />

                                    </td>
                                </tr>

                                <tr>
                                    <th>Mobile</th>
                                    <td>1111111111</td>
                                </tr>

                                <tr>
                                    <th>Updated At</th>
                                    <td>2022-04-17 08:44:38</td>
                                </tr>
                                <tr>
                                    <th>Business Since</th>
                                    <td>14th of April 2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Profile Links</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td><a href="facebook.com" target="_blank">facebook.com</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th scop="col">Description</th>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos molestiae,
                                        distinctio aut officiis ipsam nesciunt error est voluptatum sunt
                                        necessitatibus culpa quae accusantium itaque autem provident aliquid
                                        consectetur iste minima?
                                        Aperiam natus eaque dolore asperiores sunt expedita voluptates perferendis
                                        nesciunt, illo, libero, ipsum exercitationem tempore dolorum ut aliquam
                                        tenetur quas cum facilis soluta incidunt aspernatur. Cupiditate dolores
                                        voluptas in modi.</td>
                                </tr>
                                <tr>
                                    <th scop="col">Email</th>
                                    <td>demo@test.com</td>
                                </tr>
                                <tr>
                                    <th scop="col">Keyword</th>
                                    <td>demo demo online word</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Working Day</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th scop="col">Day</th>
                                    <td>Monday</td>
                                </tr>
                                <tr>
                                    <th scop="col">From Time</th>
                                    <td>10:00 AM</td>
                                </tr>
                                <tr>
                                    <th scop="col">To Time</th>
                                    <td>10:00 PM</td>
                                </tr>

                                <tr>
                                    <th scop="col">Is Working Day</th>
                                    <td>Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Business Address</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <tbody>

                                <tr>
                                    <th scop="col">Address</th>
                                    <td>123, test, local, indai</td>
                                </tr>
                                <tr>
                                    <th scop="col">Zipcode</th>
                                    <td>226005</td>
                                </tr>
                                <tr>
                                    <th scop="col">City</th>
                                    <td>Lucknow</td>
                                </tr>
                                <tr>
                                    <th scop="col">State</th>
                                    <td>Uttar Pradesh</td>
                                </tr>
                                <tr>
                                    <th scop="col">Country</th>
                                    <td>India</td>
                                </tr>
                                <tr>
                                    <th scop="col">Address Type</th>
                                    <td>Permanent</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>