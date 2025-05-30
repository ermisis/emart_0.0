<?php

    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';


    if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])) {
        
        $cat_id = escaepD($conn, $_POST['cat_id']);

        $tempDel = (mysqli_query($conn, "UPDATE `productcategorytb` SET `categoryDeleted`='1' WHERE `categoryId`='".$cat_id."'"));

        if ($tempDel) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Category Moved to Trash!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting Category!";

        }


        echo json_encode($mk);

    } elseif (isset($_POST['cat_idH']) && !empty($_POST['cat_idH'])) {
        
        $cat_idH = escaepD($conn, $_POST['cat_idH']);

        $restore = (mysqli_query($conn, "UPDATE `productcategorytb` SET `categoryDeleted`='0' WHERE `categoryId`='".$cat_idH."'"));

        if ($restore) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Category Restored!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Restoring Category!";

        }

        echo json_encode($mk);

    } elseif (isset($_POST['clrCatHis']) && !empty($_POST['clrCatHis'])) {

        $clearAllPro = (mysqli_query($conn, "DELETE FROM `productcategorytb` WHERE `categoryDeleted`=1"));

        if ($clearAllPro) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Category Deleted Permanently!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting Category!";

        }

        echo json_encode($mk);

    } else {
        
        $mk['ermySuc'] = false;
        $mk['ermyNote'] = "Error Processing!";

        echo json_encode($mk);

    }

