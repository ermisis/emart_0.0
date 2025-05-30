<?php 

include('includes/header.php');
include('includes/menubar.php');

?>


<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
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
                                <h2 class="text-dark mb-1 font-weight-medium" id="totalSales"></h2>
                                <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"
                                    id="totalSalePerc"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Sales</h6>
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
                                <h2 class="text-dark mb-1 font-weight-medium" id="itemSold"></h2>
                                <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block"
                                    id="totalQtyPerc"></span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Item Sold</h6>
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
                            <h2 class="text-dark mb-1 font-weight-medium" id="totalStock"></h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Stock</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Sales Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-lg-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Query Daily Sales</h4>
                        <hr>
                        <form class="form-body" action="" method="POST" id="queryForm_d" name="queryForm_d"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Select Date/Period
                                                </span>
                                            </div>
                                            <input type="date" class="form-control border-1 custom-shadow custom-radius"
                                                id="searchDate" name="searchDate">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group form-group">
                                                <div class="input-group-prepend">
                                                    <select type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="selectUser" name="selectUser">
                                                        <option selected id="none" value="none">Select UserName/Cashier
                                                        </option>
                                                        <?php 
                                                    $userName = mysqli_query($conn, "SELECT * FROM `systemusertb`");
                                                    while ($row = mysqli_fetch_assoc($userName)) {
                                                        echo "<option value='". $row['userFirstName'] ." ". $row['userLastName'] ."'>" .$row['userFirstName'] ." ". $row['userLastName'] ."</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-info" id="searchDailyBtn"
                                            name="searchDailyBtn">Generate Report</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                                <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<button type="submit" class="btn btn-info" id="applyBtn"
                                            name="applyBtn">Apply</button>';
                                        } else {
                                            echo '<button type="submit" disabled class="btn btn-info" id="applyBtn"
                                            name="applyBtn">Apply</button>';
                                        }
                                    } 
                                    ?> 
                                </div>
                            </div>
                            <?php 
                                }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Query OverAll Sales</h4>
                        <hr>
                        <div class="list-inline text-center mt-4 mb-0">
                            <button type="button" id="overAllSalesBtn" class="btn btn-info">
                                Generate Report
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Query OverAll Expenses</h4>
                        <hr>
                        <div class="list-inline text-center mt-4 mb-0">
                            <button type="button" id="overAllExpBtn" class="btn btn-info">
                                Generate Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Sales Charts Section -->
        <!-- *************************************************************** -->
    </div>
    <!-- *************************************************************** -->
    <!-- End First Cards -->
    <!-- *************************************************************** -->



</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->


<?php

include('includes/scripts.php');
include('includes/footer.php');

?>