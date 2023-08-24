<?php
require "autoload.php";
if(!isset($title)){
    $title = "Ramexa - Home";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramexa - <?=$title;?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body class="bg-slate-200">
    <!-- Main navigation container -->
    <?php 
    $component->navbar();
    ?>
    <div class="container mx-auto px-16 mt-6">
        <div class="container mx-auto">