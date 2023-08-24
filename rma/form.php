<?php
$title = "New RMA Form";
include("../layout.php");
?>
<div class="flex min-h-screen flex-col items-center justify-between md:px-4">
      <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-16 text-sm">
        <?php
        $component->back("/ramexa-rma/ramexa-rma/rma")
        ?>
        <p class="text-2xl font-semibold"><?=$title;?></p>
<div class="mt-2">
        
        <?php
        $component->input("Customer's Name", "John Doe", "text", "customer_name" );
        $component->input("Phone Number", "08xxxxxxxxxx", "number", "customer_phone" );
        $component->input("Sales Name", "John Doe", "text", "sales_name", "disabled");
        $component->label("Input item(s) by S/N");
        ?>
        <div class="mb-6">
                <div class="flex xl:justify-center lg:justify-center my-2 w-full xl:flex-wrap lg:flex-wrap">
                        <input type="text"
            class="flex w-5/6 min-h-[auto] border-0 justify-center rounded-l-md px-4 py-2 pl-5 focus:outline-[#d93337] drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)]"
            name ="key"
            placeholder="L152XXXX-XXXX"/>
          <button
            class="z-[2] w-1/6 justify-center inline-block rounded-r bg-[#d93337] focus:outline-[#d93337]"
            type="submit">
             <img
             class="px-auto mx-auto"
             src = "/ramexa-rma/ramexa-rma/assets/plus-white.png"
          width="25px"
          height="25px"
          alt="plus"
          ></img>
        </div>
          
          </button>
          </div>
</div>
        <table class="table-auto bg-white rounded-ss-md rounded-se-md drop-shadow-[0_35px_35px_rgba(0,0,0,0.45)] ">
                <thead class="py-2 my-2 h-10">
                        <tr class="my-2 py-2">
                                <th>#</th>
                                <th>Image</th>
                                <th>S/N</th>
                                <th>Item Name</th>
                        </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
        
        </div>
      </div>
<?php
include("../footer.php");
?>