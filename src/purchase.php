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
                                <h3 class="text-dark mb-1 font-weight-medium"><span>&#8373;</span></h3>
                                <h3 class="text-dark mb-1 font-weight-medium" id="totalSales"></h3>
                                <span
                                    class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none"
                                    id="totalSalePerc"></span>
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
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block"
                                    id="totalQtyPerc"></span>
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
        <!-- Main Order Cart & Recent Activity Container Starts here -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <h4 class="card-title mb-0">Shopping Cart</h4>
                        </div>
                        <hr>
                        <div class="customize-input float-center mt-4 mb-0">
                            <h4 class="text-center">Please kindly Scan your Product into the Shopping Cart
                                <span class="page-title text-truncate text-dark font-weight-medium mb-1"
                                    id="scanNote"></span></h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text border-0 custom-shadow custom-radius"
                                            id="inputGroup-sizing-default">
                                            Search Product By Name</span>
                                    </div>
                                    <select type="text" class="form-control border-1 custom-shadow custom-radius"
                                        id="selectPro" name="selectPro">
                                        <option selected id="selectedPro" value="selectedPro">Select
                                        </option>
                                        <?php 
                                        $sqlProName = mysqli_query($conn, "SELECT * FROM `producttb`");
                                        while ($row = mysqli_fetch_assoc($sqlProName)) {
                                            echo "<option value='". $row['productName'] ."'>" .$row['productName'] ."</option>";
                                        }
                                    ?>
                                    </select>
                                    <script type="text/javascript">
                                        function getSelectedVal() {

                                            var selectedPro = getElementById("selectPro");
                                            var index = selectedPro.option[selectedPro.selectedIndex].text;

                                            getElementById("selectedPro").selectedPro = index;

                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group form-group">
                                    <button type="button" class="btn btn-info add-item btn-md" data-placement="top"
                                        title="Add Item To Cart" id="addToCart" name="addToCart" Tooltip on top><i
                                            class="fas fa-plus-square"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Order Cart Table -->
                        <div class="pl-4 mb-5">
                            <div class="table-responsive">
                                <table class="table no-wrap v-middle mb-0 cat-tb">
                                    <thead class="cat-thead">
                                        <tr class="border-0">
                                            <th class="border-0 font-14 font-weight-medium text-muted th-product">
                                                PRODUCT
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted px-2 th-price">
                                                PRICE
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted th-quantity">
                                                QUANTITY</th>
                                            <th class="border-0 font-14 font-weight-medium text-muted th-total">TOTAL
                                            </th>
                                            <th
                                                class="border-0 font-14 font-weight-medium text-muted text-center th-actions">
                                                ACTION
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="cat-tbody" id="cat-tbody">
                                        <tr class="tb-row" id="tb-row">
                                            <!-- Table Data Generated from Functions.js File -->
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="customize-input float-center mt-4 mb-0">
                            <h4 class="text-center">ITEM TOTAL: <span
                                    class="page-title text-truncate text-dark font-weight-medium mb-1"
                                    id="iTotal"></span></h4>
                            <h4 class="text-center">PRICE TOTAL: <span
                                    class="page-title text-truncate text-dark font-weight-medium mb-1"
                                    id="pTotal"></span></h4>
                        </div>
                        <div class="list-inline text-center mt-4 mb-0">
                            <button type="button" id="paymnt_modal_btn" class="btn btn-info" data-toggle="modal"
                                data-target="#makePaymentModal">
                                Make Purchase
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Activity Container Starts here -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Activity</h4>
                        <div class="mt-4 activity">
                            <div class="d-flex align-items-start border-left-line pb-3">
                                <div>
                                    <a href="javascript:void(0)" class="btn btn-info btn-circle mb-2 btn-item">
                                        <i data-feather="shopping-cart"></i>
                                    </a>
                                </div>
                                <div class="ml-3 mt-2">
                                    <h5 class="text-dark font-weight-medium mb-2">Last Product Sold!</h5>
                                    <p class="font-14 mb-2 text-muted" id="proSoldName"></p>
                                    <p class="font-14 mb-2 text-muted" id="proDesc"></p>
                                    <p class="font-14 mb-2 text-muted" id="itsPrice"></p>
                                    <p class="font-14 mb-2 text-muted" id="soldBy"></p>
                                    <!-- <span class="font-weight-light font-14 text-muted" id="timeDiff"></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- Main Order Cart & Recent Activity Container Starts here -->
        <!-- *************************************************************** -->
        <!-- Order Cart Payment Form -->
        <div class="modal fade" id="makePaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content modal-md">
                    <div class="modal-header modal-md">
                        <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">
                            Complete your Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-body" action="" method="POST" id="transactionForm" name="transactionForm"
                            enctype="multipart/form-data">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Customer Name</span>
                                            </div>
                                            <input type="hidden" class="getBillNo" id="billNo" name="billNo">
                                            <input type="text"
                                                class="form-control border-1 custom-shadow custom-radius getCustomerName"
                                                id="custName" name="custName" placeholder="Optional">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Customer Tell.
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-1 custom-shadow custom-radius getCustomerNo"
                                                id="custNum" name="custNum" placeholder="Optional">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <input type="hidden"
                                                class="form-control border-1 custom-shadow custom-radius getUser"
                                                id="processedBy" name="processedBy"
                                                value="<?php echo $_SESSION['userFirstName']." ".$_SESSION['userLastName']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <input type="hidden"
                                                class="form-control border-1 custom-shadow custom-radius getDate"
                                                id="billDate" name="billDate" value="<?php echo date('Y-m-d H:i:s');?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">
                                                    GH<span>&#8373;</span></span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-1 custom-shadow custom-radius getPaid"
                                                id="amountPaid" name="amountPaid" placeholder="Amount Paid">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">
                                                    GH<span>&#8373;</span></span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-1 custom-shadow custom-radius getBalance"
                                                id="balance" name="balance" placeholder="Balance Received" readOnly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">
                                                    Amount Due</span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-1 custom-shadow custom-radius getAmount"
                                                id="totalItemPrice" name="totalItemPrice" readOnly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">
                                                    Total Items</span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-1 custom-shadow custom-radius getTotQty"
                                                id="totalItemQuantity" name="totalItemQuantity" readOnly>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                $sql = (mysqli_query($conn, "SELECT * FROM `prodconfig` WHERE `id`='1' LIMIT 1"));
                                while($val = mysqli_fetch_assoc($sql)) {
                            ?>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <input type="hidden"
                                                class="form-control border-1 custom-shadow custom-radius getDiscount"
                                                id="discount" name="discount" value="<?= $val['discount']; ?>" readOnly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <input type="hidden"
                                                class="form-control border-1 custom-shadow custom-radius getVat"
                                                id="vat" name="vat" value="<?= $val['vat']; ?>" readOnly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                    ?>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Close</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    <button type="button" class="btn btn-info printReciept" id="submitTran"
                                        name="submitTran">Submit
                                        Transaction</button>
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