<?php

try{
  // Credentials
  include "../includes/db_credentials.php";
  $dsn = "pgsql:host=".$host.";dbname=".$db_name.";port=".$port;
  $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => true //true, for send multiple queries in one line and false in order to it not be possible
  ];
  $pdo = new PDO($dsn, $username, $password, $opt);

  $result = $pdo->query("SELECT count(*) FROM eimg_raw_polys;");
  $returnJson= "";
  $row=$result->fetch();
  if ($row) {
    $returnJson .= json_encode($row);
  }
  echo $returnJson;

  $result = $pdo->query
  ("
    DROP TABLE IF EXISTS eimg_raw_polys_multi;

    --break each polygon in multiparts based on their intersections
    CREATE TABLE eimg_raw_polys_multi AS
      SELECT
      	row_number() OVER () AS id,
      	CASE WHEN a.eval_nr = 1 THEN 1 ELSE 0 END cat_liked,
      	CASE WHEN a.eval_nr = 2 THEN 1 ELSE 0 END cat_disliked,
      	unnest(ST_SplitAgg(a.geom_27493, b.geom_27493)) geom,
      	ST_Area(unnest(ST_SplitAgg(a.geom_27493, b.geom_27493))) area,
      	a.att_nat attNat, a.att_open attOpen,
      	a.att_order attOrder, a.att_upkeep attUpkeep, a.att_hist attHist
      FROM eimg_raw_polys a,
         eimg_raw_polys b
      WHERE ST_Equals(a.geom_27493, b.geom_27493) OR
      	ST_Contains(a.geom_27493, b.geom_27493) OR
      	ST_Contains(b.geom_27493, a.geom_27493) OR
      	ST_Overlaps(a.geom_27493, b.geom_27493) AND
      	(ST_isValid(a.geom_27493) AND ST_isValid(b.geom_27493))
      GROUP BY a.id, a.eval_nr , ST_AsEWKB(a.geom_27493), attNat, attOpen, attOrder, attUpkeep, attHist;

    DROP TABLE IF EXISTS eimg_raw_polys_single;

    --create single features
    CREATE TABLE eimg_raw_polys_single AS
      SELECT
      		row_number() OVER () AS id,
      		ST_SnapToGrid((ST_Dump(eimg_raw_polys_multi.geom)).geom , 0.00001) geom,
      		ST_Area(ST_Transform( (ST_Dump(eimg_raw_polys_multi.geom)).geom, 27493 )) area,
      		id id_parent, cat_liked, cat_disliked, attNat, attOpen, attOrder, attUpkeep, attHist
      FROM eimg_raw_polys_multi
      WHERE eimg_raw_polys_multi.area > 10;

    DROP TABLE IF EXISTS eimg_result;

    --create the final result
    CREATE TABLE eimg_result AS
      SELECT
      	row_number() OVER () AS id,
      	ST_SnapToGrid( ST_Transform( ST_Union(geom) ,4326), 0.000001) geom,
      	ST_AsText(ST_SnapToGrid( ST_Transform(ST_Centroid(geom),27493), 1)) centroid,
      	CASE WHEN sum(cat_liked) = 0 THEN 'disliked'
      		WHEN sum(cat_disliked) = 0 THEN 'liked'
      		ELSE 'like/disliked'
      	END category,
      	CASE WHEN sum(cat_liked) = 0 THEN 2
      		WHEN sum(cat_disliked) = 0 THEN 1
      		ELSE 3
      	END category_nr,
      	sum(cat_liked) ct_liked, sum(cat_disliked) ct_disliked,
      	sum(attNat) ct_nat, sum(attOpen) ct_ope, sum(attOrder) ct_ord,
      	sum(attUpkeep) ct_upk , sum(attHist) ct_his
      FROM eimg_raw_polys_single
      GROUP BY ST_SnapToGrid( ST_Transform(ST_Centroid(geom),27493), 1);
    ");

  $result = $pdo->query("SELECT count(*) FROM eimg_result;");
  $returnJson= "";
  $row=$result->fetch();
  if ($row) {
    $returnJson .= json_encode($row);
  }
  //get the associative array and encode into a valid json format.
  echo $returnJson;

  //ONLY NEED IN ORDER TO ECHO THE RESULTS
  // $result = $pdo->query(
  //   "SELECT *, ST_AsGeoJSON(geom, 5) AS geojson FROM eimg_result;
  // ");
  // // Process to create a valid geoJSON pulling the data form the DB
  //
  // $features=[];
  // foreach($result AS $row) {
  //     //Takes out the column geom of the returned row. It won't be needed to create the json format
  //     unset($row['geom']);
  //     //Get the 'geojson' column that is added to the row in the SQL query (it comes in a JSON format)
  //     //It comes already encoded. So it needs to be decoded to encode everything together in the end.
  //     $geometry=$row['geojson']=json_decode($row['geojson']);
  //     //unset the 'geojson' column to be added in a valid way below.
  //     unset($row['geojson']);
  //     //Now the $row variable only contain the properties of the feature gotten from the DB.
  //     $feature=["type"=>"Feature", "geometry"=>$geometry, "properties"=>$row];
  //     array_push($features, $feature);
  // }
  // //Creating the final step of a geoJSON
  // $featureCollection=["type"=>"FeatureCollection", "features"=>$features];
  // //get the associative array and encode into a valid json format.
  // echo json_encode($featureCollection);

} catch(PDOException $e) {
  echo "ERROR: ".$e->getMessage();
}

?>
