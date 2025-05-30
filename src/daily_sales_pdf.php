<?php 

    require('fpdf/fpdf.php');

    date_default_timezone_set('Africa/Accra');

    $dt = date("Y-m-d H:i:s");

    $randomNo = rand(100, 999);

    $request = json_decode(base64_decode($_GET['dailyrecords']));

    $totalAmountPaid = 0;
    $totalBalance = 0;
    $overAllAmount = 0;
    $overAllQty = 0;

    $searchDate = $request[0][1];
    $searchUserName = $request[1][1];

    include $_SERVER['DOCUMENT_ROOT']."/emart/dbh.inc.php";

    $fetchDailyRecord = (mysqli_query($conn, "SELECT * FROM `purchasetb` WHERE `processedBy`='".$searchUserName."' AND `billDate`='".$searchDate."'"));

    /*A4 width : 219mm*/
    $pdf = new FPDF('L','mm','A4');

    $pdf->AddPage();
    /*output the result*/

    /*set font to arial, bold, 14pt*/
    $pdf->SetFont('Arial','B',20);

    /*Cell(width , height , text , border , end line , [align] )*/

    $pdf->Cell(100 ,5,'E - MART',0,0);
    $pdf->Ln(10);

    $pdf->Cell(100 ,5,'Daily Sales Report',0,1);
    $pdf->Ln(10);


    $pdf->SetFont('Arial','',10);

    $pdf->Cell(25 ,5,'User ID:',0,0);
    $pdf->Cell(34 ,5,$searchUserName,0,1);

    $pdf->Cell(25 ,5,'Report Date:',0,0);
    $pdf->Cell(34 ,5,$dt,0,1);
    
    $pdf->Cell(25 ,5,'Report No:',0,0);
    $pdf->Cell(34 ,5,$randomNo,0,1);
    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',10);
    /*Heading Of the table*/
    $pdf->Cell(25 ,5,'BILL NO.',1,0,'C');
    $pdf->Cell(30 ,5,'BILL DATE',1,0,'C');
    $pdf->Cell(45 ,5,'AMOUNT PAID',1,0,'C');
    $pdf->Cell(45 ,5,'BALANCE',1,0,'C');
    $pdf->Cell(45 ,5,'TOTAL AMOUNT',1,0,'C');
    $pdf->Cell(25 ,5,'TOTAL QTY',1,1,'C');
    // $pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
    /*Heading Of the table end*/
    $pdf->SetFont('Arial','',10);
    while ($fetchArray = (mysqli_fetch_assoc($fetchDailyRecord))) {

        $totalAmountPaid += $fetchArray['amountPaid'];
        $totalBalance += $fetchArray['balance'];
        $overAllAmount += $fetchArray['totalItemPrice'];
        $overAllQty += $fetchArray['totalItemQuantity'];
                        
        $pdf->Cell(25 ,5,$fetchArray['billNo'],1,0);
        $pdf->Cell(30 ,5,$fetchArray['billDate'],1,0);
        $pdf->Cell(45 ,5,$fetchArray['amountPaid'],1,0);
        $pdf->Cell(45 ,5,$fetchArray['balance'],1,0);
        $pdf->Cell(45 ,5,$fetchArray['totalItemPrice'],1,0);
        $pdf->Cell(25 ,5,$fetchArray['totalItemQuantity'],1,1);

    }

    $tap = number_format($totalAmountPaid, 2);
    $tb = number_format($totalBalance, 2);
    $oaa = number_format($overAllAmount, 2);
    $oaq = number_format($overAllQty, 2);
            

    $pdf->Cell(25 ,5,'',0,0);
    $pdf->Cell(30 ,5,'SUBTOTALS',0,0);
    $pdf->Cell(45 ,5,$tap,1,0);
    $pdf->Cell(45 ,5,$tb,1,0);
    $pdf->Cell(45 ,5,$oaa,1,0);
    $pdf->Cell(25 ,5,$oaq,1,1);


    // $pdf->Cell(0,10,'Page'.$pdf->PageNo().'/{nb}',0,0,'C');


    $pdf->Output();