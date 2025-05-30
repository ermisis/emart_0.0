<?php

//// Including Main Database connection
    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    session_start();

    //// Inistialising Variables
    $newProCost = 0;
    $totalProPrice = array();
    $totalProCost = array();
    $totalQtySold = array();
    $mainProductCost = array();
    $mainProductQuantity = array();
    $dailyExpenseArray = array();

    //// List of fetched data from database
    $sqlFetchDailyExpense = (mysqli_query($conn, "SELECT * FROM `dailyexpense`"));
    $sqlFetchDailyExpenseNew = (mysqli_query($conn, "SELECT * FROM `dailyexpense` ORDER BY `id` DESC LIMIT 1"));
    // $sqlFetchDailyExpenseNew = (mysqli_query($conn, "SELECT * FROM `dailyexpense` WHERE `processedBy`='".$_SESSION['userFirstName']." ".$_SESSION['userLastName']."' ORDER BY `id` DESC LIMIT 1"));
    $sqlFetchPurchased = (mysqli_query($conn, "SELECT * FROM `purchasetb`"));
    $sqlFetchProduct = (mysqli_query($conn, "SELECT * FROM `producttb`"));

     //// Number Of data from database tables
     $count_fde = mysqli_num_rows($sqlFetchDailyExpense);
     $count_fp = mysqli_num_rows($sqlFetchPurchased);
     $count_pro = mysqli_num_rows($sqlFetchProduct);
     $found = mysqli_num_rows($sqlFetchDailyExpenseNew);
 
     if ($found > 0) {
         
         $show = mysqli_fetch_assoc($sqlFetchDailyExpenseNew);
 
     }
 
     //// Checking if Data is found from Product database table
     if ($count_pro > 0) {
         
         while ($fetchPro = mysqli_fetch_assoc($sqlFetchProduct)) {
 
             $dailyExpenseArray[] = $fetchPro;
             $mainProductCost[] = escaepD($conn, $fetchPro['productCost']);
             $mainProductQuantity[] = escaepD($conn, $fetchPro['productQuantity']);
 
         }
 
     } else {
         
         $mk['ermySuc'] = false;
         $mk['ermyNote'] = "No Data Recieved Yet...!";
 
     }
 
     //// Checking if Data is found from Daily Expense database table
     if ($count_fde > 0) {
         
         while ($fetch = mysqli_fetch_assoc($sqlFetchDailyExpense)) {
 
             $dailyExpenseArray[] = $fetch;
             $totalProPrice[] = escaepD($conn, $fetch['proPrice']);
             $totalProCost[] = escaepD($conn, $fetch['proCost']);
             $totalQtySold[] = escaepD($conn, $fetch['qtySold']);
 
         }
 
     } else {
         
         $mk['ermySuc'] = false;
         $mk['ermyNote'] = "No Data Recieved Yet...!";
 
     }
 
     //// Equatiing initial variables with sum of values from database
     $newMainProQuantity = array_sum($mainProductQuantity);
     $newMainProCost = array_sum($mainProductCost);
     $newTotalProPrice = array_sum($totalProPrice);
     $newTotalProCost = array_sum($totalProCost);
     $newTotalQtySold = array_sum($totalQtySold);
 
     //// Formating Values in a readable form
     $finalTp = number_format($newTotalProPrice, 2);
     $finalTc = number_format($newTotalProCost, 2);
     $finalQ = floatval($newMainProQuantity);
     $finalSold = floatval($newTotalQtySold);
 
     //// Inital Variables for percentage total
     $overAllSalesPercentage = 0;
     $overAllQtyPercentage = 0;
     $rowMainProCost = 0;
     $rowMainProCost = ($newMainProCost * $newMainProQuantity);
     $formatedOverallProCost = number_format($newMainProCost * $newMainProQuantity, 2);
 
     // function for calculating sales percentage
     $overAllSalesPercentage = number_format(($newTotalProCost / $rowMainProCost) * 100, 2);

     //// function for calculating quantity percentage
     $overAllQtyPercentage = number_format(($finalSold / $newMainProQuantity) * 100, 2); 
 
 
     //// Holding all results in a Data Array for JSON
     $data['record'] = $show;
     $data['totals']['totalProPrice'] = $finalTp;
     $data['totals']['totalProCost'] = $finalTc;
     $data['totals']['totalQtySold'] = $finalSold;
     $data['totals']['newMainProQuantity'] = $finalQ;
     $data['totals']['mainProductCost'] = $formatedOverallProCost;
     $data['totals']['proSalesPerc'] = $overAllSalesPercentage;
     $data['totals']['overAllQtyPerc'] = $overAllQtyPercentage;


    //// JSON function
    echo json_encode($data);