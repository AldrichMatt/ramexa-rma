<?php
$title = "Category Master";
$table = "item_category";
include("../layout.php");


$brandData = $model->getAll("brand");
$categoryData = $model->getAll($table);
$warrantyData = $model->getAll("warranty");
?>
<!-- MODAL -->
    <div class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <div id="modal_edit" class="hidden">
                <div class="flex justify-center items-center left-0 top-0 w-full h-full fixed z-20 bg-slate-500/70">
                        <div class="flex w-3/4 fixed justify-center text-center">
                                <div class="bg-slate-200 w-3/4 rounded-lg">
                                        <div class="text-lg rounded-ss-lg rounded-se-lg text-white font-bold py-4 mb-6 bg-[#d93337]">
                                                Edit Category
                                        </div>
                                        
                                        <div class="px-4 my-8 text-start">
                                                <input type="hidden" name="id_update">
                                                <?=$component->input("Category Name", "Hikvis...", "text", 'category_name_update');?>
                                                <?= $component->label("Brand Name");?>
                                                <div class="my-2">
                                                        
                                                        <select name="brand_name_update" id="brand" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5  focus:outline-[#d93337]">
                                                        <option value="">-</option>
                                                        <?php
                                                        foreach($brandData as $brand):
                                                                ?>
                                                        <option value="<?=$brand[0]?>"><?=$brand[1]?></option>
                                                        
                                                        <?php endforeach;?>
                                                </select>
                                        </div>
                                        <?= $component->label("Waranty");?>
                                        <div class="my-2">
                                                        <select name="waranty_name_update" id="waranty" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5  focus:outline-[#d93337]">
                                                                <option value="">-</option>
                                                                <option value="">-</option>
                                                                <?php
                                                        foreach($warrantyData as $brand):
                                                                ?>
                                                        <option value="<?=$brand[0]?>"><?=$brand[1]?></option>
                                                        
                                                        <?php endforeach;?>
                                                </select>
                                        </div>
                                                <button class="bg-[#d93337] h-10 px-4 my-2 rounded text-white" onclick="updateCategory()">Update</button>
                                                <button class="bg-slate-500 h-10 px-4 my-2 rounded text-white" onclick="$('#modal_edit').addClass('hidden')">Close</button>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <!-- CONTENT -->
        <?php
                $component->back("/ramexa-rma/ramexa-rma/item")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        <!-- BRAND -->
        <div class="my-4">
        <?php
              $component->label("Item Brand");
            ?>
            <div class="my-2">
              <select name="" id="brand" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
                <option value="">-</option>
                <?php
                  foreach($brandData as $brand):
                    ?>
                    <option value="<?=$brand[0]?>"><?=$brand[1]?></option>

                <?php endforeach;?>
              </select>
            </div>
              <!-- WARRANTY -->
              

                      <?php
                $component->label("Warranty")
                ?>
            <div class="my-2">
              <select name="warranty" id="warranty" class="flex w-full min-h-[auto] border-0 justify-center rounded-md px-4 py-2 pl-5 drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]" >
                <option value="">-</option>
                <?php
                        foreach($warrantyData as $warranty):
                ?>
                <option value="<?=$warranty[0]?>"><?=$warranty[1]?></option>
                <?php endforeach;?>
              </select>
        </div>
                                
        <!-- CATEGORY NAME -->
                    <?php
                            $component->label("Item Category Name")
                    ?>
                    <div class="flex xl:justify-center lg:justify-center my-2 w-full xl:flex-wrap lg:flex-wrap drop-shadow-[0_10px_10px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]">
                                    <input type="text"
                                    class="flex w-5/6 min-h-[auto] border-0 justify-center rounded-l-md px-4 py-2 pl-5 drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]"
                            id="category"
                            placeholder="DS-2CE16D0T-EXLPF (2.8mm)">
                    <button
                            class="z-[2] w-1/6  justify-center inline-block rounded-r bg-[#d93337] focus:outline-[#d93337]"
                            id="form_submit">
                            <img
                                    class="px-auto mx-auto"
                                    src = "/ramexa-rma/ramexa-rma/assets/plus-white.png"
                                    width="25px"
                                    height="25px"
                                    alt="plus"
                                    ></img>
                            </button>
                    </div>
          </div>
        <div id="table">
                <table class="table-auto w-full h-full mt-2 bg-white rounded-ss-lg rounded-se-lg drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                        <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Warranty</th>
                                <th>Action</th>
                        </tr>
                </thead>
                <tbody id="tbody" class="text-center rounded">
                        <?php
                                        $i = 1;
                                foreach($categoryData as $category):
                        ?>
                                <tr class="h-10 odd:bg-slate-300" id="category<?=$category[0];?>">
                                        <td class="category_id"><?=$i++;?></td>
                                        <td id="category_name"><?=$category[1];?></td>
                                        <td id="brand_name"><?=$model->getAllWhere("brand","`id` = '".$category[2]."'")[0][1];?></td>
                                        <td id="warranty"><?php 
                                        if($category[3] == 0){
                                                echo '-';
                                        } else{
                                                
                                        echo $model->getAllWhere("warranty","`id` = '".$category[3]."'")[0][1];
                                        }
                                        ?></td>
                                        <td>
                                        <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#d93337] focus:outline-[#d93337]"
                                        onclick="deleteCategory('<?=$category[0];?>','<?=$category[1];?>')">
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
                                        onclick="showModal('modal_edit', {id : '<?=$category[0]?>',waranty : '<?=$category[4]?>', waranty_name : '<?= $category[3] == 0 ? '-' : $model->getAllWhere('warranty', '`id` = '.$category[3].'')[0][1];?>',category_name : '<?=$category[1]?>',brand_id : '<?=$category[2];?>' ,brand_name : '<?=$model->getAllWhere('brand','`id` = '.$category[2].'')[0][1];?>'})">
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
        
</div>


<?php include("../footer.php")?>
<script>
        function sanitizeString(str){
    str = str.replace(/[^a-z0-9áéíóúñü \.,_-]/gim,"");
    return str.trim();
}
        $('#form_submit').on("click",function(e){
                e.preventDefault();
                var brand_name = $('select[name=""]').val();
                var category_name = $('#category').val();
                var warranty = $('#warranty').val();
                if(sanitizeString(brand_name) == ''){
                        alert("Please Select a Brand");
                        exit;
                }else{
                        if(sanitizeString(category_name) == ''){
                                alert("Please insert Category name");
                                exit;
                        }
                }
                var category_id = $('tbody tr:last td:first').text()? $('tbody tr:last td:first').text() : 0;
                $.ajax({
                        method : "POST",
                        url : "/ramexa-rma/ramexa-rma/controller/Category.php",
                        dataType : "json",
                        data : { 
                                action : "add",
                                brand : brand_name,
                                category : category_name,
                                warranty : warranty
                        },
                        complete: function(data){
                                var tbody = document.getElementById("tbody");
                                var brand_name = data.responseJSON.brand_name;
                                var brand_id = data.responseJSON.brand_id;
                                var category = data.responseJSON.category;
                                var waranty = data.responseJSON.waranty;
                                var waranty_name = data.responseJSON.waranty_name;
                                var id = (parseInt(category_id) == null) ? 1 :parseInt(category_id) + 1 ;
                                print = `
                                <tr class="h-10 odd:bg-slate-300" id="category${id}">
                                        <td class="category_id">${id}</td>
                                        <td id="category_name">${category}</td>
                                        <td id="brand_name">${brand_name}</td>
                                        <td id="warranty">${waranty_name}</td>
                                        <td>
                                        <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#d93337] focus:outline-[#d93337]"
                                        onclick="deleteCategory('${id}','${category}')">
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
                                        onclick="showModal('modal_edit', {id : '${id}', category_name : '${category}', waranty: '${waranty}', waranty_name: '${waranty_name}',brand_name : '${brand_name}', brand_id: '${brand_id}'})">
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
                                        `;
                                tbody.innerHTML += print;
                        }

                })
        });
        
        function deleteCategory(id, category_name) {

                $.ajax({
                        method : "POST",
                        url : "/ramexa-rma/ramexa-rma/controller/Category.php",
                        dataType : "json",
                        data : { 
                                action : "delete",
                                category : category_name
                        },
                        complete: function(data){
                                $('#category'+id).remove();
                        }

                })
        };
        function showModal(modal_name, data){
                $('#modal_edit').removeClass('hidden');

                $('input[name="id_update"]').val(data.id);
                $("input[name='category_name_update']").val(data.category_name);
                $("select[name='brand_name_update'] option:first").text(data.brand_name);
                $("select[name='brand_name_update'] option:first").val(data.brand_id);
                $("select[name='waranty_name_update'] option:first").text(data.waranty_name);
                $("select[name='waranty_name_update'] option:first").val(data.waranty);
                // console.log(data);
        }
        function updateCategory() {
                var id = $('input[name="id_update"]').val();
                var category_name = $("input[name='category_name_update']").val();
                var brand_name = $("select[name='brand_name_update']").text();
                var brand_id = $("select[name='brand_name_update']").val();
                var waranty_name = $("select[name='waranty_name_update']").text();
                var waranty = $("select[name='waranty_name_update']").val();
                console.log(waranty);
                if(sanitizeString(brand_name) == ''){
                        alert("Please Select a Brand");
                        exit;
                }else{
                        if(sanitizeString(category_name) == ''){
                                alert("Please insert Category name");
                                exit;
                        }
                }
                $.ajax({
                        method : "POST",
                        url : "/ramexa-rma/ramexa-rma/controller/Category.php",
                        dataType : "json",
                        data : { 
                                action : "update",
                                id : id,
                                category : category_name,
                                brand_id : brand_id,
                                waranty : waranty,
                        },
                        complete: function(data){
                                $('#modal_edit').addClass('hidden');
                                // $('#modal_edit').load(location.href + ' #modal_edit','100');
                                $('#table').load(location.href + ' #table','100');
                        }
                })
        };
</script>
<?php include("../end.php")?>