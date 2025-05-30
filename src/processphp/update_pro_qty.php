<?php


    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['updtProId']) && !empty($_POST['updtProId']) && 
    isset($_POST['updateProQty']) && !empty($_POST['updateProQty'])) {

        $updtProId = escaepD($conn, $_POST['updtProId']);
        $LastUpdate = escaepD($conn, $_POST['LastUpdate']);
        $updateProQty = escaepD($conn, $_POST['updateProQty']);

        if ((mysqli_query($conn, "UPDATE `producttb` SET `productQuantity`=`productQuantity`+'".$updateProQty."',`productCreatedDate`='".$LastUpdate."' WHERE `productId`='".$updtProId."'"))) {

            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Product Quantity Updated!";

        } else {

            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Product Quantity Couldnt Updated!";
            
        }

        echo json_encode($mk);

    }