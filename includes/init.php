<?php
    //To know more about outbuffer: https://stackoverflow.com/questions/4401949/whats-the-use-of-ob-start-in-php
    ob_start();
    // Creates a session
    session_start();
    //  *************** For PostgreSQL
    include "db_credentials.php";
    $dsn = "pgsql:host=".$host.";dbname=".$db_name.";port=".$port;
    $opt = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,//If occur some error fom the DB, it is displayed
      // PDO::ATTR_ERRMODE            => PDO::ERRMODE_SILENT, //If occur some error fom the DB, it's not displayed
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false //true, for send multiple queries in one line and false in order to it not be possible
    ];
    $pdo = new PDO($dsn, $username, $password, $opt);

    //Include the PHP functions
    include "php_functions.php";
?>
