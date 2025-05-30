<?php

    include $_SERVER['DOCUMENT_ROOT']."/emart/dbh.inc.php";


if(isset($_POST['userData']) && !empty($_POST['userData'])) {
    
    if($_POST['userData'] == "insert") {
        $selectedRole = escaepD($conn, $_POST['selectedRole']);
        $userFirstName = escaepD($conn, $_POST['userFirstName']);
        $userLastName = escaepD($conn, $_POST['userLastName']);
        $userName = escaepD($conn, $_POST['userName']);
        $userPassword = escaepD($conn, $_POST['userPassword']);
        $userNo = escaepD($conn, $_POST['userNo']);
        $userDateCreated = escaepD($conn, $_POST['userDateCreated']);
        
        $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

        $slqChkUser = (mysqli_query($conn, "SELECT * FROM `systemusertb` WHERE `selectedRole`='".$selectedRole."' AND `userFirstName`='".$userFirstName."' AND `userLastName`='".$userLastName."' AND `userName`='".$userName."'"));

        $resCount = (mysqli_num_rows($slqChkUser));

        if ($resCount > 0) {

            $mk['ermySuc'] = "found";
            $mk['ermyNote'] = "Sorry User Already Exists...!";

        } else {
            
            if(mysqli_query($conn, sprintf("INSERT INTO `systemusertb`(`selectedRole`, `userFirstName`, `userLastName`, `userName`, `userPassword`, `userNo`, `userDateCreated`) VALUES ('%s','%s','%s','%s','%s','%s','%s')", $selectedRole, $userFirstName, $userLastName, $userName, $hashedPwd, $userNo, $userDateCreated))) {

                $mk['ermyNote'] = "User Added Successfully!";
                $mk['ermySuc'] = true;

            } else {
                
                $mk['ermyNote'] = "Error Adding User!";
                $mk['ermySuc'] = false;

            }

        }        
        
    } 
    
    echo json_encode($mk);
    
    
}