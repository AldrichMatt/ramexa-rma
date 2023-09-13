<?php

require_once('../model/Model.php');

$model = new Model();

/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

/* Choose where to save the uploaded file */
$location = "D:/Aldrich/coding/ramexa-rma/ramexa-rma/public/". $filename;
echo $filename;
/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) {
  $data_all = array_map(function($v){return str_getcsv($v, ";");}, file($location));
  $row = $data_all[0];
  $data = array_slice($data_all,1);
  $assoc_data = [];
  foreach ($data as $data) {
    array_push($assoc_data, [strtolower($row[0]) =>  $data[0], strtolower($row[1]) => $data[1], strtolower($row[2]) => $data[2]]);
  }
  foreach ($assoc_data as $data) { 
    $brand_validator = $model->getAllWhere("brand", "`brand_name` LIKE '%".strtolower($data['merk'])."%'");
    $item_validator = $model->getAllWhere("item_category", "`item_name` LIKE '%".strtolower($data['type'])."%'");
    $sn_validator = $model->getAllWhere("item", "`item_sn` = '".$data['sn']."'");
    
    if(count($brand_validator) == 0){
      $model->insertTableColVal('brand','`brand_name`', "'".$data["merk"]."'");
    }
    $brand_id = $model->getWhere("brand", '`id`', '`brand_name` = "'.$data['merk'].'"')[0];
    if(count($item_validator) == 0){
      $model->insertTableColVal('item_category','`item_name`,`brand_id`,`warranty_id`', "'".$data['type']."','".$brand_id."', '0'");
    }
    $category_id = $model->getWhere("item_category", '`id`', '`item_name` = "'.$data['type'].'"')[0];
    if(count($sn_validator) == 0){
      $model->insertTableColVal('item','`item_sn`,`item_category_id`', "'".$data['sn']."','".$category_id."'");
    }
  }
  
} else { 
}

?>