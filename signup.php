<?php
$title = "Ramexa - Sign Up";
include("login-layout.php");
?>
    <div class="flex min-h-screen flex-col text-white pt-6 items-center justify-between px-24 sm:px-0 md:px-4">
      <div class="z-10 w-full bg-[#d93337] rounded rounded-2 text-center drop-shadow-[0_35px_35px_rgba(0,0,0,0.25)] max-w-5xl flex flex-col pt-16 text-sm">
          <div class="flex flex-col mb-2 justify-center">
              <img
            class="object-scale-down"
                src = '/ramexa-rma/ramexa-rma/assets/RMX.png'
                alt='RAMEXA Logo'
                style='width:auto; height:3em'
                ></img>
                <p class="text-xl font-bold">PT. RAMEXA GODITUS INDONESIA</p>
                <p class="text-sm italic">EXCELLENT IN INTEGRITY</p>
        </div>
        <p class="text-lg font-semibold text-center">Sign Up</p>
        <form action="" method="post">
        <div class="flex flex-row text-white mt-4 flex-wrap px-8">
            
                <?php
                $component->input("Full Name", "John Doe", "text", "fullname" );
                $component->input("Username", "JohnDoe123", "text", "username" );
                $component->input("Password", "************", "password", "password");
                $component->input("Password Confirmation", "************", "password", "repassword");
                ?>
                <div class="flex w-full justify-center">
                <div class="flex flex-col text-center">
                    <button type="submit" class="mt-4 mb-2 bg-white py-2 text-black drop-shadow-[0_35px_35px_rgba(0,0,0,0.35)] px-6 rounded rounded-3 hover:bg-[#d93337] hover:text-white hover:outline hover:outline-1 hover:outline-white">Sign Up</button>
                    <span>Or</span>
                    <div class="inline ">Already have an account? <a href="login.php" class="underline underline-offset-4">Log In</a> now!</div>
                </div>
            </form>
        </div>
<div class="m-4 p-4 drop-shadow-md">
<?php include("footer.php")?>