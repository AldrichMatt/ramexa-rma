<?php

require "../autoload.php";

    $model = new Model();

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $brand = htmlspecialchars($_POST['brand']);
            $brand_name = $model->getAllWhere("brand","`id` = '".$brand."'")[0][1];
            $category = htmlspecialchars($_POST['category']);
            $stock = htmlspecialchars($_POST['stock']);
            $model->insertTableColVal("item_category", "id, item_name, brand_id, stock", "null, '".$category."', '".$brand."', '".$stock."'");
            $data = ['brand_name' => $brand_name , 'brand_id' => $brand, 'category' => $category, 'stock' => $stock];
            echo json_encode($data);
            break;
            
        case 'delete':        
            $category = htmlspecialchars($_POST['category']);
            $model->deleteTableColVal("item_category", "item_name", "'".$category."'");
            break;
            
        case 'update':
            $id = htmlspecialchars($_POST['id']);
            $brand_name = htmlspecialchars($_POST['brand_name']);
            $brand_id = htmlspecialchars($_POST['brand_id']);
            $category = htmlspecialchars($_POST['category']);
            $stock = htmlspecialchars($_POST['stock']);
            $model->updateTableSetWhere("item_category", '`item_name` = "'.$category.'",`brand_id` = "'.$brand_id.'", `stock` = "'.$stock.'"', "`id` = ".$id."");
            break;

        default:
            # code...
            break;
    }
    
?>