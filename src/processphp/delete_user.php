<?php

    include ($_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php');


    if (isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        
        $user_id = escaepD($conn, $_POST['user_id']);

        $sqlDelete = (mysqli_query($conn, "UPDATE `systemusertb` SET `userDeleted`='1' WHERE `userId`='".$user_id."'"));

        if ($sqlDelete) {
            $mk['ermySuc'] = true;
            $mk['ermySuc'] = "User Deleted, Check History...";
        } else {
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting User!";
        }

        echo json_encode($mk);

    } elseif (isset($_POST['user_idH']) && !empty($_POST['user_idH'])) {
        
        $user_idH = escaepD($conn, $_POST['user_idH']);

        $sqlRestore = (mysqli_query($conn, "UPDATE `systemusertb` SET `userDeleted`='0' WHERE `userId`='".$user_idH."'"));

        if ($sqlRestore) {
            $mk['ermySuc'] = true;
            $mk['ermySuc'] = "User Restored Succesfully...";
        } else {
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting User!";
        }

        echo json_encode($mk);

    } elseif (isset($_POST['userDel']) && !empty($_POST['userDel'])) {

        $sqlDel = (mysqli_query($conn, "DELETE FROM `systemusertb` WHERE `userDeleted`='1'"));

        if ($sqlDel) {
            $mk['ermySuc'] = true;
            $mk['ermySuc'] = "User Deleted Permanently...";
        } else {
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error Deleting User!";
        }
        

    } else {
        
        $mk['ermySuc'] = "data";
        $mk['ermyNote'] = "Error Processing Data";

    }