<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js CDN -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style>
    body {
      font-family: Poppins, sans-serif;
    }
  </style>
</head>

<body class="max-w-[1920px] mx-auto text-black text-sm">
  <div class="bg-white">
    <header class="py-4 px-4 sm:px-10 bg-white z-50 relative">
      <div class='max-w-7xl w-full mx-auto flex flex-col sm:flex-row justify-between items-center gap-4'>
        <a href="javascript:void(0)" class="w-40 sm:w-48">
          <img src="https://i.postimg.cc/cCzFTpTc/rentify-logo-2.png" alt="logo" class='w-full' />
        </a>

        <div id="collapseMenu"
          class='max-lg:hidden lg:!block max-lg:fixed max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-40 max-lg:before:inset-0'>
          <button id="toggleClose" class='lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white p-3'>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-black" viewBox="0 0 320.591 320.591">
              <path
                d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                data-original="#000000"></path>
              <path
                d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                data-original="#000000"></path>
            </svg>
          </button>

          <ul
            class='lg:!flex lg:ml-12 lg:space-x-6 max-lg:space-y-6 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-4 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50'>
            <li class='max-lg:border-b max-lg:pb-4 px-3 lg:hidden'>
              <a href="javascript:void(0)">
                <!-- <img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40' /> -->
              </a>

              <ul
                class='absolute shadow-lg bg-white space-y-3 lg:top-5 max-lg:top-8 -left-0 min-w-[250px] z-50 max-h-0 overflow-hidden group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-500'>
                <li class='border-b py-2 '><a href='javascript:void(0)'
                    class='hover:text-blue-600 font-semibold block transition-all'>About</a></li>
                <li class='border-b py-2 '><a href='javascript:void(0)'
                    class='hover:text-blue-600 font-semibold block transition-all'>Contact</a></li>
              </ul>
            </li>


            <div class='flex justify-end w-full sm:w-auto'>
              <a href="{{ route('filament.app.auth.login') }}">
                <button class='w-full sm:w-auto bg-blue-100 hover:bg-blue-200 flex items-center transition-all font-semibold rounded-md px-4 sm:px-5 py-2 sm:py-3'>
                  Get started
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2" viewBox="0 0 492.004 492.004">
                    <path
                      d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                      data-original="#000000" />
                  </svg>
                </button>
              </a>
              <button id="toggleOpen" class='lg:hidden ml-7'>
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
              </button>
            </div>
    </header>

    <div class="flex items-center justify-center min-h-[60vh] sm:min-h-screen bg-blue-100 px-4 sm:px-10">
      <div class="max-w-2xl w-full text-center mx-auto py-8 sm:py-16">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 sm:mb-6 leading-tight sm:leading-[55px]">Welcome to Rentify</h1>
        <p class="text-base leading-relaxed">
          Rentify is a comprehensive platform that connects landlords and tenants, making it easier to find, rent, and manage apartment units. We are committed to providing a seamless experience for both landlords and tenants, ensuring that everyone can find the perfect place to call home.
        </p>

       
          <div class='flex justify-center items-center border border-black rounded-md w-ful sm:w-auto mt-4'>
            <a href="{{ route('filament.app.auth.login') }}">
              <button class='w-full sm:w-auto bg-blue-100 hover:bg-blue-200 flex items-center transition-all font-semibold rounded-md px-4 sm:px-5 py-2 sm:py-3'>
                Get started
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2" viewBox="0 0 492.004 492.004">
                  <path
                    d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                    data-original="#000000" />
                </svg>
              </button>
            </a>
        </div>
      </div>
    </div>



    <div class="px-4 sm:px-10 mt-16 sm:mt-28">
      <div class="max-w-7xl w-full mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-6 sm:gap-10">
          <div class="w-full h-48 sm:h-64 md:h-full">
            <img src="https://i.postimg.cc/gkR858Z5/FOR-RENT.jpg" alt="Premium Benefits" class="w-full h-full object-cover rounded-lg" />
          </div>
          <div>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4 sm:mb-6">Simplify Apartment Management with Rentify</h2>
            <p>Rentify is designed for landlords who want an efficient, modern way to manage their properties and assist tenants.
              Created with the needs of Tamondong Apartment in GMA in mind, Rentify streamlines tenant information collection,
              allowing landlords to access essential tenant details, rental agreements, and contact information
              all from one easy to use online platform.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="px-4 sm:px-10 mt-16 sm:mt-28">
      <div class="max-w-7xl w-full mx-auto grid md:grid-cols-2 justify-center items-center gap-10">
        <div>
          <h2 class="md:text-4xl text-3xl font-semibold mb-6">Effortless Communication and Payments</h2>
          <p>With Rentify, landlords can notify tenants of monthly dues, send out important announcements,
            and even track monthly earnings from the dashboard. Tenants benefit from streamlined monthly bill payments and instant access to building updates,
            creating a seamless experience for everyone involved.</p>
        </div>
        <div class="w-full h-full">
          <!-- Update the image source here -->
          <img src="https://i.postimg.cc/kMs9FXwb/Untitled-design-1.jpg" alt="feature" class="w-full h-full object-cover" />
        </div>
      </div>
    </div>

    <div class="mt-16 sm:mt-28 px-4 sm:px-10 bg-blue-100">
      <div
        class="min-h-[400px] relative h-full max-w-2xl mx-auto flex flex-col justify-center items-center text-center px-6 py-16">
        <h2 class="md:text-4xl text-3xl font-semibold mb-6">Built for the Future of Apartment Management</h2>
        <p>Adaptable and scalable, Rentify is here to meet the evolving needs of landlords and tenants alike.
          Simplify your apartment management process with Rentify and focus on what matters most a well-managed,
          thriving residential community.</p>
        <!-- <a href="{{ route('filament.app.auth.login') }}">
          <button
            class="bg-black hover:bg-[#222] text-white flex items-center transition-all font-semibold rounded-md px-5 py-4 mt-8">
            Get started
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2" viewBox="0 0 492.004 492.004">
              <path
                d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                data-original="#000000"></path>
            </svg>
          </button>
        </a> -->
      </div>
    </div>



    <div class="mt-16 sm:mt-28 px-4 sm:px-10">
      <div class="max-w-7xl mx-auto space-y-4 sm:space-y-6">
        <div class="mb-6 sm:mb-10">
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold mb-4 sm:mb-6">Frequently Asked Questions</h2>
          <p>Explore common questions and find answers to help you make the most out of our services. If you don't see
            your question here, feel free to contact us for assistance.</p>
        </div>
        <div class="divide-y" x-data="{ activeIndex: null }">
          <div class="py-4">
            <button @click="activeIndex = activeIndex === 0 ? null : 0" class="w-full text-left font-semibold flex items-center justify-between">
              <span>How do I pay my rent?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-200" :class="{ 'rotate-45': activeIndex === 0 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </button>
            <div x-show="activeIndex === 0" x-collapse>
              <p class="mt-2">Rent can be paid online through our system, by check or money order to the landlord, Details and payment options are available in your dashboard.</p>
            </div>
          </div>
          <div class="py-4">
            <button @click="activeIndex = activeIndex === 1 ? null : 1" class="w-full text-left font-semibold flex items-center justify-between">
              <span>What is the process for maintenance requests?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-200" :class="{ 'rotate-45': activeIndex === 1 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </button>
            <div x-show="activeIndex === 1" x-collapse>
              <p class="mt-2">You can submit maintenance requests online through the system or by calling the landlord. For emergency repairs (e.g., plumbing issues, electrical problems), please contact the emergency maintenance number immediately.</p>
            </div>
          </div>
          <div class="py-4">
            <button @click="activeIndex = activeIndex === 0 ? null : 0" class="w-full text-left font-semibold flex items-center justify-between">
              <span>What is the policy for renewing my lease?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-200" :class="{ 'rotate-45': activeIndex === 0 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </button>
            <div x-show="activeIndex === 0" x-collapse>
              <p class="mt-2">You may also contact the landlord through ,calling or messaging.</p>
            </div>
          </div>
          <div class="py-4">
            <button @click="activeIndex = activeIndex === 0 ? null : 0" class="w-full text-left font-semibold flex items-center justify-between">
              <span>Can i have pets in my apartment?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-200" :class="{ 'rotate-45': activeIndex === 0 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </button>
            <div x-show="activeIndex === 0" x-collapse>
              <p class="mt-2">Yes, we are a pet-friendly community. However, there are certain breed size restrictions.
                Please inform the landlord or contact the landlord for more details. </p>
            </div>
          </div>
          <div class="py-4">
            <button @click="activeIndex = activeIndex === 0 ? null : 0" class="w-full text-left font-semibold flex items-center justify-between">
              <span>how do i report a noise complaint or other disturbances?</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transform transition-transform duration-200" :class="{ 'rotate-45': activeIndex === 0 }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
            </button>
            <div x-show="activeIndex === 0" x-collapse>
              <p class="mt-2">If you need to terminate your lease early, please contact the landlord as soon as possible. </p>
              <!-- Add more FAQ items following the same pattern -->
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="mt-28 px-4 sm:px-10">
    <div class="max-w-7xl mx-auto bg-gradient-to-r from-teal-700 via-teal-600 to-teal-700 py-16 px-6 relative">
      <div class="max-w-2xl mx-auto text-center">
        <h2 class="md:text-4xl text-3xl font-semibold mb-6 text-white">Subscribe to Our Newsletter</h2>
        <div class="my-6">
          <p class="text-white">Subscribe to our newsletter and stay up to date with the latest news, updates, and
            exclusive offers. Get
            valuable insights. Join our community today!</p>
        </div>
        <div
          class="max-w-2xl left-0 right-0 mx-auto w-full bg-white p-5 flex items-center shadow-lg absolute -bottom-10 rounded-md">
          <input type="email" placeholder="Enter your email"
            class="w-full bg-gray-50 py-3.5 px-4 text-base focus:outline-none" />
          <button
            class="bg-black hover:bg-[#222] text-white flex items-center transition-all font-semibold px-5 py-4">
            Subscribe
          </button>
        </div>
      </div>
    </div>
  </div> -->

      <!-- Footer -->


      <footer class="bg-gray-50 mt-16 sm:mt-28">
        <div class="mx-auto grid max-w-screen-xl gap-6 sm:gap-y-8 sm:gap-x-12 px-4 py-8 sm:py-10 grid-cols-1 md:grid-cols-2 xl:grid-cols-4 xl:px-10">
          <div class="max-w-sm">
            <div class="mb-6 flex h-12 items-center space-x-2">
            </div>
            <div class="">
              <div class="mt-4 mb-2 font-medium xl:mb-4">Address</div>
              <div class="text-gray-500">
                Sorsogon Street, <br />
                Barangay Maderan, <br />
                General Mariano Alvarez, Cavite
              </div>
            </div>
          </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-300 my-4"></div>

        <div class="bg-gray-100">
          <div class="mx-auto flex max-w-screen-xl flex-col sm:flex-row gap-y-2 sm:gap-y-4 px-4 py-3 text-center text-gray-500 sm:justify-between sm:text-left">
            <div class="">© 2024 Rentify | All Rights Reserved</div>
            <div class="">
              <span>|</span>
            </div>
          </div>
        </div>
      </footer>

    </div>

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

      // Add this new code for FAQ functionality
      document.addEventListener('DOMContentLoaded', function() {
        const faqContainer = document.getElementById('faqContainer');

        faqContainer.addEventListener('click', function(e) {
          if (e.target.classList.contains('faq-question')) {
            const answer = e.target.nextElementSibling;
            const icon = e.target.querySelector('svg');

            answer.classList.toggle('hidden');
            icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(45deg)';
          }
        });
      });

      // Add this new code for FAQ functionality
      document.addEventListener('DOMContentLoaded', function() {
        const faqContainer = document.getElementById('faqContainer');

        faqContainer.addEventListener('click', function(e) {
          if (e.target.classList.contains('faq-question')) {
            const answer = e.target.nextElementSibling;
            const icon = e.target.querySelector('svg');

            answer.classList.toggle('hidden');
            icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(45deg)';
          }
        });
      });
    </script>
</body>

</html>