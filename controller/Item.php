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
        
        case 'getitem':
            $brand = $_POST['brand'];
            $item_data = $model->getAllWhere('item_category','`brand_id` = '.$brand.'');
            echo json_encode($item_data);
            break;
        default:
            # code...
            break;
    }