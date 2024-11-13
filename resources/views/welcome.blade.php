<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <title>{{ config('app.name') }}</title>

  <style>
    body {
      font-family: Poppins, sans-serif;
    }
  </style>
</head>

<body class="max-w-[1920px] mx-auto">
  <div class="bg-black text-gray-100 text-[15px]">

    <div
      class="relative lg:min-h-screen 2xl:min-h-[730px] before:absolute before:inset-0 before:w-full before:bg-black before:opacity-60"
      style="background-image: url(https://drivetech.ph/assets/images/mobile/Decore1.svg); 
       background-size: cover; 
       background-repeat: no-repeat; 
       background-position: calc(100% + 500px) calc(100% + 900px);">



      <header class='py-12 px-6 sm:px-24 z-50 min-h-[70px] relative'>
        <div class='lg:flex lg:items-center gap-x-2 relative'>
          <div class="flex items-center shrink-0">
            <a href="javascript:void(0)">
              <h1 class='text-3xl'>URENT</h1>
            </a>
            <button id="toggleOpen" class='lg:hidden ml-auto'>
              <svg class="w-7 h-7" fill="#fff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"></path>
              </svg>
            </button>
          </div>

          <div id="collapseMenu"
            class="lg:ml-14 max-lg:hidden lg:!block w-full max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50 z-50">
            <button id="toggleClose" class='mt-10 lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
                <path
                  d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                  data-original="#000000"></path>
                <path
                  d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                  data-original="#000000"></path>
              </svg>
            </button>

            <div
              class='pt-12 lg:flex items-center w-full gap-6 max-lg:fixed max-lg:bg-black max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:pt-12 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
              <ul class='lg:flex gap-x-6 ml-auto max-lg:space-y-3'>
                <li class='mb-6 hidden max-lg:block'>
                  <a href="javascript:void(0)">
                    <h1 class='text-3xl'>URENT</h1>
                  </a>
                </li>


            </div>
          </div>
        </div>
      </header>
      <!-- Landing page -->
      <div class="max-w-5xl mx-auto text-center relative px-4 sm:px-10 mt-16">
        <h1 class="lg:text-5xl md:text-4xl text-3xl font-semibold mb-6 md:!leading-[80px]">
          URENT:Apartment Management System
        </h1>
        <p class="text-gray-400 text-lg">
        Transform your apartment management operations with our innovative automated billing system, designed to streamline processes and enhance overall management efficiency. Our practical software solutions empower you to achieve your business goals, offering tools to automate utility and rent billing, improve tenant communication, and simplify property management tasks.
  </p>
        <div class="mt-14 flex gap-x-8 gap-y-4 justify-center max-sm:flex-col">
          <a href="{{ route('filament.app.auth.register') }}">
            <button type='button' class="px-6 py-3.5 rounded-md text-gray-100 bg-blue-700 hover:bg-blue-800 transition-all">
              Sign Up for Free
            </button>
          </a>
          <a href="{{ route('filament.app.auth.login') }}">
            <button type='button' class="bg-transparent hover:bg-blue-600 border border-blue-600 px-6 py-3.5 rounded-md text-gray-100 transition-all">
              Login Account
            </button>
          </a>
        </div>
      </div>


    </div>

    <footer class="bg-[#111] px-4 sm:px-10 py-12 mt-32">
      <!-- <div class="lg:max-w-[50%] mx-auto text-center">
        <h2 class="md:text-4xl text-3xl font-semibold md:!leading-[50px] mb-6">Newsletter</h2>
        <p class="text-gray-400">Subscribe to our newsletter and stay up to date with the latest news,
          updates, and exclusive offers. Get valuable insights. Join our community today!</p>
        <div class="bg-[#444] flex px-2 py-1 rounded-md text-left mt-10">
          <input type='email' placeholder='Enter your email' class="w-full outline-none bg-transparent pl-2" />
          <button type='button'
            class="px-6 py-3 rounded-md text-gray-100 bg-blue-700 hover:bg-blue-800 transition-all ml-auto">Submit</button>
        </div>
      </div> -->
      <!-- <hr class="border-gray-400 my-12" /> -->
      <div class="grid max-sm:grid-cols-1 max-lg:grid-cols-2 lg:grid-cols-3 gap-8">
        <div>
          <h4 class="text-lg mb-6">About Us</h4>
          <p class="text-gray-400 mb-2">Transform your apartment management operations with our innovative automated billing system, designed to streamline processes and enhance overall management efficiency. Our practical software solutions empower you to achieve your business goals, offering tools to automate utility and rent billing, improve tenant communication, and simplify property management tasks.






