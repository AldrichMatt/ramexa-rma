<?php
$title = "Item";
include("../layout.php");
?>
    <div class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <?php
        $component->back("/ramexa-rma/ramexa-rma/item")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        
<div class="m-4 p-4 drop-shadow-md">
<?php include("../footer.php")?>