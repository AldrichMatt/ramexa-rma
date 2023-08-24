<?php
$title = "Ramexa - User Login";
include("login-layout.php");
?>
    <div class="flex min-h-screen flex-col text-white pt-12 items-center justify-between px-24 sm:px-0 md:px-4">
      <div class="z-10 w-full bg-[#d93337] rounded rounded-2 text-center drop-shadow-[0_35px_35px_rgba(0,0,0,0.25)] max-w-5xl flex flex-col pt-16 text-sm">
        <!-- <p class="text-2xl font-semibold text-center">Login</p> -->
        <div class="flex flex-col my-4 justify-center">
            <img
            class="object-scale-down"
                src = '/ramexa-rma/ramexa-rma/assets/RMX.png'
                alt='RAMEXA Logo'
                style='width:auto; height:3em'
                ></img>
                <p class="text-xl font-bold">PT. RAMEXA GODITUS INDONESIA</p>
                <p class="text-sm italic">EXCELLENT IN INTEGRITY</p>
        </div>
        <form action="" method="post">
        <div class="flex flex-row text-white -m-2 mt-4 flex-wrap xl:px-8 lg:px-8 md:px-8 text-black sm:px-24">
            
                <?php
                $component->input("Username", "JohnDoe123", "text", "username" );
                $component->input("Password", "************", "password", "password");
                ?>
                <div class="flex w-full justify-center">
                <div class="flex flex-col text-center">
                    <button type="submit" class="mt-4 mb-2 bg-white py-2 text-black drop-shadow-[0_35px_35px_rgba(0,0,0,0.35)] px-6 rounded rounded-3 hover:bg-[#d93337] hover:text-white hover:outline hover:outline-1 hover:outline-white">Log In</button>
                    <span>Or</span>
                    <!-- <a type="submit" class="my-2 bg-[#d93337] outline outline-1 outline-white py-2 text-white drop-shadow-[0_35px_35px_rgba(0,0,0,0.35)] px-6 rounded rounded-3 hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-white">Sign Up</a> -->
                    <div class="inline my-2">Don't have an account? <a href="signup.php" class="underline underline-offset-4">Sign Up</a> now!</div>
                </div>
            </form>
        </div>
<div class="m-4 p-4 drop-shadow-md">
<?php include("footer.php")?>