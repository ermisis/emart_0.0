<?php

    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';


    if (isset($_POST['sup_id']) && !empty($_POST['sup_id'])) {
        
        $sup_id = escaepD($conn, $_POST['sup_id']);

        $tempDel = (mysqli_query($conn, "UPDATE `suppliertb` SET `supplierDeleted`='1' WHERE `supplierId`='".$sup_id."'"));

        if ($tempDel) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Supplier Moved to Trash!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting Supplier!";

        }


        echo json_encode($mk);

    } elseif (isset($_POST['sup_idH']) && !empty($_POST['sup_idH'])) {
        
        $sup_idH = escaepD($conn, $_POST['sup_idH']);

        $restore = (mysqli_query($conn, "UPDATE `suppliertb` SET `supplierDeleted`='0' WHERE `supplierId`='".$sup_idH."'"));

        if ($restore) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Supplier Restored!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Restoring Supplier!";

        }

        echo json_encode($mk);

    } elseif (isset($_POST['clrSupHis']) && !empty($_POST['clrSupHis'])) {

        $clearAllPro = (mysqli_query($conn, "DELETE FROM `suppliertb` WHERE `supplierDeleted`=1"));

        if ($clearAllPro) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Supplier Deleted Permanently!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting Supplier!";

        }

        echo json_encode($mk);

    } else {
        
        $mk['ermySuc'] = false;
        $mk['ermyNote'] = "Error Processing!";

        echo json_encode($mk);
        
    }
