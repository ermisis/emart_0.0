<?php


    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['config']) && !empty($_POST['config'])) {
        
        if ($_POST['config'] == "apply") {
            
            $configId = escaepD($conn, $_POST['configId']);
            $vatConfig = escaepD($conn, $_POST['vatConfig']);
            $discountConfig = escaepD($conn, $_POST['discountConfig']);

            
            if (mysqli_query($conn, "UPDATE `prodconfig` SET `vat`='".$vatConfig."',`discount`='".$discountConfig."' WHERE `id`='".$configId."'")) {

                $mk['ermySuc'] = true;
                $mk['ermyNote'] = "Update Successfully!";

            } else {
                
                $mk['ermySuc'] = false;
                $mk['ermyNote'] = "Error: Please Try Check Well...!";

            }

        } else {
            
            $mk['ermySuc'] = "data";
            $mk['ermyNote'] = "Error Processing Data...!";
        }

        echo json_encode($mk);

    }