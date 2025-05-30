<?php 

include('includes/header.php');
include('includes/menubar.php');

?>


<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">PRODUCT MANAGEMENT - HISTORY</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- TAB LIST -->
        <!-- *************************************************************** -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#product" role="tab"
                    aria-controls="pills-home" aria-selected="true">PRODUCT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#p-category" role="tab"
                    aria-controls="pills-profile" aria-selected="true">PRODUCT CATEGORY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#p-supplier" role="tab"
                    aria-controls="pills-contact" aria-selected="true">COMPANY/SUPPLIER</a>
            </li>
        </ul>

        <!-- MAIN TAB CONTAINER -->
        <div class="tab-content" id="pills-tabContent">

            <!-- MAIN PRODUCT TAB CONTAINER -->
            <?php
                $selectProduct = mysqli_query($conn, "SELECT * FROM `producttb` WHERE `productDeleted`=1");
                $proCount = mysqli_num_rows($selectProduct);
            ?>
            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container-fluid">
                    
                    <!-- Product Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="submit" class="btn btn-pink float-left clearProHistory" id="clrProHis" name="clrProHis">Clear Product History</button>
                            <h2><span class="badge badge-secondary float-right">Total List <span
                                        class="badge badge-light"><?php echo $proCount;?></span></span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-wrap" width="100%" cellspacing="0"
                                    style="text-align: center;" id="product_tb">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>BARCODE</th>
                                            <th>NAME</th>
                                            <th>BRAND</th>
                                            <th>DESCRIPTION</th>
                                            <th>CATEGORY</th>
                                            <th>COST</th>
                                            <th>MARKET VALUE</th>
                                            <th>QUANTITY</th>
                                            <th>UNIT</th>
                                            <th>SUPPLIER</th>
                                            <th>MANDATE</th>
                                            <th>EXPDATE</th>
                                            <th>INPUT DATE</th>
                                            <th>OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $dt = date("Y-m-d H:i:s");
                                        while($row = mysqli_fetch_array($selectProduct)){
                                            
                                        $productId = $row['productId'];
                                        $productBcode = $row['productBcode'];
                                        $productName = $row['productName'];
                                        $productBrand = $row['productBrand'];
                                        $productDescription = $row['productDescription'];
                                        $productCategory = $row['productCategory'];
                                        $productMvalue = $row['productMvalue'];
                                        $productCost = $row['productCost'];
                                        $productQuantity = $row['productQuantity'];
                                        $pUnit = $row['unit'];
                                        $productSupplier = $row['productSupplier'];
                                        $productManDate = $row['productManDate'];
                                        $productExpDate = $row['productExpDate'];
                                        $productCreatedDate = $row['productCreatedDate'];

                                        $rd = $row['productManDate'] - $row['productExpDate'];
                                        (int)$rd <= 7 ? $rowColor = "color:red; font-weight:bold;" : $rowColor = "";
                                        
                                
                                    if (isset($_SESSION['selectedRole'])) {
                                                if ($_SESSION['selectedRole'] === "Admin") {
                                    
                                            echo "<tr style='$rowColor'>
                                                <td>".$productId."</td>
                                                <td>".$productBcode."</td>
                                                <td>".$productName."</td>
                                                <td>".$productBrand."</td>
                                                <td>".$productDescription."</td>
                                                <td>".$productCategory."</td>
                                                <td>".$productMvalue."</td>
                                                <td>".$productCost."</td>
                                                <td>".$productQuantity."</td>
                                                <td>".$pUnit."</td>
                                                <td>".$productSupplier."</td>
                                                <td>".$productManDate."</td>
                                                <td>".$productExpDate."</td>
                                                <td>".$productCreatedDate."</td>
                                                <td><button type='button' class='btn btn-info deleteProH btn-sm' data-placement='top' title='Restore Product' id='$productId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
                                                </tr>" ;
                                        } else {
                                            
                                            echo "<tr style='$rowColor'>
                                            <td>".$productId."</td>
                                            <td>".$productBcode."</td>
                                            <td>".$productName."</td>
                                            <td>".$productBrand."</td>
                                            <td>".$productDescription."</td>
                                            <td>".$productCategory."</td>
                                            <td>".$productMvalue."</td>
                                            <td>".$productCost."</td>
                                            <td>".$productQuantity."</td>
                                            <td>".$pUnit."</td>
                                            <td>".$productSupplier."</td>
                                            <td>".$productManDate."</td>
                                            <td>".$productExpDate."</td>
                                            <td>".$productCreatedDate."</td>
                                            <td><button type='button' disabled class='btn btn-info deleteProH btn-sm' data-placement='top' title='Restore Product' id='$productId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
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
                </div>
            </div>
            <!-- END OF MAIN PRODUCT FIELD -->

            <!-- MAIN CATEGORY TAB CONTAINER -->
            <?php
                $selectCate = mysqli_query($conn, "SELECT * FROM `productcategorytb` WHERE `categoryDeleted`=1");
                $cateCount = mysqli_num_rows($selectCate);
            ?>
            <div class="tab-pane fade" id="p-category" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid">
                    
                    <!-- Product Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="submit" class="btn btn-pink float-left clearCatHistory" id="clrCatHis" name="clrCatHis">Clear Category History</button>
                            <h2><span class="badge badge-secondary float-right">Total List <span
                                        class="badge badge-light"><?php echo $cateCount;?></span></span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-wrap" width="100%" cellspacing="0"
                                    style="text-align: center;" id="category_tb">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>CATEGORY</th>
                                            <th>DESCRIPTION</th>
                                            <th>OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    while($row = mysqli_fetch_array($selectCate)){
                                        
                                    $categoryId = $row['categoryId'];
                                    $categoryName = $row['categoryName'];
                                    $categoryDescription = $row['categoryDescription'];


                                    if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {

                                        echo "<tr>
                                            <td>".$categoryId."</td>
                                            <td>".$categoryName."</td>
                                            <td>".$categoryDescription."</td>
                                            <td><button type='button' class='btn btn-info deleteCateHdeleteSupH btn-sm' data-placement='top' title='Restore Category' id='$categoryId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
                                            </tr>";

                                    } else {
                                        
                                        echo "<tr>
                                        <td>".$categoryId."</td>
                                        <td>".$categoryName."</td>
                                        <td>".$categoryDescription."</td>
                                        <td><button type='button' disabled class='btn btn-info deleteCateHdeleteSupH btn-sm' data-placement='top' title='Restore Category' id='$categoryId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
                                        </tr>";
                                    }


                                            }
                                    }
                                                                    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MAIN CATEGORY FIELD -->

            <!-- MAIN SUPPLIER TAB CONTAINER -->
            <?php
                $selectSup = mysqli_query($conn, "SELECT * FROM `suppliertb` WHERE `supplierDeleted`=1");
                $supCount = mysqli_num_rows($selectSup);
            ?>
            <div class="tab-pane fade" id="p-supplier" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="container-fluid">
                    <!-- Product Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="submit" class="btn btn-pink float-left clearSupHistory" id="clrSupHis" name="clrSupHis">Clear Supplier History</button>
                            <h2><span class="badge badge-secondary float-right">Total List <span
                                        class="badge badge-light"><?php echo $supCount;?></span></span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-wrap" width="100%" cellspacing="0"
                                    style="text-align: center;" id="supplier_tb">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>SUPPLIER</th>
                                            <th>LOCATION</th>
                                            <th>CONTACT</th>
                                            <th>RATE</th>
                                            <th>OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    while($row = mysqli_fetch_array($selectSup)){
                                        
                                    $supplierId = $row['supplierId'];
                                    $supplierName = $row['supplierName'];
                                    $supplierLocation = $row['supplierLocation'];
                                    $supplierNumber = $row['supplierNumber'];
                                    $supplierRate = $row['supplierRate'];


                                    if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {

                                        echo "<tr>
                                            <td>".$supplierId."</td>
                                            <td>".$supplierName."</td>
                                            <td>".$supplierLocation."</td>
                                            <td>".$supplierNumber."</td>
                                            <td>".$supplierRate."</td>
                                            <td><button type='button' class='btn btn-info deleteSupH btn-sm' data-placement='top' title='Restore Supplier' id='$supplierId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
                                            </tr>";

                                    } else {
                                        
                                        echo "<tr>
                                        <td>".$supplierId."</td>
                                        <td>".$supplierName."</td>
                                        <td>".$supplierLocation."</td>
                                        <td>".$supplierNumber."</td>
                                        <td>".$supplierRate."</td>
                                        <td><button type='button' disabled class='btn btn-info deleteSupH btn-sm' data-placement='top' title='Restore Supplier' id='$supplierId' Tooltip on top><i class='fas fa-redo-alt'></i></button></td>
                                        </tr>";
                                    }


                                            }
                                    }
                                                                    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MAIN SUPPLIER FIELD -->


        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

</div>


<?php

include('includes/scripts.php');
include('includes/footer.php');

?>