</p>
        </div>
        <div>
          <h4 class="text-lg mb-6">Services</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Web
                Development</a></li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Mobile App
                Development</a></li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">UI/UX
                Design</a></li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Digital
                Marketing</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg mb-6">Resources</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Webinars</a>
            </li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Ebooks</a>
            </li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Templates</a>
            </li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Tutorials</a></li>
          </ul>
        </div>
        <!-- <div>
          <h4 class="text-lg mb-6">About Us</h4>
          <ul class="space-y-4">
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Our Story</a>
            </li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Mission and
                Values</a></li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Team</a></li>
            <li><a href="javascript:void(0)" class="text-gray-400 hover:text-blue-600 transition-all">Testimonials</a>
            </li>
          </ul>
        </div> -->
      </div>
    </footer>

  </div>

    

   


      <!-- Remove this -->
      <!-- <div class="max-w-4xl mx-auto text-center mt-32">
        <div>
          <h2 class="md:text-4xl text-3xl font-semibold md:!leading-[50px] mb-6">Transform Your Ideas with our
            Comprehensive
            Template Library</h2>
          <p class="text-gray-400">Unlock creativity with our versatile templates designed to elevate your landing
            pages. Whether you're showcasing products, collecting feedback, or promoting events, our templates make the
            process seamless and visually compelling. Qui elit labore in nisi dolore tempor anim laboris ipsum ad ad
            consequat id. Dolore et sint mollit in nisi tempor culpa consectetur.</p>
        </div>
        <button class='px-6 py-3.5 rounded-md text-gray-100 bg-blue-700 hover:bg-blue-800 transition-all mt-10'>Get
          started
          today</button>
      </div> -->




      <!-- TESTIMONIAL SECTION -->
      <!-- <div class="mt-32 max-w-7xl mx-auto">
        <div class="mb-16 max-w-2xl text-center mx-auto">
          <h2 class="md:text-4xl text-3xl font-semibold md:!leading-[50px] mb-6">What our happy client say</h2>
          <p class="text-gray-400">Laboris qui Lorem ad tempor ut reprehenderit. Nostrud anim nulla officia ea sit
            deserunt. Eu eu quis anim aute Laboris qui Lorem ad tempor ut reprehenderit.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-12 max-md:justify-center text-center mt-16">
          <div>
            <div class="flex flex-col items-center">
              <img src="https://readymadeui.com/profile_2.webp"
                class="w-24 h-24 rounded-full shadow-xl border-2 border-white" />
              <div class="mt-4">
                <h4 class="text-base">John Doe</h4>
                <p class="text-xs text-blue-600 mt-2">CEO, Company</p>
              </div>
            </div>
            <div class="mt-6">
              <p class="text-gray-400">The service was amazing. I never had to wait that long for my food. The staff was
                friendly and attentive, and the delivery was impressively prompt.</p>
            </div>
            <div class="flex justify-center space-x-2 mt-4">
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
            </div>
          </div>
          <div>
            <div class="flex flex-col items-center">
              <img src="https://readymadeui.com/profile_3.webp"
                class="w-24 h-24 rounded-full shadow-xl border-2 border-white" />
              <div class="mt-4">
                <h4 class="text-base">Mark Adair</h4>
                <p class="text-xs text-blue-600 mt-2">CEO, Company</p>
              </div>
            </div>
            <div class="mt-6">
              <p class="text-gray-400">The service was amazing. I never had to wait that long for my food. The staff was
                friendly and attentive, and the delivery was impressively prompt.</p>
            </div>
            <div class="flex justify-center space-x-2 mt-4">
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
            </div>
          </div>
          <div>
            <div class="flex flex-col items-center">
              <img src="https://readymadeui.com/profile_4.webp"
                class="w-24 h-24 rounded-full shadow-xl border-2 border-white" />
              <div class="mt-4">
                <h4 class="text-base">Simon Konecki</h4>
                <p class="text-xs text-blue-600 mt-2">CEO, Company</p>
              </div>
            </div>
            <div class="mt-6">
              <p class="text-gray-400">The service was amazing. I never had to wait that long for my food. The staff was
                friendly and attentive, and the delivery was impressively prompt.</p>
            </div>
            <div class="flex justify-center space-x-2 mt-4">
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-blue-600" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
              <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
              </svg>
            </div>
          </div>
        </div>
      </div> -->

      <!-- REMOVE THIS -->

      <!-- <div class="mt-32 max-w-7xl mx-auto">
        <div class="text-center">
          <h2 class="md:text-4xl text-3xl font-semibold md:!leading-[50px] mb-6">Pricing Plans</h2>
          <p class="text-gray-400">Change your plant according your needs</p>
        </div>
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8 mt-16 max-md:max-w-md max-md:mx-auto">
          <div class="hover:outline outline-blue-600 rounded relative overflow-hidden transition-all p-6">
            <div class="text-left">
              <h4 class="text-xl mb-4">Hobby</h4>
              <h3 class="text-4xl">$10.00</h3>
              <p class="mt-4 text-gray-400">Ideal for individuals who need quick access to basic features.</p>
            </div>
            <div class="mt-8">
              <ul class="space-y-4">
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  50 Image generations
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  500 Credits
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  Monthly 100 Credits Free
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  Customer Support
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  50GB Cloud Storage
                </li>
              </ul>
            </div>
            <button type="button"
              class="w-full px-6 py-3.5 rounded-md text-gray-100 bg-blue-700 hover:bg-blue-800 transition-all mt-10">Get
              started today</button>
          </div>
          <div class="hover:outline outline-blue-600 rounded relative overflow-hidden transition-all p-6">
            <div class="text-left">
              <h4 class="text-xl mb-4">Professional</h4>
              <h3 class="text-4xl">$30.00</h3>
              <p class="mt-4 text-gray-400">Ideal for individuals who who need advanced features and tools for client
                work.</p>
            </div>
            <div class="mt-8">
              <ul class="space-y-4">
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  500 Image generations
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  5000 Credits
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  Monthly 1000 Credits Free
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  Customer Support
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  500GB Cloud Storage
                </li>
              </ul>
            </div>
            <button type="button"
              class="w-full px-6 py-3.5 rounded-md text-gray-100 bg-blue-700 hover:bg-blue-800 transition-all mt-10">Get
              started today</button>
          </div>
          <div class="hover:outline outline-blue-600 rounded relative overflow-hidden transition-all p-6">
            <div class="text-left">
              <h4 class="text-xl mb-4">Business</h4>
              <h3 class="text-4xl">$45.00</h3>
              <p class="mt-4 text-gray-400">Ideal for businesses who need personalized services and security for large
                teams.</p>
            </div>
            <div class="mt-8">
              <ul class="space-y-4">
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  1000 Image generations
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  8000 Credits
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  Monthly 5000 Credits Free
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  Customer Support
                </li>
                <li class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" width="17"
                    class="mr-4 bg-gray-200 fill-[#333] rounded-full p-[3px]" viewBox="0 0 24 24">
                    <path
                      d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"
                      data-original="#000000" />
                  </svg>
                  1500GB Cloud Storage
                </li>
              </ul>
            </div>
            <button type="button"
              class="w-full px-6 py-3.5 rounded-md text-gray-100 bg-blue-700 hover:bg-blue-800 transition-all mt-10">Get
              started today</button>
          </div>
        </div>
      </div> -->

      <!-- REMOVE THIS -->

      <!-- <div class="mt-32">
        <div class="max-w-7xl mx-auto">
          <div class="text-center">
            <h2 class="md:text-4xl text-3xl font-semibold md:!leading-[50px] mb-6">LATEST BLOGS</h2>
            <p class="text-gray-400">Laboris qui Lorem ad tempor ut reprehenderit. Nostrud anim nulla officia ea sit
              deserunt.</p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-16">
            <div class="cursor-pointer rounded overflow-hidden group">
              <div>
                <span class="block text-gray-400 mb-2">10 FEB 2023</span>
                <h3 class="text-xl group-hover:text-blue-600 transition-all">A Guide to Igniting Your Imagination</h3>
                <div class="mt-6">
                  <p class="text-gray-400 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc
                    et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                </div>
              </div>
              <hr class="my-6" />
              <div class="flex flex-wrap items-center gap-3">
                <img src='https://readymadeui.com/team-1.webp' class="w-9 h-9 rounded-full" />
                <p class="text-xs text-gray-400">BY JOHN DOE</p>
              </div>
            </div>
            <div class="cursor-pointer rounded overflow-hidden group">
              <div>
                <span class="block text-gray-400 mb-2">7 JUN 2023</span>
                <h3 class="text-xl group-hover:text-blue-600 transition-all">Hacks to Supercharge Your Day</h3>
                <div class="mt-6">
                  <p class="text-gray-400 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc
                    et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                </div>
              </div>
              <hr class="my-6" />
              <div class="flex flex-wrap items-center gap-3">
                <img src='https://readymadeui.com/team-2.webp' class="w-9 h-9 rounded-full" />
                <p class="text-xs text-gray-400">BY MARK ADAIR</p>
              </div>
            </div>
            <div class="cursor-pointer rounded overflow-hidden group">
              <div>
                <span class="block text-gray-400 mb-2">5 OCT 2023</span>
                <h3 class="text-xl group-hover:text-blue-600 transition-all">Trends and Predictions</h3>
                <div class="mt-6">
                  <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis accumsan, nunc
                    et tempus blandit, metus mi consectetur felis turpis vitae ligula.</p>
                </div>
              </div>
              <hr class="my-6" />
              <div class="flex flex-wrap items-center gap-3">
                <img src='https://readymadeui.com/team-3.webp' class="w-9 h-9 rounded-full" />
                <p class="text-xs text-gray-400">BY SIMON KONECKI</p>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- REMOVE THIS -->
      <!-- <div class="mt-32">
        <div class="mb-16 max-w-2xl text-center mx-auto">
          <h2 class="md:text-4xl text-3xl font-semibold md:!leading-[50px] mb-6">Application Metrics</h2>
          <p class="text-gray-400">Laboris qui Lorem ad tempor ut reprehenderit. Nostrud anim nulla officia ea sit
            deserunt. Eu eu quis anim aute Laboris qui Lorem ad tempor ut reprehenderit.</p>
        </div>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-12 lg:divide-x lg:divide-gray-300">
          <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 w-10 inline-block" viewBox="0 0 512 512">
              <path
                d="M437 268.152h-50.118c-6.821 0-13.425.932-19.71 2.646-12.398-24.372-37.71-41.118-66.877-41.118h-88.59c-29.167 0-54.479 16.746-66.877 41.118a74.798 74.798 0 0 0-19.71-2.646H75c-41.355 0-75 33.645-75 75v80.118c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45v-80.118c0-41.355-33.645-75-75-75zm-300.295 36.53v133.589H45c-8.271 0-15-6.729-15-15v-80.118c0-24.813 20.187-45 45-45h50.118c4.072 0 8.015.553 11.769 1.572a75.372 75.372 0 0 0-.182 4.957zm208.59 133.589h-178.59v-133.59c0-24.813 20.187-45 45-45h88.59c24.813 0 45 20.187 45 45v133.59zm136.705-15c0 8.271-6.729 15-15 15h-91.705v-133.59a75.32 75.32 0 0 0-.182-4.957 44.899 44.899 0 0 1 11.769-1.572H437c24.813 0 45 20.187 45 45v80.119z"
                data-original="#000000" />
              <path
                d="M100.06 126.504c-36.749 0-66.646 29.897-66.646 66.646-.001 36.749 29.897 66.646 66.646 66.646 36.748 0 66.646-29.897 66.646-66.646s-29.897-66.646-66.646-66.646zm-.001 103.292c-20.207 0-36.646-16.439-36.646-36.646s16.439-36.646 36.646-36.646 36.646 16.439 36.646 36.646-16.439 36.646-36.646 36.646zM256 43.729c-49.096 0-89.038 39.942-89.038 89.038s39.942 89.038 89.038 89.038 89.038-39.942 89.038-89.038c0-49.095-39.942-89.038-89.038-89.038zm0 148.076c-32.554 0-59.038-26.484-59.038-59.038 0-32.553 26.484-59.038 59.038-59.038s59.038 26.484 59.038 59.038c0 32.554-26.484 59.038-59.038 59.038zm155.94-65.301c-36.748 0-66.646 29.897-66.646 66.646.001 36.749 29.898 66.646 66.646 66.646 36.749 0 66.646-29.897 66.646-66.646s-29.897-66.646-66.646-66.646zm0 103.292c-20.206 0-36.646-16.439-36.646-36.646.001-20.207 16.44-36.646 36.646-36.646 20.207 0 36.646 16.439 36.646 36.646s-16.439 36.646-36.646 36.646z"
                data-original="#000000" />
            </svg>
            <h3 class="text-4xl text-blue-600 mt-6">400+</h3>
            <p class="mt-4">Unique Visitors</p>
          </div>
          <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 w-10 inline-block" viewBox="0 0 512 512">
              <path fill-rule="evenodd"
                d="M64.217 333.491h41.421c5.508 0 10 4.492 10 10v97.833c0 5.508-4.492 10-10 10H64.217c-5.508 0-10-4.492-10-10v-97.833c0-5.508 4.492-10 10-10zm155.471-61.737h-41.422c-5.508 0-10 4.492-10 10v159.571c0 5.508 4.492 10 10 10h41.422c5.508 0 10-4.492 10-10V281.754c0-5.508-4.493-10-10-10zm114.049-64.466h-41.421c-5.508 0-10 4.492-10 10v224.036c0 5.508 4.492 10 10 10h41.421c5.508 0 10-4.492 10-10V217.288c-.001-5.507-4.493-10-10-10zm72.625-57.992h41.421c5.508 0 10 4.492 10 10v282.028c0 5.508-4.492 10-10 10h-41.421c-5.508 0-10-4.492-10-10V159.296c0-5.508 4.492-10 10-10zm2.707-106.018a7.98 7.98 0 0 1-.812-15.938l49.121-2.666a7.98 7.98 0 0 1 8.307 9.094l.006.001-7.088 48.68a7.986 7.986 0 0 1-15.812-2.25l3.878-26.632C385.642 108.019 321.72 152.702 257.158 189.5c-69.131 39.402-138.98 69.744-206.779 93.355a7.976 7.976 0 0 1-5.25-15.062c66.943-23.313 135.906-53.269 204.154-92.167 63.527-36.208 126.449-80.188 186.56-133.799zM45.262 481.873h421.477c5.508 0 10 4.492 10 10v3.193c0 5.508-4.492 10-10 10H45.262c-5.508 0-10-4.492-10-10v-3.193c0-5.508 4.492-10 10-10zM139.587 6.935c-48.325 0-87.5 39.175-87.5 87.5s39.175 87.5 87.5 87.5 87.5-39.175 87.5-87.5c-.001-48.325-39.176-87.5-87.5-87.5zm-8 32.13v5.279c-5.474 1.183-10.606 3.537-14.768 6.92-6.626 5.387-10.827 13.21-10.353 22.965.476 9.817 5.372 16.4 12.186 20.849 5.887 3.844 13.093 5.827 19.733 6.917 5.206.855 10.757 2.201 14.95 4.733 3.261 1.969 5.71 4.838 6.23 9.127.072.595.111 1.013.117 1.26.08 3.359-1.536 5.926-3.962 7.767-3.135 2.379-7.564 3.785-12.005 4.324a33.57 33.57 0 0 1-3.172.254c-5.25.126-10.424-1.156-14.458-3.842-3.274-2.18-5.775-5.367-6.818-9.552a7.982 7.982 0 0 0-15.5 3.812c2.094 8.399 7.044 14.749 13.505 19.052 4.252 2.831 9.164 4.736 14.315 5.711v5.165a8 8 0 1 0 16-.001v-5.01c6.309-1.038 12.699-3.388 17.758-7.226 6.302-4.782 10.494-11.632 10.275-20.829a29.17 29.17 0 0 0-.179-2.76c-1.22-10.052-6.653-16.591-13.856-20.94-6.27-3.786-13.768-5.668-20.637-6.796-4.832-.793-9.912-2.13-13.607-4.543-2.767-1.806-4.752-4.416-4.937-8.224-.202-4.157 1.615-7.512 4.478-9.84 2.281-1.854 5.196-3.144 8.362-3.781a22.978 22.978 0 0 1 10.115.244c5.278 1.338 10.083 4.817 12.614 10.845a7.997 7.997 0 0 0 10.469 4.281 7.997 7.997 0 0 0 4.281-10.469c-4.701-11.196-13.65-17.664-23.489-20.158a37.3 37.3 0 0 0-1.646-.377v-5.161a8 8 0 1 0-16.001.004z"
                clip-rule="evenodd" data-original="#000000" />
            </svg>
            <h3 class="text-4xl text-blue-600 mt-6">450+</h3>
            <p class="mt-4">Total Sales</p>
          </div>
          <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 w-10 inline-block" viewBox="0 0 28 28">
              <path
                d="M18.56 16.94h-3.12l.65-2.16a2.58 2.58 0 0 0-1.66-3.21 1.41 1.41 0 0 0-1.81 1l-.1.42a8.61 8.61 0 0 1-2.26 4l-.57.56a1.56 1.56 0 0 0-1.21-.59h-.73a1.56 1.56 0 0 0-1.56 1.54v6.44a1.56 1.56 0 0 0 1.56 1.56h.73a1.55 1.55 0 0 0 1.33-.76l.14.07a6.55 6.55 0 0 0 2.91.69h3.59a3.58 3.58 0 0 0 3-1.6 6.34 6.34 0 0 0 1.07-3.53v-2.49a1.94 1.94 0 0 0-1.96-1.94zm-9.56 8a.56.56 0 0 1-.56.56h-.69a.56.56 0 0 1-.56-.56V18.5a.56.56 0 0 1 .56-.56h.73a.56.56 0 0 1 .52.56zm10.5-3.57a5.38 5.38 0 0 1-.9 3 2.59 2.59 0 0 1-2.15 1.15h-3.59a5.53 5.53 0 0 1-2.46-.58l-.4-.2V18.6l.92-.92a9.63 9.63 0 0 0 2.53-4.46l.1-.41a.43.43 0 0 1 .2-.26.4.4 0 0 1 .32 0 1.58 1.58 0 0 1 1 2l-.84 2.81a.5.5 0 0 0 .08.44.48.48 0 0 0 .4.2h3.79a.94.94 0 0 1 .94.94zM11 7.3l-.32 1.85a1.09 1.09 0 0 0 .44 1.09 1.11 1.11 0 0 0 .65.22 1.18 1.18 0 0 0 .52-.13L14 9.45l1.67.88a1.1 1.1 0 0 0 1.17-.09 1.09 1.09 0 0 0 .44-1.08L17 7.3 18.31 6a1.1 1.1 0 0 0 .29-1.14 1.12 1.12 0 0 0-.9-.76l-1.87-.27L15 2.12a1.12 1.12 0 0 0-2 0l-.83 1.69-1.87.27a1.12 1.12 0 0 0-.9.76A1.1 1.1 0 0 0 9.69 6zm-.6-2.23 2.13-.31a.49.49 0 0 0 .47-.27l1-1.93a.11.11 0 0 1 .2 0l1 1.93a.49.49 0 0 0 .38.27l2.13.31a.12.12 0 0 1 .09.08.11.11 0 0 1 0 .11l-1.54 1.5a.53.53 0 0 0-.15.45l.37 2.11a.09.09 0 0 1-.05.11.1.1 0 0 1-.12 0l-1.9-1a.47.47 0 0 0-.46 0l-1.91 1a.09.09 0 0 1-.11 0 .09.09 0 0 1-.05-.11l.37-2.11a.53.53 0 0 0-.15-.45l-1.54-1.5a.11.11 0 0 1 0-.11.12.12 0 0 1-.12-.08zm-3.06 8.18a1 1 0 0 0 1-1.19l-.27-1.52 1.12-1.09a1 1 0 0 0-.56-1.73L7.1 7.5l-.69-1.39a1.05 1.05 0 0 0-1.82 0L3.9 7.5l-1.53.22a1 1 0 0 0-.56 1.73l1.11 1.09-.27 1.52a1 1 0 0 0 .41 1 1 1 0 0 0 1.07.07l1.37-.72 1.37.72a1 1 0 0 0 .47.12zm-1.84-1.9a.46.46 0 0 0-.23.06l-1.63.82.36-1.78a.53.53 0 0 0-.2-.45L2.51 8.71l1.8-.26a.47.47 0 0 0 .37-.27l.83-1.63.81 1.63a.47.47 0 0 0 .37.27l1.8.29L7.2 10a.53.53 0 0 0-.15.45l.29 1.8-1.61-.84a.46.46 0 0 0-.23-.06zm20.95-2.94a1 1 0 0 0-.82-.69L24.1 7.5l-.69-1.39a1.05 1.05 0 0 0-1.82 0L20.9 7.5l-1.53.22a1 1 0 0 0-.56 1.73l1.11 1.09-.27 1.52a1 1 0 0 0 .41 1 1 1 0 0 0 1.07.07l1.37-.72 1.37.72a1 1 0 0 0 .47.12 1 1 0 0 0 1-1.19l-.27-1.52 1.11-1.09a1 1 0 0 0 .27-1.04zM24.2 10a.53.53 0 0 0-.15.45l.29 1.8-1.61-.84a.47.47 0 0 0-.46 0l-1.63.82.36-1.78a.53.53 0 0 0-.2-.45l-1.29-1.29 1.8-.26a.47.47 0 0 0 .37-.27l.83-1.63.81 1.63a.47.47 0 0 0 .37.27l1.8.29z"
                data-name="Layer 2" data-original="#000000" />
            </svg>
            <h3 class="text-4xl text-blue-600 mt-6">500+</h3>
            <p class="mt-4">Customer Satisfaction</p>
          </div>
          <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-blue-600 w-10 inline-block" viewBox="0 0 512 512">
              <path
                d="M477.797 290.203c0 59.244-23.071 114.942-64.963 156.834S315.244 512 256 512s-114.942-23.071-156.834-64.963-64.963-97.59-64.963-156.834c0-39.621 10.579-78.512 30.595-112.468 19.419-32.944 47.178-60.48 80.276-79.63 7.646-4.427 17.437-1.814 21.861 5.836 4.426 7.648 1.813 17.437-5.836 21.861-53.882 31.175-88.951 87.036-94.189 148.4H84.6c8.837 0 16 7.163 16 16s-7.163 16-16 16H66.884C74.594 398.12 148.083 471.609 240 479.319v-17.717c0-8.837 7.163-16 16-16s16 7.163 16 16v17.717c91.917-7.71 165.406-81.199 173.116-173.116h-17.717c-8.837 0-16-7.163-16-16s7.163-16 16-16h17.69c-5.238-61.364-40.307-117.227-94.19-148.4-7.648-4.425-10.262-14.212-5.836-21.861 4.425-7.648 14.214-10.261 21.861-5.836 33.098 19.148 60.857 46.685 80.277 79.63 20.016 33.955 30.596 72.846 30.596 112.467zm-253.173-220.2 15.259-15.259-.258 71.899c-.031 8.837 7.106 16.025 15.942 16.058h.059c8.81 0 15.967-7.126 15.999-15.942l.259-72.248 15.492 15.492c3.124 3.124 7.219 4.687 11.313 4.687s8.189-1.563 11.313-4.687c6.248-6.248 6.248-16.379 0-22.627L267.313 4.687c-6.248-6.248-16.379-6.248-22.627 0l-42.689 42.689c-6.248 6.248-6.248 16.379 0 22.627s16.379 6.248 22.627 0zM272 174.358v64.628c16.74 5.24 29.977 18.478 35.218 35.217h50.493c8.837 0 16 7.163 16 16s-7.163 16-16 16h-50.493c-6.823 21.795-27.202 37.655-51.218 37.655-29.585 0-53.654-24.069-53.654-53.655 0-24.015 15.86-44.394 37.654-51.217v-64.628c0-8.837 7.163-16 16-16s16 7.163 16 16zm5.655 115.845c0-11.94-9.715-21.654-21.655-21.654s-21.654 9.714-21.654 21.654 9.714 21.655 21.654 21.655 21.655-9.714 21.655-21.655z"
                data-original="#000000" />
            </svg>
            <h3 class="text-4xl text-blue-600 mt-6">600+</h3>
            <p class="mt-4">System Uptime (in hours)</p>
          </div>
        </div>
      </div> -->


  <script>
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
      if (collapseMenu.style.display === 'block') {
        collapseMenu.style.display = 'none';
      } else {
        collapseMenu.style.display = 'block';
      }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);
  </script>
</body>

</html>