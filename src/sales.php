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
        <?php 
            $sql = (mysqli_query($conn, "SELECT * FROM `purchasetb`"));
            $rowCnt = (mysqli_num_rows($sql));
        ?>
        <!-- *************************************************************** -->
        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="card-title">Sales Table</h4>
                    <div class="ml-auto">
                        <h3><span class="badge badge-secondary float-left">Total List <span
                                    class="badge badge-light"><?php echo $rowCnt;?></span></span></h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered no-wrap" width="100%" cellspacing="0"
                        style="text-align: center;" id="salesTable">
                        <thead class="bg-primary text-white">
                            <tr class="border-1">
                                <th>ID</th>
                                <th>BILL NO.</th>
                                <th>CUSTOMER NAME</th>
                                <th>CUSTOMER NO.</th>
                                <th>PROCESSED BY</th>
                                <th>BILL DATE</th>
                                <th>AMOUNT PAID</th>
                                <th>BALANCE</th>
                                <th>TOTAL COST</th>
                                <th>TOTAL QUANTITY SOLD</th>
                                <th>DISCOUNT</th>
                                <th>VAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
				  
                                while($row = mysqli_fetch_array($sql)){
                                    
                                $id = $row['id'];
                                $billNo = $row['billNo'];
                                $customerName = $row['customerName'];
                                $customerNo = $row['customerNo'];
                                $processedBy = $row['processedBy'];
                                $billDate = $row['billDate'];
                                $amountPaid = $row['amountPaid'];
                                $balance = $row['balance'];
                                $totalItemPrice = $row['totalItemPrice'];
                                $totalItemQuantity = $row['totalItemQuantity'];
                                $discount = $row['discount'];
                                $vat = $row['vat'];
                                
                        
                            if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                            
                                    echo "<tr>
                                        <td>".$id."</td>
                                        <td>".$billNo."</td>
                                        <td>".$customerName."</td>
                                        <td>".$customerNo."</td>
                                        <td>".$processedBy."</td>
                                        <td>".$billDate."</td>
                                        <td>".$amountPaid."</td>
                                        <td>".$balance."</td>
                                        <td>".$totalItemPrice."</td>
                                        <td>".$totalItemQuantity."</td>
                                        <td>".$discount."</td>
                                        <td>".$vat."</td>
                                        </tr>" ;
                                } else {
                                    
                                    echo "<>
                                        <td>".$id."</td>
                                        <td>".$billNo."</td>
                                        <td>".$customerName."</td>
                                        <td>".$customerNo."</td>
                                        <td>".$processedBy."</td>
                                        <td>".$billDate."</td>
                                        <td>".$amountPaid."</td>
                                        <td>".$balance."</td>
                                        <td>".$totalItemPrice."</td>
                                        <td>".$totalItemQuantity."</td>
                                        <td>".$discount."</td>
                                        <td>".$vat."</td>
                                        </tr>" ;
                                }
                                
                                
                                        }
                                }
                                                                
                                ?>
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
    <div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header modal-md">
                    <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">
                        Payment Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-body" action="" method="POST" id="receiptForm" name="receiptForm"
                        enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">Customer Name</span>
                                        </div>
                                        <input type="hidden" id="id_r" name="id_r">
                                        <input type="hidden" id="billNo_r" name="billNo_r">
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="custName_r" name="custName_r" readOnly>
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
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="custNum_r" name="custNum_r" readOnly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <input type="hidden" class="form-control border-1 custom-shadow custom-radius"
                                            id="processedBy_r" name="processedBy_r" readOnly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <input type="hidden" class="form-control border-1 custom-shadow custom-radius"
                                            id="billDate_r" name="billDate_r" readOnly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">PAID
                                                <!-- GH<span>&#8373;</span></span> -->
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="amountPaid_r" name="amountPaid_r" readOnly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">BALANCE
                                                <!-- GH<span>&#8373;</span></span> -->
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="balance_r" name="balance_r" readOnly>
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
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="totalItemPrice_r" name="totalItemPrice_r" readOnly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text border-0 custom-shadow custom-radius"
                                                id="inputGroup-sizing-default">
                                                Total Items</span>
                                        </div>
                                        <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                            id="totalItemQuantity_r" name="totalItemQuantity_r" readOnly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group form-group">
                                        <input type="hidden" class="form-control border-1 custom-shadow custom-radius"
                                            id="discount_r" name="discount_r" readOnly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group form-group">
                                        <input type="hidden" class="form-control border-1 custom-shadow custom-radius"
                                            id="vat_r" name="vat_r" readOnly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info" id="print" name="print">Print</button>
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