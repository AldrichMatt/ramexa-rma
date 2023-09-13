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

  function updateItem(){
    $('#modal_edit').addClass('hidden');
    var id = $('input[name="id_update"]').val();
    var item_category_id = $('select[name="item_name_update"]').val();
    var sn = $('input[name="sn_update"]').val();
    place = document.getElementById('item_place');
    $.ajax({
      method : 'POST',
      url : '/ramexa-rma/ramexa-rma/controller/Item.php',
      dataType : 'json',
      data : {
        action : 'update',
        id : id,
        item_category_id :item_category_id,
        sn : sn,
      },
      complete : function(data){
        if(data.responseJSON.status == "failed"){
          alert("S/N already exists!");
        }else{
          alert("Item updated successfully");
          $('#item_place').load(location + ' #item_place');
        };
      }
    })
                
  }

  function getItembyBrand(id, target){
    const item = document.getElementById(target);
    item.innerHTML = '<option value="">-</option>';
    var brand = $('#'+id).val();
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

function deleteItem(itemId){
  $.ajax({
    method :  'POST',
    url : '/ramexa-rma/ramexa-rma/controller/Item.php',
    dataType : 'json',
    data : {
      action : 'delete',
      id :itemId,
    },
    complete : function(data){
      $('#item_place').load(location + ' #item_place');
    }
  })
}
function showModal(modal_name, data){
                $('#modal_edit').removeClass('hidden');
                $('input[name="id_update"]').val(data.id);
                $('select[name="brand_name_update"] option:first').val(data.brand_id);
                $('select[name="brand_name_update"] option:first').text(data.brand_name);
                getItembyBrand('brand_update','item_update')
                $('select[name="item_name_update"] option:first').val(data.category_id);
                $('select[name="item_name_update"] option:first').text(data.category_name);
                $('input[name="sn_update"]').val(data.sn);
                // id_update,brand_name_update,item_name_update, sn_update
                // id, sn,category_id,category_name,brand_id,brand_name
                // item_warranty
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
        complete : function(data){ 
          $('#item_place').load(location + ' #item_place');
        }
      })
    }else{
      alert('S/N Already Added!')
    }};

    async function uploadFile() {
  let formData = new FormData(); 
  formData.append("file", fileupload.files[0]);
  console.log(fileupload.files[0]);
  await fetch('/ramexa-rma/ramexa-rma/item/upload.php', {
    method: "POST", 
    body: formData
  }); 
  alert('The file has been uploaded successfully.');
  $('#fileupload').val(''); 
  location.reload();
  }
    
</script>
    <div id="content" class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
      <div id="modal_edit" class="hidden">
        <div class="flex justify-center items-center left-0 top-0 w-full h-full fixed z-20 bg-slate-500/70">
          <div class="flex w-3/4 fixed justify-center text-center">
            <div class="bg-slate-200 w-3/4 rounded-lg">
              <div class="text-lg rounded-ss-lg rounded-se-lg text-white font-bold py-4 mb-6 bg-[#d93337]">
                      Edit Item
              </div>
              <div class="px-4 my-8 text-start">
                <input type="hidden" name="id_update">
                <?=$component->label('Brand');?>
                <div class="my-2">
                        
                  <select name="brand_name_update" onchange="getItembyBrand('brand_update','item_update')" id="brand_update" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5  focus:outline-[#d93337]">
                    <option value="">-</option>
                    <?php
                    foreach($brandData as $brand):
                            ?>
                    <option value="<?=$brand[0]?>"><?=$brand[1]?></option>
                    
                    <?php endforeach;?>
                  </select>
                </div>
                <?=$component->label('Item');?>
                <div class="my-2">
                  
                  <select name="item_name_update" id="item_update" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5  focus:outline-[#d93337]">
                    <option value="">-</option>
                  </select>
                </div>
                <?=$component->input('S/N', 'xxx...', 'text', 'sn_update')?>
                <button class="bg-[#d93337] h-10 px-4 my-2 rounded text-white" onclick="updateItem()">Update</button>
                <button class="bg-slate-500 h-10 px-4 my-2 rounded text-white" onclick="$('#modal_edit').addClass('hidden')">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php
        $component->back("/ramexa-rma/ramexa-rma/item")
        ?>
        <div class="columns-2">
          <p class="text-2xl font-semibold"><?=$title;?></p>
        <p class="text-end">
          <input type="file" name="fileupload" accept=".csv" id="fileupload" onchange="uploadFile()" class="hidden">
          <button onclick="document.getElementById('fileupload').click()" id="btn_file" class="bg-[#d93337] h-10 px-4 py-2 rounded text-white">+ Import</label>
        </p>
        </div>
            <?php
              $component->label("Brand");
            ?>
            <div class="my-2">
              <select name="brand" onchange="getItembyBrand('brand','item_category')" id="brand" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
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
            <p class="text-neutral-400">Press ENTER to input manually</p>
            <div class="mt-2" id="item_place">
            <div id="table">
                  <table class="table-auto mt-2 bg-white rounded-ss-lg w-full h-full rounded-se-lg drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                          <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>S/N</th>
                                <th>Item Category</th>
                                <th>Brand</th>
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
                                        <td id="item_warranty"><?php 
                                        if($category[3] == 0){
                                                echo '-';
                                        } else{       
                                        echo $model->getAllWhere("warranty","`id` = '".$category[3]."'")[0][1];
                                        }
                                        ?></td>
                                        <td>
                                        <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#d93337] focus:outline-[#d93337]"
                                        onclick="deleteItem('<?=$item[0];?>')">
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
                                        onclick="showModal('modal_edit', {id : '<?=$item[0]?>', sn : '<?=$item[1]?>', category_id : '<?=$item[2]?>',category_name : '<?=$category[1]?>', warranty_id : '<?=$category[3]?>', brand_id : '<?=$model->getWhere('brand','*','`id` = '.$category[2].'')[0];?>', brand_name : '<?=$model->getWhere('brand','*','`id` = '.$category[2].'')[1];?>'})">
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