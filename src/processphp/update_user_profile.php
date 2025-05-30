<?php

    include $_SERVER['DOCUMENT_ROOT']."/emart/dbh.inc.php";


if(isset($_POST['userPassword_p']) && empty($_POST['userPassword_p'])) {

    $userId_p = escaepD($conn, $_POST['userId_p']);
    $selectedRole_p = escaepD($conn, $_POST['selectedRole_p']);
    $userFirstName_p = escaepD($conn, $_POST['userFirstName_p']);
    $userLastName_p = escaepD($conn, $_POST['userLastName_p']);
    $userName_p = escaepD($conn, $_POST['userName_p']);
    $userNo_p = escaepD($conn, $_POST['userNo_p']);
    $userDateCreated_p = escaepD($conn, $_POST['userDateCreated_p']);

    if(mysqli_query($conn, sprintf("UPDATE `systemusertb` SET `selectedRole`='".$selectedRole_p."',`userFirstName`='".$userFirstName_p."',`userLastName`='".$userLastName_p."',`userName`='".$userName_p."',`userNo`='".$userNo_p."',`userDateCreated`='".$userDateCreated_p."' WHERE `userId`='".$userId_p."'"))) {

        $mk['ermyNote'] = "User Updated Successfully!";
        $mk['ermySuc'] = true;

    } else {
        
        $mk['ermyNote'] = "Error Updating User!";
        $mk['ermySuc'] = false;

    }     
        
} elseif (isset($_POST['userPassword_p']) && !empty($_POST['userPassword_p'])) {
        
    $userId_p = escaepD($conn, $_POST['userId_p']);
    $selectedRole_p = escaepD($conn, $_POST['selectedRole_p']);
    $userFirstName_p = escaepD($conn, $_POST['userFirstName_p']);
    $userLastName_p = escaepD($conn, $_POST['userLastName_p']);
    $userName_p = escaepD($conn, $_POST['userName_p']);
    $userPassword_p = escaepD($conn, $_POST['userPassword_p']);
    $userNo_p = escaepD($conn, $_POST['userNo_p']);
    $userDateCreated_p = escaepD($conn, $_POST['userDateCreated_p']);
    
    $hashedPwd_p = password_hash($userPassword_p, PASSWORD_DEFAULT);

    if(mysqli_query($conn, sprintf("UPDATE `systemusertb` SET `selectedRole`='".$selectedRole_p."',`userFirstName`='".$userFirstName_p."',`userLastName`='".$userLastName_p."',`userName`='".$userName_p."',`userPassword`='".$hashedPwd_p."',`userNo`='".$userNo_p."',`userDateCreated`='".$userDateCreated_p."' WHERE `userId`='".$userId_p."'"))) {

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
    