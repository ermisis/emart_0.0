<?php


    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['updatePro']) && !empty($_POST['updatePro'])) {
        
        if ($_POST['updatePro'] == "update") {
            
            $proId = escaepD($conn, $_POST['proId']);
            $probcode_v = escaepD($conn, $_POST['probcode_v']);
            $proName_v = escaepD($conn, $_POST['proName_v']);
            $proBrand_v = escaepD($conn, $_POST['proBrand_v']);
            $proDesc_v = escaepD($conn, $_POST['proDesc_v']);
            $proCategory_v = escaepD($conn, $_POST['proCategory_v']);
            $mValue_v = escaepD($conn, $_POST['mValue_v']);
            $proCost_v = escaepD($conn, $_POST['proCost_v']);
            $pQuantity_v = escaepD($conn, $_POST['pQuantity_v']);
            $discount_v = escaepD($conn, $_POST['discount_v']);
            $pUnit_v = escaepD($conn, $_POST['pUnit_v']);
            $supplier_v = escaepD($conn, $_POST['supplier_v']);
            $manDate_v = escaepD($conn, $_POST['manDate_v']);
            $expDate_v = escaepD($conn, $_POST['expDate_v']);

            $sqlUpdatePro = (mysqli_query($conn, "UPDATE `producttb` SET `productBcode`='".$probcode_v."',`productName`='".$proName_v."',`productBrand`='".$proBrand_v."',`productDescription`='".$proDesc_v."',`productCategory`='".$proCategory_v."',`productMvalue`='".$mValue_v."',`productCost`='".$proCost_v."',`discount`='".$pQuantity_v."',`productQuantity`='".$discount_v."',`unit`='".$pUnit_v."',`productSupplier`='".$supplier_v."',`productManDate`='".$manDate_v."',`productExpDate`='".$expDate_v."' WHERE `productId`='".$proId."'"));

            if ($sqlUpdatePro) {
                
                $mk['ermySuc'] = true;
                $mk['ermyNote'] = "Product Updated Successfully!";

            } else {
                
                $mk['ermySuc'] = false;
                $mk['ermyNote'] = "Error Updating Product!";

            }

        } else {
            
            $mk['ermySuc'] = "data";
            $mk['ermyNote'] = "Error Processing Data!";

        }

        echo json_encode($mk);

    }