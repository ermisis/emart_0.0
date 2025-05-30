<?php

    include $_SERVER['DOCUMENT_ROOT']."/emart/dbh.inc.php";


if(isset($_POST['userData_v']) && !empty($_POST['userData_v'])) {
    
    if($_POST['userData_v'] == "update") {
        $userId_v = escaepD($conn, $_POST['userId_v']);
        $selectedRole_v = escaepD($conn, $_POST['selectedRole_v']);
        $userFirstName_v = escaepD($conn, $_POST['userFirstName_v']);
        $userLastName_v = escaepD($conn, $_POST['userLastName_v']);
        $userName_v = escaepD($conn, $_POST['userName_v']);
        $userNo_v = escaepD($conn, $_POST['userNo_v']);

        if(mysqli_query($conn, sprintf("UPDATE `systemusertb` SET `selectedRole`='".$selectedRole_v."',`userFirstName`='".$userFirstName_v."',`userLastName`='".$userLastName_v."',`userName`='".$userName_v."',`userNo`='".$userNo_v."' WHERE `userId`='".$userId_v."'"))) {

            $mk['ermyNote'] = "User Updated Successfully!";
            $mk['ermySuc'] = true;

        } else {
            
            $mk['ermyNote'] = "Error Updating User!";
            $mk['ermySuc'] = false;

        }     
        
    } else {
        
        $mk['ermyNote'] = "Error Processing Data";
        $mk['ermySuc'] = "data";
    }
    
    echo json_encode($mk);
    
    
}