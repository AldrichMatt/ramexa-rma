<?php

require "../autoload.php";

    $model = new Model();

    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $model->insertTableColVal('warranty', '`warranty_name`, `warranty_period_day`, `description`', '"'.$_POST['warranty_name'].'", '.$_POST['period'].', "'.$_POST['description'].'"');
            break;
        
        case 'delete':
            $model->deleteTableColVal('warranty', '`id`', '"'.$_POST['id'].'"');
            break;

        case 'update':
            $model->updateTableSetWhere('warranty', '`warranty_name` = "'.$_POST['warranty_name'].'", `warranty_period_day` = '.$_POST['period'].', `description` = "'.$_POST['description'].'"', '`id` = '.$_POST['id'].'');
            break;
        default:
            # code...
            break;
    }