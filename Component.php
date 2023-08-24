<?php
class Component{

    public function __construct(){

    }
    /**
     * Summary of back
     * @param mixed $href
     * link
     * @return void
     * $component->back("index.html")
     */
    public function back($href){
        echo '<a href='.$href.' class="inline-flex transition ease-out duration-150 hover:underline">
        <img
        class="mr-1"
        src="/ramexa-rma/ramexa-rma/assets/arrow-left.png"
        alt="arrow-left"
        style="width:auto; height:20px"
        ></img>
        <p>
        Back
        </p>
      </a>';
    }

    /**
     * Summary of label
     * @param mixed $text
     * text to be displayed by label
     * @return void
     * $component->label("Lorem")
     */
    public function label($text){
      echo '
      <label
      class ="px-4 my-2">
        '.$text.'
    </label>';
    }

    /**
     * Summary of card
     * @param mixed $href
     * @param mixed $cardImg
     * @param mixed $alt
     * @param mixed $cardText
     * @return void
     * $component->card("index.html", "form-new.png", "form-new", "new form")
     */
    public function card($href, $cardImg, $alt, $cardText){
      echo "
      <a href='".$href."' class='flex grow'>
        <div class='flex m-1 flex-col w-full h-100 shrink transition ease-in-out duration-200 hover:ease-out hover:bg-neutral-300 text-center mb-2 grow-1 lg:mx-4 md:mx-4 sm:mx-2 rounded-lg bg-slate-100 drop-shadow-lg py-8 px-8'>
        <img
          class='px-auto mx-auto'
          src='/ramexa-rma/ramexa-rma/assets/".$cardImg."'
          width='35px'
          height='35px'
          alt='".$alt."'
          ></img>
        <p class='pt-2 text-base text-neutral-600'>
          ".$cardText."
        </p>
        </div>
          </a>
      ";
    }
    /**
     * Summary of input
     * @param mixed $label
     * @param mixed $placeholder
     * @param mixed $inputType
     * @param mixed $inputName
     * @return void
     * $component->input("Customer's Name", "John Doe", "text", "username", "disabled" );
     */
    public function input($label, $placeholder, $inputType, $inputName, $disabled = ""){
      echo "
      <label
      class='px-4 my-2'>
        ".$label."
      </label><input
        type='".$inputType."'
        name='".$inputName."'
        class='peer block min-h-[auto] w-full text-black rounded border-0 focus:outline-[#d93337] px-4 py-2 my-1'
        placeholder='".$placeholder."'
        ".$disabled." required
        />
      ";
    }

    /**
     * Summary of inputGroup
     * @param mixed $class
     * @param mixed $inputType
     * @param mixed $inputPlaceholder
     * @param mixed $buttonImg
     * @param mixed $inputName
     * @return void
     * $component->inputGroup('flex justify-center my-4 px-4 flex flex-wrap', 'text', 'L152XXXX-XXXX', 'search.png', 'search');
     */
    public function inputGroup($class, $inputType, $inputPlaceholder, $buttonImg, $inputName){
      echo '
      <div class="'.$class.'">
          <input type="'.$inputType.'"
            class="flex justify-center rounded-l-md pl-2 outline outline-1 outline-slate-400 focus:outline-offset-1 focus:outline-2 focus:outline-[#d93337]"
            name="'.$inputName.'"
            placeholder="'.$inputPlaceholder.'"/>
          <button
            class="z-[2] inline-block rounded-r bg-[#d93337] px-6 pb-2 pt-2.5 focus:outline-[#d93337] focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            type="button">
             <img
          src = "/ramexa-rma/ramexa-rma/assets/'.$buttonImg.'"
          width="25px"
          height="25px"
          alt="'.$buttonImg.'"
          ></img>
          
          </button>
          </div>
      ';
    }
    /**
     * Summary of navbar
     * this component is used in layout.php
     * @return void
     * $component->navbar()
     */
    public function navbar(){
        echo "<nav
        class=' z-50 relative flex w-full flex-wrap items-center justify-between bg-[#d93337] py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 lg:py-4'>
        <div class='flex w-full flex-wrap items-center justify-between px-3'>
          <div>
            <a
              class='mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0'
              href='#'>
                <img
                src = '/ramexa-rma/ramexa-rma/assets/RMX.png'
                alt='RAMEXA Logo'
                style='width:auto; height:3em'
                ></img>
            </a>
          </div>
          <div>
            <a
              class='block mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0 lg:hidden'
              href='#'>
                <span class='[&>svg]:w-7'>
              <svg
                xmlns='http://www.w3.org/2000/svg'
                viewBox='0 0 24 24'
                fill='currentColor'
                class='h-7 w-7'>
                <path
                  fill-rule='evenodd'
                  d='M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z'
                  clip-rule='evenodd' />
              </svg>
            </span>
            </a>
          </div>
          <div
            class=' !visible hidden flex justify-end items-center lg:!flex lg:basis-auto'
            id='navbarSupportedContent1'
            data-te-collapse-item>
            <ul
              class='list-style-none mr-auto flex flex-col pl-0 lg:flex-row'
              data-te-navbar-nav-ref>
              <li class='mb-4 lg:mb-0 lg:py-1 lg:me-1' data-te-nav-item-ref>
                <a
                  class='text-neutral-200 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400'
                  href='#'
                  data-te-nav-link-ref
                  >Dashboard</a
                >
              </li>
              <li class='mb-4 lg:mb-0 lg:py-1 lg:me-1' data-te-nav-item-ref>
                <a
                  class='text-neutral-200 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400'
                  href='#'
                  data-te-nav-link-ref
                  >Team</a
                >
              </li>
              <li class='mb-4 lg:mb-0 lg:py-1 lg:me-1' data-te-nav-item-ref>
                <a
                  class='text-neutral-200 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400'
                  href='#'
                  data-te-nav-link-ref
                  >Projects</a
                >
              </li>
              <li class='mb-4 lg:mb-0 rounded rounded-1 lg:py-1' data-te-nav-item-ref>
                <a
                  class='text-[#d93337] transition duration-200 px-3 bg-white py-1 rounded rounded-2 hover:bg-[#d93337] hover:text-white hover:outline hover:outline-1 hover:outline-white focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none [&.active]:text-black/90 dark:[&.active]:text-neutral-400'
                  href='/ramexa-rma/ramexa-rma/login.php'
                  data-te-nav-link-ref
                  >Login</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>";
    }
}