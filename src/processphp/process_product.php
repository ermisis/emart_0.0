<?php

    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['addPro']) && !empty($_POST['addPro'])) {

        if ($_POST['addPro'] == "insert") {

            $probcode = escaepD($conn, $_POST['probcode']);
            $proName = escaepD($conn, $_POST['proName']);
            $proBrand = escaepD($conn, $_POST['proBrand']);
            $proDesc = escaepD($conn, $_POST['proDesc']);
            $proCategory = escaepD($conn, $_POST['proCategory']);
            $mValue = escaepD($conn, $_POST['mValue']);
            $proCost = escaepD($conn, $_POST['proCost']);
            $pQuantity = escaepD($conn, $_POST['pQuantity']);
            $pDiscount = escaepD($conn, $_POST['pDiscount']);
            $pUnit = escaepD($conn, $_POST['pUnit']);
            $supplier = escaepD($conn, $_POST['supplier']);
            $manDate = escaepD($conn, $_POST['manDate']);
            $expDate = escaepD($conn, $_POST['expDate']);
            $pcDate = escaepD($conn, $_POST['pcDate']);

            $chkTable = (mysqli_query($conn, "SELECT * FROM `producttb` WHERE `productBcode`='".$probcode."' AND `productName`='".$proName."' AND `productBrand`='".$proBrand."' AND `productDescription`='".$proDesc."' AND `productCategory`='".$proCategory."'"));

            $rowCount = mysqli_num_rows($chkTable);

            if ($rowCount > 0) {
                
                $mk['ermySuc'] = "found";
                $mk['ermyNote'] = "Product Already Exists!";

            } else {
                
                if (mysqli_query($conn, sprintf("INSERT INTO `producttb`(`productBcode`, `productName`, `productBrand`, `productDescription`, `productCategory`, `productMvalue`, `productCost`, `productQuantity`, `discount`, `unit`, `productSupplier`, `productManDate`, `productExpDate`, `productCreatedDate`) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')", $probcode, $proName, $proBrand, $proDesc, $proCategory, $mValue, $proCost, $pQuantity, $pDiscount, $pUnit, $supplier, $manDate, $expDate, $pcDate))) {
                    
                    $mk['ermySuc'] = true;
                    $mk['ermyNote'] = "Product Added Successfully!";

                } else {
                    
                    $mk['ermySuc'] = false;
                    $mk['ermyNote'] = "Error Adding User!";

                }

            }
            
        }

        echo json_encode($mk);


    }