<?php 

include('includes/header.php');
include('includes/menubar.php');

?>


<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
        <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                            <h3 class="text-dark mb-1 font-weight-medium">₵</h3>
                                <h3 class="text-dark mb-1 font-weight-medium" id="totalSales"></h3>
                                <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none" id="totalSalePerc"></span>
                            </div>
                            <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Sales</h5>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h3 class="text-dark mb-1 font-weight-medium" id="itemSold"></h3>
                                <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block" id="totalQtyPerc"></span>
                            </div>
                            <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Item Sold</h5>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h3 class="text-dark mb-1 font-weight-medium" id="totalStock"></h3>
                            <h5 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Stock</h5>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Sales Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Regulate Rate</h4>
                        <hr>
                        <form class="form-body" action="" method="POST" id="rateForm" name="rateForm"
                            enctype="multipart/form-data">
                            <?php 
                                $sql = (mysqli_query($conn, "SELECT * FROM `prodconfig` WHERE `id`='1' LIMIT 1"));
                                while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">VAT (%)</span>
                                        </div>
                                        <input type="hidden" id="configId" name="configId" value="<?= $row['id']; ?>">
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="vatConfig" name="vatConfig" value="<?= $row['vat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">DISCOUNT (%)</span>
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="discountConfig" name="discountConfig" value="<?= $row['discount']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info" id="applyBtn"
                                        name="applyBtn">Apply</button>
                                </div>
                            </div>
                            <?php 
                                }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Net Income</h4>
                        <div class="net-income mt-4 position-relative" style="height:294px;"></div>
                        <ul class="list-inline text-center mt-5 mb-2">
                            <li class="list-inline-item text-muted font-italic">Sales for this month</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Earning by Location</h4>
                        <div class="" style="height:180px">
                            <div id="visitbylocate" style="height:100%"></div>
                        </div>
                        <div class="row mb-3 align-items-center mt-1 mt-5">
                            <div class="col-4 text-right">
                                <span class="text-muted font-14">India</span>
                            </div>
                            <div class="col-5">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <span class="mb-0 font-14 text-dark font-weight-medium">28%</span>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-right">
                                <span class="text-muted font-14">UK</span>
                            </div>
                            <div class="col-5">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 74%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-4 text-right">
                                <span class="text-muted font-14">USA</span>
                            </div>
                            <div class="col-5">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-4 text-right">
                                <span class="text-muted font-14">China</span>
                            </div>
                            <div class="col-5">
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 text-right">
                                <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Sales Charts Section -->
        <!-- *************************************************************** -->

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


    <?php

include('includes/scripts.php');
include('includes/footer.php');

?>