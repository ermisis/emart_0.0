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
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <button type="button" id="query_modal_btn" class="btn btn-info" data-toggle="modal"
                                data-target="#querySalesModal">
                                Query Sales
                            </button>
                    <div class="ml-auto">
                        <h3><span class="badge badge-secondary float-left">Total List <span
                                    class="badge badge-light totalList"></span></span></h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" width="100%" cellspacing="0"
                        style="text-align: center;" id="queryTable">
                        <thead class="bg-primary text-white tblHead">
                            <tr class="border-1">
                                <th>ID</th>
                                <th>BILL NO.</th>
                                <th>PROCESSED BY</th>
                                <th>BILL DATE</th>
                                <th>AMOUNT PAID</th>
                                <th>BALANCE</th>
                                <th>TOTAL COST</th>
                                <th>TOTAL QUANTITY SOLD</th>
                            </tr>
                        </thead>
                        <tbody class="tblBody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>
    <!-- *************************************************************** -->
    <!-- End First Cards -->
    <!-- *************************************************************** -->
    <!-- Payment Form Receipt -->
    <div class="modal fade" id="querySalesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header modal-md">
                    <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">
                        Search Sales</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-body" action="" method="POST" id="queryForm" name="queryForm"
                        enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">Search By Product Name</span>
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="searchProName" name="searchProName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">Search By Category Name
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="searchCateName" name="searchCateName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">Search By User/Cashier
                                            </span>
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="searchUserName" name="searchUserName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">Search By Date/Period
                                            </span>
                                        </div>
                                        <input type="date" class="form-control border-1 custom-shadow custom-radius"
                                            id="searchDate" name="searchDate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info" id="searchBtn" name="searchBtn">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->


<?php

include('includes/scripts.php');
include('includes/footer.php');

?>