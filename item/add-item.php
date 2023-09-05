<?php
$title = "Add Item";
include("../layout.php");

$brandData = $model->getAll("brand");
$itemData = $model->getAll("item");
$categoryData = $model->getAll("item_category");

function getCorresponding($categoryId){
  global $model;
  $category = $model->getAllWhere('item_category','`id` = '.$categoryId.'');
  return $category;
}

?>
<script>


  function getItembyBrand(){
    const item = document.getElementById('item_category');
    item.innerHTML = '';
    var brand = $('#brand').val();
    $.ajax({
      method : 'POST',
      url : '/ramexa-rma/ramexa-rma/controller/Item.php',
      dataType : 'json',
      data : {
        action : 'getitem',
        brand : brand,
      },
      complete :function(data){
        data.responseJSON.forEach(element => {
          item.innerHTML += `<option value="${element[0]}">${element[1]}</option>`;
        });
      }
    });
}

  function inputsn(){
    var sn = $('#sn').val();
    var brand = $('#brand').val();
    var item_category = $('#item_category').val();
    $('#sn').val('');
    place = document.getElementById('item_place');
    if(brand == ''){
      alert('Please select a Brand first');
      exit;
    }
    if(item_category == ''){
      alert('Please select an Item first');
      exit;
    }
    if(place.innerText.search(sn) == '-1'){
      $.ajax({
        method:'POST',
        url : '/ramexa-rma/ramexa-rma/controller/Item.php',
        dataType : 'json',
        data : {
          action : 'add',
          sn : sn,
          item_category : item_category,
        },
        complete : function(data){  470347
          $('#item_place').load(location + ' #item_place');
        }
      })
    }else{
      alert('S/N Already Added!')
    }};
</script>
    <div id="content" class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <?php
        $component->back("/ramexa-rma/ramexa-rma/item")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        <div class="columns-2 gap-8">
            <?php
              $component->label("Brand");
            ?>
            <div class="my-2">
              <select name="brand" onchange="getItembyBrand()" id="brand" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
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
              <select name="item_category" id="item_category" class="flex break-after-column w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
                <option value="">-</option>
              </select>
              </div>
              <?php
                $component->label("S/N")
              ?>
            <div class="my-2">
              <input type="" name="sn" autofocus onchange="inputsn()" id="sn" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
            </div>
            </div>
            <div class="my-8" id="item_place">
            <div id="table">
                  <table class="table-auto mt-2 bg-white rounded-ss-lg w-full h-full rounded-se-lg drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                          <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>S/N</th>
                                <th>Item Category</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Warranty</th>
                                <th>Action</th>
                        </tr>
                </thead>
                <tbody id="tbody" class="text-center rounded">
                        <?php
                                        $i = 1;
                                foreach($itemData as $item):
                                  $category =getCorresponding($item[2])[0];
                        ?>
                                <tr class="h-10 odd:bg-slate-300" id="item<?=$item[0];?>">
                                        <td class="id"><?=$i++;?></td>
                                        <td id="item_sn"><?=$item[1];?></td>
                                        <td id="item_category"><?=$category[1];?></td>
                                        <td id="item_brand"><?=$model->getWhere('brand','brand_name','`id` = '.$category[2].'')[0];?></td>
                                        <td id="item_status"><?=$category[4];?></td>
                                        <td id="item_warranty"><?=$category[5];?></td>
                                        <td>
                                        <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#d93337] focus:outline-[#d93337]"
                                        onclick="deleteBrand('<?=$brand[0];?>','<?=$brand[1];?>')">
                                                <img
                                                class="px-auto mx-auto"
                                                src = "/ramexa-rma/ramexa-rma/assets/trash.png"
                                                width="20px"
                                                height="20px"
                                                alt="delete"
                                                ></img>
                                        </button>
                                        <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#ffb60d] focus:outline-[#d93337]"
                                        onclick="showModal('modal_edit', {id : '<?=$brand[0]?>', brand_name : '<?=$brand[1]?>'})">
                                                <img
                                                class="px-auto mx-auto"
                                                src = "/ramexa-rma/ramexa-rma/assets/pencil.png"
                                                width="20px"
                                                height="20px"
                                                alt="edit"
                                                ></img>
                                        </button>
                                </td>
                                </tr>
                        <?php
                                endforeach;
                        ?>
                </tbody>
        </table>
        </div>
            </div>
        
<?php include("../footer.php")?>