<?php
$title = "Add Item";
include("../layout.php");

$brandData = $model->getAll("brand");

?>
<script>
  function inputsn(){
    var sn = $('#sn').val();
    console.log(sn);
    $('#sn').val('');
  }
</script>
    <div class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <?php
        $component->back("/ramexa-rma/ramexa-rma/item")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        <div class="my-4">
            <?php
              $component->label("Item Brand");
            ?>
            <div class="my-2">
              <select name="" id="" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
                <option value="">-</option>
                <?php
                  foreach($brandData as $brand):
                    ?>
                    <option value="<?=$brand[0]?>"><?=$brand[1]?></option>

                <?php endforeach;?>
              </select>
              </div>
            <?php
              $component->label("Item");
            ?>
            <div class="my-2">
              <select name="" id="" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
                <option value="">-</option>
                <?php
                  foreach($brandData as $brand):
                    ?>
                    <option value="<?=$brand[0]?>"><?=$brand[1]?></option>

                <?php endforeach;?>
              </select>
              </div>
              <?php
                $component->label("S/N")
              ?>
            <div class="my-2">
              <input type="text" name="sn" autofocus onchange="inputsn()" id="sn" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
            </div>
        
<?php include("../footer.php")?>