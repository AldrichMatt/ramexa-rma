<?php
$title = "Backoffice Settings";
include("../layout.php");
?>
<div class="flex min-h-screen flex-col items-center justify-between  md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <div class='px-8 xl:px-16 lg:px-16 md:px-16 sm:px-8 xs:px-8'>
        <?php
        $component->back("/ramexa-rma/ramexa-rma/backoffice.php")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        </div>
      </div>
      </div>

<?php
include("../footer.php")
?>