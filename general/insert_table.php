<?php
try {
  if (isset($_POST['tbl']))     {$table = $_POST['tbl']; }
  if (isset($_POST['columns']))  {$columns = $_POST['columns'];}
  if (isset($_POST['values']))  {$values = $_POST['values'];}

  // Credentials
  include "../includes/db_credentials.php";

  $dsn = "pgsql:host=".$host.";dbname=".$db_name.";port=".$port;
  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,//If occur some error fom the DB, it is displayed
    // PDO::ATTR_ERRMODE            => PDO::ERRMODE_SILENT, //If occur some error fom the DB, it's not displayed
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false //true, to send multiple queries in one line and false to send only ONE per call
  ];
  $pdo = new PDO($dsn, $username, $password, $opt);
  $strQry="INSERT INTO {$table} ({$columns}) VALUES ({$values})";

  $result = $pdo->query($strQry);
} catch(PDOException $e) {
    echo "ERROR: INSERT_TABLE! ".$e->getMessage();
}

?>
