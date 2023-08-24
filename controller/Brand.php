<?php

require "../autoload.php";

    $model = new Model();

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
            $model->insertTableColVal("brand", "id, brand_name", "null, '".$brand."'");
            $data = ['brand' => $brand];
            echo json_encode($data);
            break;
        
        case 'delete':        
            $brand = filter_var($_POST['brand'], FILTER_SANITIZE_STRING);
            $model->deleteTableColVal("brand", "brand_name", "'".$brand."'");
            break;

        default:
            # code...
            break;
    }
    
?>