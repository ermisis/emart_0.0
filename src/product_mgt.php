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
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">PRODUCT MANAGEMENT</h3>
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
                $selectProduct = mysqli_query($conn, "SELECT * FROM `producttb` WHERE `productDeleted`=0");
                $proCount = mysqli_num_rows($selectProduct);
            ?>
            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-purple">
                                <!-- Button trigger modal -->
                                <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<button type="button" id="prdt_modal_btn" class="btn btn-info" data-toggle="modal"
                                            data-target="#addProduct">
                                            Add New Product
                                        </button>';
                                        } else {
                                            echo '<button disabled type="button" id="prdt_modal_btn" class="btn btn-info" data-toggle="modal"
                                            data-target="#addProduct">
                                            Add New Product
                                        </button>';
                                        }
                                    }
                                ?>
                            </h6>
                        </div>
                    </div>
                    <!-- Product Modal -->
                    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content modal-lg">
                                <div class="modal-header modal-lg">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"
                                        style="font-weight:bold;">ADD NEW PRODUCT</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-body" action="" method="POST" id="new_product_form"
                                        name="new_product_form" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">BarCode</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="probcode" name="probcode">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Product Name</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="proName" name="proName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Product Brand</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="proBrand" name="proBrand">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Product
                                                                Description</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="proDesc" name="proDesc">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Product Category</span>
                                                        </div>
                                                        <select type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="proCategory" name="proCategory">
                                                            <option selected id="supNone" value="supNone">Select
                                                            </option>
                                                            <?php 
                                                                $sqlPro = mysqli_query($conn, "SELECT * FROM `productcategorytb`");
                                                                while ($row = mysqli_fetch_assoc($sqlPro)) {
                                                                    echo "<option value='". $row['categoryName'] ."'>" .$row['categoryName'] ."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Market Value</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="mValue" name="mValue">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Product Cost</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius pcv"
                                                            id="proCost" name="proCost">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Quantity</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius qRate"
                                                            id="pQuantity" name="pQuantity">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Discount</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius pDiscnt"
                                                            id="pDiscount" name="pDiscount" value="<?= $row['discount']; ?>" readOnly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Unit</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="pUnit" name="pUnit">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Suppliers</span>
                                                        </div>
                                                        <select type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="supplier" name="supplier">
                                                            <option selected id="supNone" value="supNone">Select
                                                            </option>
                                                            <?php 
                                                                $sqlSup = mysqli_query($conn, "SELECT * FROM `suppliertb`");
                                                                while ($row = mysqli_fetch_assoc($sqlSup)) {
                                                                    echo "<option value='". $row['supplierName']."'>" .$row['supplierName']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Date Manufactured</span>
                                                        </div>
                                                        <input type="date"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="manDate" name="manDate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Expiry Date</span>
                                                        </div>
                                                        <input type="date"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="expDate" name="expDate">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group form-group">
                                                        <input type="hidden"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="pcDate" name="pcDate"
                                                            Value="<?php echo date('Y-m-d H:i:s');?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-info" id="saveProBtn"
                                                        name="saveProBtn">Save</button>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button disabled type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-info" id="saveProBtn"
                                                        name="saveProBtn">Save</button>
                                                </div>
                                            </div>';
                                            }
                                        }
                                    ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-info">Product Table</h5>
                            <h2><span class="badge badge-secondary float-right">Total List <span
                                        class="badge badge-light"><?php echo $proCount;?></span></span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-wrap updateProTb" width="100%" cellspacing="0"
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
                                            <th>DISCOUNT</th>
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
                                        $discount = $row['discount'];
                                        $pUnit = $row['unit'];
                                        $productSupplier = $row['productSupplier'];
                                        $productManDate = $row['productManDate'];
                                        $productExpDate = $row['productExpDate'];
                                        $productCreatedDate = $row['productCreatedDate'];

                                        $newStartDate = strtotime($productManDate);
                                        $newEndDate = strtotime($productExpDate);

                                        $rd = ($newEndDate - $newStartDate)/60/60/24;
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
                                                <td>".$discount."</td>
                                                <td>".$pUnit."</td>
                                                <td>".$productSupplier."</td>
                                                <td>".$productManDate."</td>
                                                <td>".$productExpDate."</td>
                                                <td>".$productCreatedDate."</td>
                                                <td><button type='button' class='btn btn-danger deletePro btn-sm' data-placement='top' title='Delete Product' id='$productId' Tooltip on top><i class='fas fa-trash'></i></button>
                                                <button type='button' class='btn btn-info updateQtyBtn btn-sm' data-placement='top' title='Update Product Quantity' name='$productName' id='$productId' Tooltip on top><i class='far fa-plus-square'></i></button></td>
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
                                            <td>".$discount."</td>
                                            <td>".$pUnit."</td>
                                            <td>".$productSupplier."</td>
                                            <td>".$productManDate."</td>
                                            <td>".$productExpDate."</td>
                                            <td>".$productCreatedDate."</td>
                                            <td><button type='button' disabled class='btn btn-danger deletePro btn-sm' data-placement='top' title='Delete Product' id='$productId' Tooltip on top><i class='fas fa-trash'></i></button></td>
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
                <!-- Product Update Modal VIEW -->
                <div class="modal fade" id="updateProduct" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content modal-lg">
                            <div class="modal-header modal-lg">
                                <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">
                                    UPDATE
                                    PRODUCT</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-body" action="" method="POST" id="upd_product_form"
                                    name="upd_product_form" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">BarCode</span>
                                                    </div>
                                                    <input type="hidden" id="proId" name="proId">
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="probcode_v" name="probcode_v" readOnly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Product Name</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="proName_v" name="proName_v">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Product Brand</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="proBrand_v" name="proBrand_v">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Product
                                                            Description</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="proDesc_v" name="proDesc_v">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Product Category</span>
                                                    </div>
                                                    <select type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="proCategory_v" name="proCategory_v">
                                                        <?php 
                                                                $sqlPro1 = mysqli_query($conn, "SELECT * FROM `productcategorytb`");
                                                                while ($row = mysqli_fetch_assoc($sqlPro1)) {
                                                                    echo "<option value='". $row['categoryName'] ."'>" .$row['categoryName'] ."</option>";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Market Value</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="mValue_v" name="mValue_v">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Product Cost</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="proCost_v" name="proCost_v">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Quantity</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="pQuantity_v" name="pQuantity_v" readOnly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Discount</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="discount_v" name="discount_v" readOnly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Unit</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="pUnit_v" name="pUnit_v">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Suppliers</span>
                                                    </div>
                                                    <select type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="supplier_v" name="supplier_v">
                                                        <?php 
                                                                $sqlSup1 = mysqli_query($conn, "SELECT * FROM `suppliertb`");
                                                                while ($row = mysqli_fetch_assoc($sqlSup1)) {
                                                                    echo "<option value='". $row['supplierName'] ."'>" .$row['supplierName'] ."</option>";
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Date Manufactured</span>
                                                    </div>
                                                    <input type="date"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="manDate_v" name="manDate_v">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Expiry Date</span>
                                                    </div>
                                                    <input type="date"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="expDate_v" name="expDate_v">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<div class="form-actions">
                                            <div class="text-right">
                                                <button type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info" id="updateProBtn">Update</button>
                                            </div>
                                        </div>';
                                        } else {
                                            echo '<div class="form-actions">
                                            <div class="text-right">
                                                <button disabled type="button" class="btn btn-outline-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info" id="updateProBtn">Update</button>
                                            </div>
                                        </div>';
                                        }
                                    }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Quantity Update Modal VIEW -->
            <div class="modal fade" id="updateProQtyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content modal-sm">
                        <div class="modal-header modal-sm">
                            <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">Add Number Of Quantity
                        </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-body" action="" method="POST" id="update_gty_form"
                                name="update_gty_form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <input type="hidden" id="updtProId" name="updtProId">
                                            <input type="hidden" id="LastUpdate" name="LastUpdate" value="<?php echo date("Y-m-d") ?>">
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="updtProName" name="updtProName" readOnly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group form-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text border-0 custom-shadow custom-radius"
                                                    id="inputGroup-sizing-default">Product Quantity</span>
                                            </div>
                                            <input type="text" class="form-control border-1 custom-shadow custom-radius"
                                                id="updateProQty" name="updateProQty">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<div class="form-actions">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info" id="updtQtyBtn"
                                                    name="updtQtyBtn">Apply</button>
                                            </div>
                                        </div>';
                                        } else {
                                            echo '<div class="form-actions">
                                            <div class="text-center">
                                                <button disabled type="submit" class="btn btn-info" id="updtQtyBtn"
                                                    name="updtQtyBtn">Apply</button>
                                            </div>
                                        </div>';
                                        }
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MAIN PRODUCT FIELD -->

            <!-- MAIN CATEGORY TAB CONTAINER -->
            <?php
                $selectCate = mysqli_query($conn, "SELECT * FROM `productcategorytb`");
                $cateCount = mysqli_num_rows($selectCate);
            ?>
            <div class="tab-pane fade" id="p-category" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">
                                <!-- Button trigger modal -->
                                <?php
                                    if (isset($_SESSION['selectedRole'])) {
                                        if ($_SESSION['selectedRole'] === "Admin") {
                                            echo '<button type="button" id="cate_modal_btn" class="btn btn-info" data-toggle="modal"
                                            data-target="#addCategory">
                                            Add New Category
                                        </button>';
                                        } else {
                                            echo '<button disabled type="button" id="cate_modal_btn" class="btn btn-info" data-toggle="modal"
                                            data-target="#addCategory">
                                            Add New Category
                                        </button>';
                                        }
                                    }
                                ?>
                            </h6>
                        </div>
                    </div>
                    <!-- Product Modal -->
                    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content modal-md">
                                <div class="modal-header modal-md">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"
                                        style="font-weight:bold;">ADD NEW PRODUCT</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-body" action="" method="POST" id="new_category_form"
                                        name="new_category_form" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Category Name</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="cateName" name="cateName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Category
                                                                Description</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="cateDesc" name="cateDesc">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-info" id="saveCateBtn"
                                                        name="saveCateBtn">Save</button>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button disabled type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-info" id="saveCateBtn"
                                                        name="saveCateBtn">Save</button>
                                                </div>
                                            </div>';
                                            }
                                        }
                                    ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-info">Category Table</h5>
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
                                            <td><button type='button' class='btn btn-danger deleteCate btn-sm' data-placement='top' title='Delete Category' id='$categoryId' Tooltip on top><i class='fas fa-trash'></i></button></td>
                                            </tr>";

                                    } else {
                                        
                                        echo "<tr>
                                        <td>".$categoryId."</td>
                                        <td>".$categoryName."</td>
                                        <td>".$categoryDescription."</td>
                                        <td><button type='button' disabled class='btn btn-danger deleteCate btn-sm' data-placement='top' title='Delete Category' id='$categoryId' Tooltip on top><i class='fas fa-trash'></i></button></td>
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
                <!-- Product Update Modal VIEW -->
                <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content modal-lg">
                            <div class="modal-header modal-lg">
                                <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">
                                    UPDATE
                                    CATEGORY</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-body" action="" method="POST" id="upd_category_form"
                                    name="upd_category_form" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Category Name</span>
                                                    </div>
                                                    <input type="hidden" id="cateId" name="cateId">
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="cateName_v" name="cateName_v">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Category
                                                            Description</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="cateDesc_v" name="cateDesc_v">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info" id="updateCateBtn"
                                                        name="updateCateBtn">Update</button>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button disabled type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info" id="updateCateBtn"
                                                        name="updateCateBtn">Update</button>
                                                </div>
                                            </div>';
                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF MAIN CATEGORY FIELD -->

            <!-- MAIN SUPPLIER TAB CONTAINER -->
            <?php
                $selectSup = mysqli_query($conn, "SELECT * FROM `suppliertb`");
                $supCount = mysqli_num_rows($selectSup);
            ?>
            <div class="tab-pane fade" id="p-supplier" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-info">
                                <!-- Button trigger modal -->
                                <?php if (isset($_SESSION['selectedRole'])) {
                                    if ($_SESSION['selectedRole'] === "Admin") {
                                        echo'<button type="button" id="sup_modal_btn" class="btn btn-info" data-toggle="modal"
                                            data-target="#addSupplier">
                                            Add New Category
                                        </button>';
                                    } else {
                                        echo '<button disabled type="button" id="sup_modal_btn" class="btn btn-info" data-toggle="modal"
                                        data-target="#addSupplier">
                                        Add New Category
                                        </button>';
                                    }
                                }
                                ?>
                            </h6>
                        </div>
                    </div>
                    <!-- Product Modal -->
                    <div class="modal fade" id="addSupplier" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                            <div class="modal-content modal-md">
                                <div class="modal-header modal-md">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel"
                                        style="font-weight:bold;">ADD NEW SUPPLIER</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-body" action="" method="POST" id="new_supplier_form"
                                        name="new_supplier_form" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Supplier Name</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="supplierName" name="supplierName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Supplier
                                                                Location</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="supplierLoc" name="supplierLoc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Supplier
                                                                Number</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="supplierNum" name="supplierNum">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="input-group form-group">
                                                        <div class="input-group-prepend">
                                                            <span
                                                                class="input-group-text border-0 custom-shadow custom-radius"
                                                                id="inputGroup-sizing-default">Supplier Rate</span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control border-1 custom-shadow custom-radius"
                                                            id="supplierRate" name="supplierRate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-info" id="saveSupBtn"
                                                        name="saveSupBtn">Save</button>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button disabled type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                    <button type="submit" class="btn btn-info" id="saveSupBtn"
                                                        name="saveSupBtn">Save</button>
                                                </div>
                                            </div>';
                                            }
                                        }
                                    ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-info">Supplier Table</h5>
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
                                            <td><button type='button' class='btn btn-danger deleteSup btn-sm' data-placement='top' title='Delete Supplier' id='$supplierId' Tooltip on top><i class='fas fa-trash'></i></button></td>
                                            </tr>";

                                    } else {
                                        
                                        echo "<tr>
                                        <td>".$supplierId."</td>
                                        <td>".$supplierName."</td>
                                        <td>".$supplierLocation."</td>
                                        <td>".$supplierNumber."</td>
                                        <td>".$supplierRate."</td>
                                        <td><button type='button' disabled class='btn btn-danger deleteSup btn-sm' data-placement='top' title='Delete Supplier' id='$supplierId' Tooltip on top><i class='fas fa-trash'></i></button></td>
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
                <!-- Product Update Modal VIEW -->
                <div class="modal fade" id="updateSupplier" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content modal-lg">
                            <div class="modal-header modal-lg">
                                <h5 class="modal-title text-primary" id="exampleModalLabel" style="font-weight:bold;">
                                    UPDATE
                                    SUPPLIER</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-body" action="" method="POST" id="upd_supplier_form"
                                    name="upd_supplier_form" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Supplier Name</span>
                                                    </div>
                                                    <input type="hidden" id="supId" name="supId">
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="supplierName_v" name="supplierName_v">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Supplier
                                                            Location</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="supplierLoc_v" name="supplierLoc_v">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Supplier
                                                            Number</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="supplierNum_v" name="supplierNum_v">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group form-group">
                                                    <div class="input-group-prepend">
                                                        <span
                                                            class="input-group-text border-0 custom-shadow custom-radius"
                                                            id="inputGroup-sizing-default">Supplier Rate</span>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control border-1 custom-shadow custom-radius"
                                                        id="supplierRate_v" name="supplierRate_v">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if (isset($_SESSION['selectedRole'])) {
                                            if ($_SESSION['selectedRole'] === "Admin") {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info" id="updateSupBtn"
                                                        name="updateSupBtn">Update</button>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<div class="form-actions">
                                                <div class="text-right">
                                                    <button disabled type="button" class="btn btn-outline-danger"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info" id="updateSupBtn"
                                                        name="updateSupBtn">Update</button>
                                                </div>
                                            </div>';
                                            }
                                        }
                                    ?>
                                </form>
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