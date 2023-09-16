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
                <div class="mt-2">
                        <?php
                                $component->input('Period (days)', 'xxx', 'number', 'period_update');  
                        ?>
                </div>
                <div class="mt-2 flex flex-col">
                        <?php
                                $component->label('Description');  
                                ?>
                        <textarea name="description_update" id="description" 
                        class="w-full mb-2 rounded-md px-5 py-2 focus:outline-[#d93337]"
                        cols="30" rows="4"></textarea>
                </div>
                <div class="mt-2">
                        <?php
                                $component->input('Warranty Name', '....', 'text', 'warranty_name_update');  
                        ?>
                </div>
           
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
            <!-- FORM START -->
                <div class="mt-2 drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]">
                        <?php
                                $component->input('Period (days)', 'xxx', 'number', 'period');  
                        ?>
                </div>
                <div class="mt-2 flex flex-col drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]">
                        <?php
                                $component->label('Description');  
                        ?>
                        <textarea name="description" id="description" 
                        class="w-full mb-2 rounded-md px-5 py-2 focus:outline-[#d93337]"
                        cols="30" rows="4"></textarea>
                </div>
            <?php
                        $component->label("Warranty Name")
                ?>
                <div class="flex xl:justify-center lg:justify-center mb-2 w-full xl:flex-wrap lg:flex-wrap">
                                <input type="text"
                                class="flex w-5/6 min-h-[auto] border-0 justify-center rounded-l-md px-4 py-2 pl-5 drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]  focus:outline-[#d93337]"
                                name="warranty_name"
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
                  <table class="table-auto mt-4 mb-8 bg-white rounded-ss-lg w-full h-full rounded-se-lg drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                          <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>Id</th>
                                <th>Warranty Name</th>
                                <th>Period</th>
                                <th>Description</th>
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
                                        <td id="warranty_period"><?=$warranty[2];?> day(s)</td>
                                        <td id="description"><?=$warranty[3];?></td>
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
                                        onclick="showModal('modal_edit', {id : '<?=$warranty[0]?>',warranty_name: '<?=$warranty[1]?>', period : '<?=$warranty[2]?>', description : '<?=$warranty[3]?>'})">
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
            <script>
                function showModal(modal_name, data){
                        $('#'+modal_name).removeClass('hidden');
                        $("input[name='period_update']").val(data.period);
                        $("input[name='id_update']").val(data.id);
                        $("input[name='warranty_name_update']").val(data.warranty_name);
                        $("textarea[name='description_update']").val(data.description);
                }
                
                function updateItem(){
                        var period = $("input[name='period_update']").val();
                        var id = $("input[name='id_update']").val();
                        var warranty_name = $("input[name='warranty_name_update']").val();
                        var description = $("textarea[name='description_update']").val();
                        $.ajax({
                                method : 'post',
                                url : '/ramexa-rma/ramexa-rma/controller/Warranty.php',
                                dataType : 'json',
                                data : {
                                        action : 'update',
                                        id : id,
                                        period : period,
                                        warranty_name : warranty_name,
                                        description : description
                                },
                                complete :function(){
                                $('#modal_edit').addClass('hidden');
                                $('input').val('');
                                $('textarea').val('');
                                $('#table').load(location.href + ' #table','100');
                                }
                        })
                }

                $('#form_submit').on('click', function(e){
                        e.preventDefault();
                        var period = $('input[name="period"]').val();
                        var warranty_name = $('input[name="warranty_name"]').val();
                        var description = $('#description').val();
                        $.ajax({
                                method : 'post',
                                url : '/ramexa-rma/ramexa-rma/controller/Warranty.php',
                                dataType : 'json',
                                data : {
                                        action : 'add',
                                        period : period,
                                        warranty_name : warranty_name,
                                        description : description
                                },
                                complete :function(){
                                $('input').val('');
                                $('textarea').val('');
                                $('#table').load(location.href + ' #table','100');
                                }
                        })
                });

                function deleteWarranty(id){
                        $.ajax({
                                method : 'post',
                                url : '/ramexa-rma/ramexa-rma/controller/Warranty.php',
                                dataType : 'json',
                                data : {
                                        action : 'delete',
                                        id : id,
                                },
                                complete :function(){
                                $('#table').load(location.href + ' #table','100');
                                }
                        })
                }
                </script>
<?php include("../footer.php")?>