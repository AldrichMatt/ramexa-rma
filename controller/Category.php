<?php

require "../autoload.php";

    $model = new Model();

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $brand = htmlspecialchars($_POST['brand']);
            $brand_name = $model->getAllWhere("brand","`id` = '".$brand."'")[0][1];
            $category = htmlspecialchars($_POST['category']);
            $waranty = htmlspecialchars($_POST['warranty']);
            $waranty_name = $model->getWhere('warranty', 'warranty_name', '`id` = '.$waranty.'')[0];
            $model->insertTableColVal("item_category", "id, item_name, brand_id, warranty_id", "null, '".$category."', '".$brand."', '".$waranty."'");
            $data = ['brand_name' => $brand_name , 'brand_id' => $brand, 'category' => $category, 'warranty' => $waranty, 'waranty_name' => $waranty_name];
            echo json_encode($data);
            break;
            
        case 'delete':        
            $category = htmlspecialchars($_POST['category']);
            $model->deleteTableColVal("item_category", "item_name", "'".$category."'");
            break;
            
        case 'update':
            $id = htmlspecialchars($_POST['id']);
            $brand_id = htmlspecialchars($_POST['brand_id']);
            $waranty = htmlspecialchars($_POST['waranty']);
            $category = htmlspecialchars($_POST['category']);
            $model->updateTableSetWhere("item_category", '`item_name` = "'.$category.'",`brand_id` = "'.$brand_id.'", `warranty_id` = "'.$waranty.'"', "`id` = ".$id."");
            break;

        default:
            # code...
            break;
    }
    
?>