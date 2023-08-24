<?php
$title = "Backoffice";
include("layout.php");
?>
<div class="flex min-h-screen flex-col items-center justify-between  md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <div class='px-8 xl:px-16 lg:px-16 md:px-16 sm:px-8 xs:px-8'>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        </div>
        <div class="flex flex-row -m-2 mt-4 justify-center flex-wrap xl:px-8 lg:px-8 md:px-2 sm:px-24">
            <?php
            $component->card('rma/', 'form.png', 'RMA', "RMA Master");
            $component->card('item/', 'item.png', 'item', "Item Master");
            $component->card('settings/', 'gear.png', 'settings', "Settings");
            ?>
        </div>
        </div>
      </div>
<?php
include("footer.php")
?>