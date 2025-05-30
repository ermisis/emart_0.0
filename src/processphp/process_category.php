<?php

    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';


    if (isset($_POST['addCate']) && !empty($_POST['addCate'])) {

        if ($_POST['addCate'] == "insert") {

            $cateName = escaepD($conn, $_POST['cateName']);
            $cateDesc = escaepD($conn, $_POST['cateDesc']);

            $chkTable = (mysqli_query($conn, "SELECT * FROM `productcategorytb` WHERE `categoryName`='".$cateName."' AND `categoryDescription`='".$cateDesc."'"));

            $rowCount = mysqli_num_rows($chkTable);

            if ($rowCount > 0) {

                $mk['ermySuc'] = "found";
                $mk['ermyNote'] = "Category Already exists in List";

            } else {

                if (mysqli_query($conn, sprintf("INSERT INTO `productcategorytb`(`categoryName`, `categoryDescription`) VALUES ('%s','%s')", $cateName, $cateDesc))) {

                    $mk['ermySuc'] = true;
                    $mk['ermyNote'] = "Category Added Successfully!";
                     
                } else {

                    $mk['ermySuc'] = false;
                    $mk['ermyNote'] = "Error Adding Category!";

                }

            }
            
        }

        echo json_encode($mk);


    }