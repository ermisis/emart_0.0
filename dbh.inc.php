<?php

    date_default_timezone_set('Africa/Accra');

    define("DB_HOST","localhost");
    define("DB_USERNAME","root");
    define("DB_PWD","");
    define("DB_DATABASE","emart_db");

   $conn =  mysqli_connect(DB_HOST, DB_USERNAME, DB_PWD, DB_DATABASE);


    function escaepD($conn, $el){
        return mysqli_real_escape_string($conn, trim(strip_tags($el)));
    }