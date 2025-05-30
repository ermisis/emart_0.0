<?php

    session_start();
    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['code']) && !empty($_POST['code'])) {

        $scanedItem = escaepD($conn, $_POST['code']);
        $selectedPro = escaepD($conn, $_POST['selectedPro']);
        
        $sqlFetch = (mysqli_query($conn, "SELECT * FROM `producttb` WHERE `productBcode`='".$scanedItem."' OR `productName`='".$selectedPro."'"));

        $numRows = mysqli_num_rows($sqlFetch);

        $fetchedItem = array();

        if ($numRows > 0) {
            
            $row = mysqli_fetch_assoc($sqlFetch);

            $results = [

                "results" => $row,
                "note"    => "Data Received from Database!"
            ];

        } else {
            
            $results = [

                "results" => false,
                "note"    => "No Data Found!"

            ];

        }
        
    } elseif (isset($_POST['selectPro']) && !empty($_POST['selectPro'])) {
        
        $selectPro = escaepD($conn, $_POST['selectPro']);
        
        $sqlFetch = (mysqli_query($conn, "SELECT * FROM `producttb` WHERE `productName`='".$selectPro."'"));

        $numRows = mysqli_num_rows($sqlFetch);

        $fetchedItem = array();

        if ($numRows > 0) {
            
            $row = mysqli_fetch_assoc($sqlFetch);

            $results = [

                "results" => $row,
                "note"    => "Data Received from Database!"
            ];

        } else {
            
            $results = [

                "results" => false,
                "note"    => "No Data Found!"

            ];

        }

    }

    echo json_encode($results);