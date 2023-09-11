<?php

require "../autoload.php";

    $model = new Model();

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $sn = $_POST['sn'];
            $item_category = $_POST['item_category'];
            $model->insertTableColVal('item', '`item_sn`, `item_category_id`', '"'.$sn.'", "'.$item_category.'"');
            break;
        
        case 'delete':
            $sn = $_POST['id'];
            $model->deleteTableColVal('item', 'id', '"'.$sn.'"');   
            break;
            
        case 'update':
            $id = $_POST['id'];
            $sn = $_POST['sn'];
            $item_category = $_POST['item_category_id'];
            try {
                $model->updateTableSetWhere('item', '`item_sn` = "'.$sn.'", `item_category_id` = "'.$item_category.'"', '`id` = "'.$id.'"');
                echo json_encode(["status"=>"succeed"]);
            } catch (\Throwable $th) {
                echo json_encode(["status"=>"failed"]);
            }
                break;
            
        case 'getitem':
            $brand = $_POST['brand'];
            $item_data = $model->getAllWhere('item_category','`brand_id` = '.$brand.'');
            echo json_encode($item_data);
            break;
        default:
            # code...
            break;
    }