<?php
require "autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramexa - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Main navigation container -->
    <?php 
    $component->navbar();
    ?>
    <div class="container mx-auto px-24 mt-6">
        <?php
        $component->back("hello");
        ?>
        <div class="container mx-auto ">
        Hello
    </div>
    </div>
</body> 
</html>