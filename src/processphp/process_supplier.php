<?php

    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['addSup']) && !empty($_POST['addSup'])) {

        if ($_POST['addSup'] == "insert") {
            
            $supplierName = escaepD($conn, $_POST['supplierName']);
            $supplierLoc = escaepD($conn, $_POST['supplierLoc']);
            $supplierNum = escaepD($conn, $_POST['supplierNum']);
            $supplierRate = escaepD($conn, $_POST['supplierRate']);

            $sqlChk = (mysqli_query($conn, "SELECT * FROM `suppliertb` WHERE `supplierName`='".$supplierName."' AND `supplierLocation`='".$supplierLoc."' AND `supplierNumber`='".$supplierNum."'"));

            $chkRow = (mysqli_num_rows($sqlChk));

            if ($chkRow > 0) {
                
                $mk['ermySuc'] = "found";
                $mk['ermyNote'] = "Supplier Already Exists!";

            } else {
                
                if (mysqli_query($conn, sprintf("INSERT INTO `suppliertb`(`supplierName`, `supplierLocation`, `supplierNumber`, `supplierRate`) VALUES ('%s','%s','%s','%s')", $supplierName, $supplierLoc, $supplierNum, $supplierRate))) {
                    
                    $mk['ermySuc'] = true;
                    $mk['ermyNote'] = "Supplier Added Successfully!";

                } else {
                    
                    $mk['ermySuc'] = false;
                    $mk['ermyNote'] = "Error Adding Supplier!";

                }

            }

        }

        echo json_encode($mk);

    }