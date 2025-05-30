<?php


    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

    if (isset($_POST['amountPaid']) && !empty($_POST['amountPaid'])) {
        
        $billNo = escaepD($conn, $_POST['billNo']);
        $custName = escaepD($conn, $_POST['custName']);
        $custNum = escaepD($conn, $_POST['custNum']);
        $processedBy = escaepD($conn, $_POST['processedBy']);
        $billDate = escaepD($conn, $_POST['billDate']);
        $amountPaid = escaepD($conn, $_POST['amountPaid']);
        $balance = escaepD($conn, $_POST['balance']);
        $totalItemPrice = escaepD($conn, $_POST['totalItemPrice']);
        $totalItemQuantity = escaepD($conn, $_POST['totalItemQuantity']);
        $discount = escaepD($conn, $_POST['discount']);
        $vat = escaepD($conn, $_POST['vat']);

        if(mysqli_query($conn, sprintf("INSERT INTO `purchasetb`(`billNo`, `customerName`, `customerNo`, `processedBy`, `billDate`, `amountPaid`, `balance`, `totalItemPrice`, `totalItemQuantity`, `discount`, `vat`) VALUES ('%s','%s','%d','%s','%s','%d','%d','%d','%d','%d','%d')", $billNo, $custName, $custNum, $processedBy, $billDate, $amountPaid, $balance, $totalItemPrice, $totalItemQuantity, $discount, $vat))) {

            for ($i=0; $i < count($_POST['data']); $i++) {

                if ($_POST['data'][$i]['productBcode'] !== "") {
                    
                    mysqli_query($conn, sprintf("INSERT INTO `dailyexpense`(`proCode`, `proName`, `proDesc`, `proCate`, `proPrice`, `proCost`, `qtySold`, `qtyLeft`, `billNo`, `processedBy`, `inputDate`) VALUES ('%s','%s','%s','%s','%d','%d','%d','%d','%s','%s','%s')", $_POST['data'][$i]['productBcode'], $_POST['data'][$i]['productName'], $_POST['data'][$i]['productDescription'], $_POST['data'][$i]['productCategory'], $_POST['data'][$i]['totalPrice'], $_POST['data'][$i]['productCost'], $_POST['data'][$i]['bougthQty'], $_POST['data'][$i]['productQuantity'], $billNo, $processedBy, $billDate));
                
                    mysqli_query($conn, "UPDATE `producttb` SET `productQuantity`='".$_POST['data'][$i]['productQuantity']."' WHERE `productBcode`='".$_POST['data'][$i]['productBcode']."'");

                }

            }

            $mk['ermySuc'] = true;
            $mk['ermyNote'] = "Transaction Completed Successfully!";

        } else {
            
            $mk['ermySuc'] = false;
            $mk['ermyNote'] = "Error: Transaction Incomplete, Please Try Check Well...!";

        }

    } else {
        
        $mk['ermySuc'] = "data";
        $mk['ermyNote'] = "Error: No Entry...!";

    }

    echo json_encode($mk);