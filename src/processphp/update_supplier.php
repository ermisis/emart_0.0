<?php


    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['updateSup']) && !empty($_POST['updateSup'])) {
        
        if ($_POST['updateSup'] == "update") {
            
            $supId  = escaepD($conn, $_POST['supId']);
            $supplierName_v  = escaepD($conn, $_POST['supplierName_v']);
            $supplierLoc_v  = escaepD($conn, $_POST['supplierLoc_v']);
            $supplierNum_v  = escaepD($conn, $_POST['supplierNum_v']);
            $supplierRate_v  = escaepD($conn, $_POST['supplierRate_v']);

            $sqlUpdateSup = (mysqli_query($conn, "UPDATE `suppliertb` SET` supplierName`='".$supplierName_v."',`supplierLocation`='".$supplierLoc_v."',`supplierNumber`='".$supplierNum_v."',`supplierRate`='".$supplierRate_v."' WHERE `supplierId`='".$supId."'"));

            if ($sqlUpdateSup) {
                
                $mk['ermySuc'] = true;
                $mk['ermyNote'] = "Supplier Updated Successfully!";

            } else {
                
                $mk['ermySuc'] = false;
                $mk['ermyNote'] = "Error Updating Supplier!";

            }

        } else {
            
            $mk['ermySuc'] = "data";
            $mk['ermyNote'] = "Error Processing Data!";

        }

        echo json_encode($mk);

    }