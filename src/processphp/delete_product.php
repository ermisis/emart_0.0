<?php

    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';


    if(isset($_POST['pro_id']) && !empty($_POST['pro_id'])) {

        $pro_id = escaepD($conn, $_POST['pro_id']);
        
        $tempDel = mysqli_query($conn, "UPDATE `producttb` SET `productDeleted`='1' WHERE `productId`='".$pro_id."'");
        
        if ($tempDel) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Product Moved to Trash!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting Product...!";

        }

        echo json_encode($mk);
        
    } elseif (isset($_POST['pro_idH']) && !empty($_POST['pro_idH'])) {
        
        $pro_idH = escaepD($conn, $_POST['pro_idH']);

        $restore = (mysqli_query($conn, "UPDATE `producttb` SET `productDeleted`='0' WHERE `productId`='".$pro_idH."'"));

        if ($restore) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Product Restored!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Restoring Product!";

        }

        echo json_encode($mk);

    } elseif (isset($_POST['clrProHis']) && !empty($_POST['clrProHis'])) {

        $clearAllPro = (mysqli_query($conn, "DELETE FROM `producttb` WHERE `productDeleted`=1"));

        if ($clearAllPro) {
            
            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Product Deleted Permanently!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting Product!";

        }

        echo json_encode($mk);

    } else {
        
        $mk['ermySuc'] = "data";
        $mk['ermyNote'] = "Error Processing!";

        echo json_encode($mk);
    }

