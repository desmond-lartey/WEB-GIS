<?php

function redirect($loc) {
  //Pass the name of the page in order to be redirected
    header("Location: {$loc}");
}

function generate_token() {
    return md5(microtime().mt_rand());
}

function set_msg($msg, $level='danger') {
    if (($level!='primary') && ($level!='success') && ($level!='info') && ($level!='warning')) {
        $level='danger';
    }
    if (empty($msg)) {
        unset($_SESSION['message']);
    } else {
        $_SESSION['message']="<h4 class='bg-{$level} text-center'>{$msg}</h4>";
    }
}

function show_msg(){
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//   ******************  DATABASE FUNCTIONS  ********************************
function clean_array($array){
  foreach ($array as $key => $val) {
    $array[$key]=htmlentities($val);
  }
  return $array;
}



    function count_field_val($pdo, $tbl, $fld, $val) {
         try {
              $sql="SELECT {$fld} FROM {$tbl} WHERE {$fld}=:value";
              $stmnt=$pdo->prepare($sql);
              $stmnt->execute([':value'=>$val]);
              return $stmnt->rowCount();
         } catch(PDOException $e) {
              return $e->getMessage();
         }
    }

    function return_field_data($pdo, $tbl, $fld, $val) {
         try {
              $sql="SELECT * FROM {$tbl} WHERE {$fld}=:value";//Avoiding SQL injection
              $stmnt=$pdo->prepare($sql);
              $stmnt->execute([':value'=>$val]);
              return $stmnt->fetch();
         } catch(PDOException $e) {
              return $e->getMessage();
         }
    }

    function get_validationcode($user, $pdo) {
         try {
              $stmnt=$pdo->prepare("SELECT validationcode FROM users WHERE username=:username");
              $stmnt->execute([':username'=>$user]);
              $row = $stmnt->fetch();
              return $row['validationcode'];
         } catch(PDOException $e) {
              return $e->getMessage();
         }
    }
