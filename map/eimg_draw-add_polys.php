<?php
  if (isset($_POST['tbl'])) {
    $table = $_POST['tbl'];

    try{
      if (isset($_POST['geojson'])) {
        $geojson = $_POST['geojson'];
      }
      if (isset($_POST['eval_nr'])) {
        $eval_nr = $_POST['eval_nr'];
      }
      if (isset($_POST['eval_str'])) {
        $eval_str = $_POST['eval_str'];
      }
      if (isset($_POST['att_nat'])) {
        $att_nat = $_POST['att_nat'];
      }
      if (isset($_POST['att_open'])) {
        $att_open = $_POST['att_open'];
      }
      if (isset($_POST['att_ord'])) {
        $att_ord = $_POST['att_ord'];
      }
      if (isset($_POST['att_up'])) {
        $att_up = $_POST['att_up'];
      }
      if (isset($_POST['att_hist'])) {
        $att_hist = $_POST['att_hist'];
      }

      if (isset($_POST['order_draw'])) {
        $order_draw = $_POST['order_draw'];
      }
      if (isset($_POST['time'])) {
        $time_draw = $_POST['time'];
      }
      if (isset($_POST['comment'])) {
        $comment = $_POST['comment'];
      }

      if (isset($_POST['cnt_ctrlz'])) {
        $cnt_ctrlz = $_POST['cnt_ctrlz'];
      }
      if (isset($_POST['cnt_enter'])) {
        $cnt_enter = $_POST['cnt_enter'];
      }
      if (isset($_POST['cnt_vertices'])) {
        $cnt_vertices = $_POST['cnt_vertices'];
      }

      if (isset($_POST['current_basemap'])) {
        $current_basemap = $_POST['current_basemap'];
      }

      if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
      }

      // Credentials
      include "../includes/db_credentials.php";
      $dsn = "pgsql:host=".$host.";dbname=".$db_name.";port=".$port;
      $pdo = new PDO($dsn, $username, $password);

      //Counts the total number of features before adding
      $result = $pdo->query("SELECT count(*) FROM eimg_raw_polys;");
      $cntNumberFeat= "";
      $row=$result->fetch();
      if ($row) {
        $cntNumberFeat .= json_encode($row);
      }
      echo $cntNumberFeat;

      $str = "INSERT INTO $table
              ( geom_4326,
                eval_nr, eval_str,
                att_nat, att_open, att_order, att_upkeep, att_hist,
                time_draw, order_draw, comment,

                cnt_ctrlz, cnt_enter, cnt_vertex,
                user_id, current_basemap,

                centroid,
                area_sqm,
                geom_27493
              )
              VALUES
              ( ST_SetSRID(ST_GeomFromGeoJSON(:gjsn),4326),
                :e_nr, :e_str,
                :nat, :open, :ord, :up, :hist,
                :time_draw, :order_draw, :comment,

                :cnt_ctrlz, :cnt_enter, :cnt_vertices,
                :user_id, :current_basemap,

                ST_Centroid( ST_SetSRID(ST_GeomFromGeoJSON(:gjsn),4326) ),
                ST_Area(ST_SnapToGrid( ST_Transform( ST_SetSRID(ST_GeomFromGeoJSON(:gjsn),4326) ,27493), 0.00001)),
                ST_SnapToGrid( ST_Transform( ST_SetSRID(ST_GeomFromGeoJSON(:gjsn),4326) ,27493), 0.00001)
              )";
      $params = ["gjsn"=>$geojson, "e_nr"=>$eval_nr, "e_str"=>$eval_str, "nat"=>$att_nat, "open"=>$att_open,
      "ord"=>$att_ord, "up"=>$att_up, "hist"=>$att_hist,
      "time_draw"=>$time_draw, "order_draw"=>$order_draw, "comment"=>$comment,
      "cnt_ctrlz"=>$cnt_ctrlz, "cnt_enter"=>$cnt_enter, "cnt_vertices"=>$cnt_vertices,
      "user_id"=>$user_id, "current_basemap"=>$current_basemap ];


      $sql = $pdo->prepare($str);
      if ($sql->execute($params)) {
        echo "place succesfully added SERVER";

        $result = $pdo->query("SELECT count(*) FROM eimg_raw_polys;");
        $cntNumberFeat= "";
        $row=$result->fetch();
        if ($row) {
          $cntNumberFeat .= json_encode($row);
        }
        echo $cntNumberFeat;

      } else {
        echo var_dump($sql->errorInfo());
      };
    } catch(PDOException $e) {
      echo "ERROR: ".$e->getMessage();
    }
  }else {
    echo "ERROR: No table parameter included with request";
  }
?>
