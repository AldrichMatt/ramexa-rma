<?php
$title = "Warranty Master";
include("../layout.php");

$warrantyData = $model->getAll('warranty');
?>
     <div id="content" class="flex min-h-screen flex-col items-center justify-between md:px-4 sm:px-2">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm ">
      <div id="modal_edit" class="hidden">
        <div class="flex justify-center items-center left-0 top-0 w-full h-full fixed z-20 bg-slate-500/70">
          <div class="flex w-3/4 fixed justify-center text-center">
            <div class="bg-slate-200 w-3/4 rounded-lg">
              <div class="text-lg rounded-ss-lg rounded-se-lg text-white font-bold py-4 mb-6 bg-[#d93337]">
                      Edit Warranty
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
          <p class="text-2xl font-semibold"><?=$title;?></p>
            
            <div class="mt-2 drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]">
              <?php
                $component->input('Id', '...', 'number', 'warranty_id');  
              ?>
            </div>
            <?php
                        $component->label("Warranty Name")
                ?>
                <div class="flex xl:justify-center lg:justify-center mb-2 w-full xl:flex-wrap lg:flex-wrap">
                                <input type="text"
                                class="flex w-5/6 min-h-[auto] border-0 justify-center rounded-l-md px-4 py-2 pl-5 drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]"
                        id="warranty_name"
                        placeholder="..."/>
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
            <div id="table">
                  <table class="table-auto mt-4 bg-white rounded-ss-lg w-full h-full rounded-se-lg drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                          <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>Id</th>
                                <th>Warranty Name</th>
                                <th>Action</th>
                        </tr>
                </thead>
                <tbody id="tbody" class="text-center rounded">
                        <?php
                                        $i = 1;
                                foreach($warrantyData as $warranty):
                        ?>
                                <tr class="h-10 odd:bg-slate-300" id="warranty<?=$warranty[0];?>">
                                        <td class="id"><?=$i++;?></td>
                                        <td id="warranty_id"><?=$warranty[0];?></td>
                                        <td id="warranty_name"><?=$warranty[1];?></td>
                                        <td>
                                        <button
                                        class="w-1/3 md:w-1/4 lg:w-1/5 xl:w-1/6 sm:w-1/3 h-8 justify-center inline-block rounded bg-[#d93337] focus:outline-[#d93337]"
                                        onclick="deleteWarranty('<?=$warranty[0];?>')">
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
                                        onclick="showModal('modal_edit', {id : '<?=$warranty[0]?>',warranty_name: '<?=$warranty[1]?>')">
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
<?php include("../footer.php")?>