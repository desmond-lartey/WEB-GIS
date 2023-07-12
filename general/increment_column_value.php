<?php
//Initialize the table
//INSERT INTO general_info (cnt_access_app, cnt_access_draw, cnt_access_viewer) VALUES (0,0,0)

try {

  if (isset($_POST['tbl']))     {$table = $_POST['tbl']; } else { $table = "general_info";}
  if (isset($_POST['column']))  {$column = $_POST['column'];}
  if (isset($_POST['where']))   {$where = " WHERE ".$_POST['where'];} else { $where = "";}

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
  $strQry="UPDATE {$table} SET {$column} = {$column} + 1 {$where}";


  $result = $pdo->query($strQry);

  $result = $pdo->query("SELECT {$column} FROM {$table}");
  $returnJson= "";
  $row=$result->fetch();
  if ($row) {
    $returnJson .= json_encode($row);
  }
  echo $returnJson;
} catch(PDOException $e) {
  echo "ERROR: INCREMENT_COLUMN! ".$e->getMessage();
}

?>
