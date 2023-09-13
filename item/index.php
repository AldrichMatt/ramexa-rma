<?php
$title = "Item Master";
include("../layout.php");
?>
    <div class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <?php
        $component->back("/ramexa-rma/ramexa-rma/backoffice.php")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        <div class="flex flex-row -m-2 mt-4 justify-center flex-wrap md:px-2 sm:px-24">
            <?php
            $component->card('add-item.php', 'item-new.png', 'add-item', "Add or Import Item(s)");
            $component->card('brand.php', 'brand.png', 'brands', "Brand Master");
            $component->card('item-category.php', 'category.png', 'item category', "Category Master");
            $component->card('warranty.php', 'form-gear.png', 'warranty-master', "Warranty Master");
            ?>
        </div>
<div class="m-4 p-4 drop-shadow-md">
<?php include("../footer.php")?>