<?php
include("layout.php");
?>
            <div class="flex min-h-screen flex-col items-center text-center justify-between  md:px-4 sm:px-2">
                <div class="z-10 w-full max-w-5xl flex flex-col justify-center pt-24 text-sm">
                    <div class='flex justify-center'>Search your serviced item(s) by S/N</div>
                    <?php
                    $component->inputGroup('flex justify-center my-4 px-4 flex flex-wrap', 'text', 'L152XXXX-XXXX', 'search.png', 'search');
                    ?>
                    <div class='flex justify-center'>Or</div>
                    <div class='flex justify-center'>Scan your service QR from your receipt</div>
                    <div class='flex justify-center'>
                        <button
                        class="z-[2] inline-block rounded bg-[#d93337] px-4 m-5 pb-2 pt-2.5 focus:outline-[#d93337] focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        type="button">
                            <img
                            src = "assets/camera.png"
                            width="25px"
                            height="25px"
                            alt='Camera'
                            ></img>
                        </button>
                    </div>
        <div class='flex justify-center'>Read our <a class='underline px-1' href='#'>Terms & Policies</a> for warranty item(s)</div>
                </div>
            </div>
<?php include("footer.php")?>