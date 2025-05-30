<?php 

    require('fpdf/fpdf.php');

    date_default_timezone_set('Africa/Accra');

    $dt = date("Y-m-d H:i:s");

    $randomNo = rand(100, 999);

    $totalPrice = 0;
    $totalCost = 0;
    $totalQtySold = 0;
    $totalQtyLeft = 0;

    include $_SERVER['DOCUMENT_ROOT']."/emart/dbh.inc.php";

    $fetchExpenses = (mysqli_query($conn, "SELECT * FROM `dailyexpense`"));

    /*A4 width : 219mm*/
    $pdf = new FPDF('L','mm','A4');

    $pdf->AddPage();
    /*output the result*/

    /*set font to arial, bold, 14pt*/
    $pdf->SetFont('Arial','B',20);

    /*Cell(width , height , text , border , end line , [align] )*/

    $pdf->Cell(100 ,5,'E - MART',0,0);
    $pdf->Ln(10);

    $pdf->Cell(100 ,5,'Total Expenditure Report',0,1);
    $pdf->Ln(10);


    $pdf->SetFont('Arial','',10);

    $pdf->Cell(25 ,5,'Report Date:',0,0);
    $pdf->Cell(34 ,5,$dt,0,1);
    
    $pdf->Cell(25 ,5,'Report No:',0,0);
    $pdf->Cell(34 ,5,$randomNo,0,1);
    $pdf->Ln(15);

    $pdf->SetFont('Arial','B',10);
    /*Heading Of the table*/
    $pdf->Cell(30 ,5,'PROCODE',1,0,'C');
    $pdf->Cell(45 ,5,'PRONAME',1,0,'C');
    $pdf->Cell(45 ,5,'PROCATEGORY',1,0,'C');
    $pdf->Cell(25 ,5,'PROPRICE',1,0,'C');
    $pdf->Cell(25 ,5,'TOTALPRICE',1,0,'C');
    $pdf->Cell(25 ,5,'TOTALQTY',1,0,'C');
    $pdf->Cell(25 ,5,'PROLEFT',1,0,'C');
    $pdf->Cell(30 ,5,'PROCESSED BY',1,0,'C');
    $pdf->Cell(25 ,5,'INPUT DATE',1,1,'C');
    // $pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
    /*Heading Of the table end*/
    $pdf->SetFont('Arial','',10);
    while ($e = (mysqli_fetch_assoc($fetchExpenses))) {

        $totalPrice += $e['proPrice'];
        $totalCost += $e['proCost'];
        $totalQtySold += $e['qtySold'];
        $totalQtyLeft += $e['qtyLeft'];

        $pdf->Cell(30 ,5,$e['proCode'],1,0);
        $pdf->Cell(45 ,5,$e['proName'],1,0);
        $pdf->Cell(45 ,5,$e['proCate'],1,0);
        $pdf->Cell(25 ,5,$e['proPrice'],1,0);
        $pdf->Cell(25 ,5,$e['proCost'],1,0);
        $pdf->Cell(25 ,5,$e['qtySold'],1,0);
        $pdf->Cell(25 ,5,$e['qtyLeft'],1,0);
        $pdf->Cell(30 ,5,$e['processedBy'],1,0);
        $pdf->Cell(25 ,5,$e['inputDate'],1,1);

    }

    $tp = number_format($totalPrice, 2);
    $tc = number_format($totalCost, 2);
    $tqs = number_format($totalQtySold, 2);
    $tql = number_format($totalQtyLeft, 2);

    $pdf->Cell(30 ,5,'',0,0);
    $pdf->Cell(45 ,5,'',0,0);
    $pdf->Cell(45 ,5,'SUBTOTALS',0,0);
    $pdf->Cell(25 ,5,$tp,1,0);
    $pdf->Cell(25 ,5,$tc,1,0);
    $pdf->Cell(25 ,5,$tqs,1,0);
    $pdf->Cell(25 ,5,$tql,1,1);
    $pdf->Cell(30 ,5,'',0,0);
    $pdf->Cell(25 ,5,'',0,0);


    $pdf->SetAutoPageBreak(true,15);
    $pdf->Cell(0,10,'Page'.$pdf->PageNo().'/ {pages}',0,0,'C');


    $pdf->Output();