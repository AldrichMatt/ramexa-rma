<?php
$title = "Brand Master";
$table = "brand";
include("../layout.php");


$brandData = $model->getAll($table);
?>
    <div class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
        <div id="modal_edit" class="hidden">
                <div class="flex justify-center items-center left-0 top-0 w-full h-full fixed z-20 bg-slate-500/70">
                        <div class="flex w-3/4 fixed justify-center text-center">
                                <div class="bg-slate-200 w-3/4 rounded-lg">
                                        <div class="text-lg rounded-ss-lg rounded-se-lg text-white font-bold py-4 mb-6 bg-[#d93337]">Edit Brand</div>

                                        <div class="px-4 my-8 text-start">
                                                <?=$component->input("Brand Name", "Hikvis...", "text", 'brand_name_update');?>
                                                <button onclick="updateBrand()"></button>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <?php
                $component->back("/ramexa-rma/ramexa-rma/item")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
        <!-- <div class="flex flex-row -m-2 mt-4 justify-center flex-wrap md:px-2 sm:px-24"> -->
        <div class="my-4">
                <?php
                        $component->label("Brand Name")
                ?>
                <div class="flex xl:justify-center lg:justify-center my-2 w-full xl:flex-wrap lg:flex-wrap">
                                <input type="text"
                                class="flex w-5/6 min-h-[auto] border-0 justify-center rounded-l-md px-4 py-2 pl-5 drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]"
                        id="brand"
                        placeholder="Hikvis...."/>
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
          
<table class="table-auto mt-2 bg-white rounded-ss-lg rounded-se-lg drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Action</th>
                        </tr>
                </thead>
                <tbody id="tbody" class="text-center rounded">
                        <?php
                                        $i = 1;
                                foreach($brandData as $brand):
                        ?>
                                <tr class="h-10 odd:bg-slate-300" id="brand<?=$brand[0];?>">
                                        <td class="brand_id"><?=$i++;?></td>
                                        <td id="brand_name"><?=$brand[1];?></td>
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
                                        onclick="showModal('modal_edit', '{`id` => <?=$brand[0]?>, `brand_name` => <?=$brand[1]?>}')">
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
<script>
        function sanitizeString(str){
    str = str.replace(/[^a-z0-9áéíóúñü \.,_-]/gim,"");
    return str.trim();
}
        $('#form_submit').on("click",function(e){
                e.preventDefault();
                var brand_name = $('#brand').val();
                if(sanitizeString(brand_name) == ''){
                        alert("Please insert Brand name");
                        exit;
                }
                var brand_id = $('tbody tr:last td:first').text();
                $.ajax({
                        method : "POST",
                        url : "/ramexa-rma/ramexa-rma/controller/Brand.php",
                        dataType : "json",
                        data : { 
                                action : "add",
                                brand : brand_name
                        },
                        complete: function(data){
                                var tbody = document.getElementById("tbody");
                                var brand = data.responseJSON.brand;
                                var id = (parseInt(brand_id) + 1 == null) ? parseInt(brand_id) + 1 : 1 ;
                                print = `
                                <tr class="h-10 odd:bg-slate-300" id="brand${id}">
                                        <td class="brand_id">${id}</td>
                                        <td id="brand_name">${brand}</td>
                                        <td>                                <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#d93337] focus:outline-[#d93337]"
                                        onclick="deleteBrand('${id}','${brand}')">
                                                <img
                                                class="px-auto mx-auto"
                                                src = "/ramexa-rma/ramexa-rma/assets/trash.png"
                                                width="25px"
                                                height="25px"
                                                alt="delete"
                                                ></img>
                                        </button>
                                        <button
                                        class=" w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#ffb60d] focus:outline-[#d93337]"
                                        onclick="showModal('modal_edit', '')">
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
        
        function deleteBrand(id, brand_name) {

                $.ajax({
                        method : "POST",
                        url : "/ramexa-rma/ramexa-rma/controller/Brand.php",
                        dataType : "json",
                        data : { 
                                action : "delete",
                                brand : brand_name
                        },
                        complete: function(data){
                                $('#brand'+id).remove();
                                
                        }

                })
        };
        function showModal(modal_name, data){
                $('#'+modal_name).removeClass('hidden');
                console.log(data);
        }
        function updateBrand(id, brand_name) {

                $.ajax({
                        method : "POST",
                        url : "/ramexa-rma/ramexa-rma/controller/Brand.php",
                        dataType : "json",
                        data : { 
                                action : "edit",
                                brand : brand_name
                        },
                        complete: function(data){
                                
                        }

                })
        };
</script>
<?php include("../end.php")?>