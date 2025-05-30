<?php

    session_start();


if(isset($_POST['login_btn'])) {
    // Including Database connection...
    include $_SERVER['DOCUMENT_ROOT']."/emart/dbh.inc.php";
    // Capturing user Details from Login form...
    $uname = escaepD($conn, $_POST['uname']);
    $pwd = escaepD($conn, $_POST['pwd']);
    if (empty($uname) || empty($pwd)) {
        // If Input fields are Empty Prompt User...
        header("Location: ../login.php?login=empty");
        exit();
        
    } else {
        // Check if User Exists in Database...
        $sqlChk = mysqli_query($conn, "SELECT * FROM systemusertb WHERE userName='$uname'");
        $resultCheck = mysqli_num_rows($sqlChk);
        // If No User is found in Database Prompt Error Message...
        if ($resultCheck < 1) {
            header("Location: ../login.php?login=error:Username");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($sqlChk)) {
                // Checking Password
                $hashedPwdCheck = password_verify($pwd, $row['userPassword']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../login.php?login=error:Password");
                    exit();
                } else if ($hashedPwdCheck == true) {
                    // Holding user Details in Session
                    $_SESSION['userName']=$uname;
                    $_SESSION['userId']=$row['userId'];
                    $_SESSION['userFirstName']=$row['userFirstName'];
                    $_SESSION['userLastName']=$row['userLastName'];
                    $_SESSION['userNo']=$row['userNo'];
                    $_SESSION['selectedRole']=$row['selectedRole'];
                    
                    header("Location: ../index.php?login=success");
                    exit();
                    
                }
            }
        }
    }
} else {
    header("Location: ../login.php?login=error:login");
    exit();
}