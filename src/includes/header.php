<?php

    session_start();

    date_default_timezone_set('Africa/Accra');
    
    include $_SERVER['DOCUMENT_ROOT'].'/emart/dbh.inc.php';

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/emart/src/assets/images/ewuraysMartIcon.png">
    <!-- Custom fonts for this template-->
    <link href="/emart/src/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/emart/src/assets/fonts.googleapis/css/family.nunto.css" rel="stylesheet" type="text/css">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->
    <title>eMart</title>
    <!-- Custom CSS -->
    <link href="/emart/src/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/emart/src/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/emart/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/emart/src/dist/css/style.min.css" rel="stylesheet">
    <link href="/emart/style.css" rel="stylesheet">

    <!-- DataTable CSS -->
    <link href="/emart/src/assets/datatables/jquery.dataTables.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- <script type="text/javascript" src="/emart/src/assets/jQuery-Scanner-Detection-master/jquery.scannerdetection.js"></script>
    <script type="text/javascript">
        $(document).scannerDetection({
            timeBeforeScanTest: 200, // wait for the next character for upto 200ms
            startChar: [120], // Prefix character for the cabled scanner (OPL6845R)
            endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
            avgTimeByChar: 40, // it's not a barcode if a character takes longer than 40ms
            onComplete: function (barcode, qty) {
                console.log(scannerDetection);
            } // main callback function	
        });
    </script> -->

    <!-- <script type="text/javascript" src="/emart/src/assets/onscan.js-master/onscan.min.js"></script> -->





</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="index.php">
                            <b class="logo-icon">
                                <!-- Logo icon -->
                                <img src="/emart/src/assets/images/ewuraysMart.png" alt="homepage" class="dark-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <!-- <img src="/emart/src/assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                                <!-- Light Logo text -->
                                <!-- <img src="/emart/src/assets/images/logo-light-text.png" class="light-logo"
                                    alt="homepage" /> -->
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->