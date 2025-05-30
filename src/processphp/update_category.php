<?php


    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['updateCate']) && !empty($_POST['updateCate'])) {
        
        if ($_POST['updateCate'] == "update") {
            
            $cateId  = escaepD($conn, $_POST['cateId']);
            $cateName_v  = escaepD($conn, $_POST['cateName_v']);
            $cateDesc_v  = escaepD($conn, $_POST['cateDesc_v']);

            $sqlUpdateCate = (mysqli_query($conn, "UPDATE `productcategorytb` SET `categoryName`='".$cateName_v."',`categoryDescription`='".$cateDesc_v."' WHERE `categoryId`='".$cateId."'"));

            if ($sqlUpdateCate) {
                
                $mk['ermySuc'] = true;
                $mk['ermyNote'] = "Category Updated Successfully!";

            } else {
                
                $mk['ermySuc'] = false;
                $mk['ermyNote'] = "Error Updating Category!";

            }

        } else {
            
            $mk['ermySuc'] = "data";
            $mk['ermyNote'] = "Error Processing Data!";

        }

        echo json_encode($mk);

    }