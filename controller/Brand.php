<?php

require "../autoload.php";

    $model = new Model();

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $brand = htmlspecialchars($_POST['brand']);
            $brand_id = htmlspecialchars($_POST['brand_id']);
            $model->insertTableColVal("brand", "id, brand_name", "'".$brand_id."', '".$brand."'");
            $data = ['brand' => $brand, 'brand_id' => $brand_id];
            echo json_encode($data);
            break;
        
        case 'delete':        
            $brand = htmlspecialchars($_POST['brand']);
            $model->deleteTableColVal("brand", "brand_name", "'".$brand."'");
            break;
            
            case 'update';
            $id = htmlspecialchars($_POST['brand_id']);
            $old_id = htmlspecialchars($_POST['old_brand_id']);
            $brand = htmlspecialchars($_POST['brand_name']);
            $model-> updateTableSetWhere("brand", "`id` = '".$id."',`brand_name` = '".$brand."'", "`id` = '".$old_id."'");
            break;

        default:
            # code...
            break;
    }
    
?>