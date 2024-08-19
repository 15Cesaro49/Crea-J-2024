<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.html');
    exit();
}

// Aquí obtienes el nombre del usuario desde la sesión o la base de datos
$nombre_usuario = $_SESSION['email']; // Asumiendo que guardaste el nombre del usuario en la sesión
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

<nav class="bg-gray-800 py-6 relative">
    <div class="container mx-auto flex px-8 xl:px-0">
        <div class="flex flex-grow">
            <img src="../img/parking-de-bicicletas.png" alt="Logo" class="w-10">
        </div>
        <div class="flex lg:hidden">
            <img src="../img/barra-de-menus.png" alt="Menu" onclick="openMenu();">
        </div>
        <div id="menu"
            class="lg:flex hidden flex-grow justify-between absolute lg:relative lg:top-0 top-20 bg-gray-800 w-full left-0 py-14 lg:w-auto items-center lg:py-0 px-8 sm:px-24 lg:px-0">
            <div class="flex flex-col lg:flex-row mb-8 lg:mb-0">
                <a href="index.php" class="text-white lg:mr-7 mb-8 lg:mb-0">Inicio</a>
                <a href="http://localhost:3000" class="text-white lg:mr-7 mb-8 lg:mb-0">Estacionar</a>
                <a href="team.php" class="text-white lg:mr-7 mb-8 lg:mb-0">Nosotros</a>
                <a href="AcercaDe.php" class="text-white">Acerca de</a>
            </div>
            <div class="mb-4 lg:mb-0">
                <div x-data="{ isOpen: false}" class="relative">
                    <!-- Botón del dropdown -->
                    <button @click="isOpen = !isOpen"
                        class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                        <span class="mx-1"><?php echo htmlspecialchars($nombre_usuario); ?></span>
                        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>

                    <!-- Menú desplegable -->
                    <div x-show="isOpen" @click.away="isOpen = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-90"
                        class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800">
                        <a href="#"
                            class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                alt="Jane Doe avatar">
                            <div class="mx-1">
                                <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200"><?php echo htmlspecialchars($nombre_usuario); ?></h1>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Usuario</p>
                            </div>
                        </a>

                        <hr class="border-gray-200 dark:border-gray-700">

                        <a href="perfil.php"
                            class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23827 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span class="mx-1">Ver perfil</span>
                        </a>

                        <a href="#"
                            class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0379 5.088C16.2529 5.202 16.5009 5.374 16.7449 5.555L18.5819 4.97C19.0299 4.82714 19.5169 5.0157 19.7519 5.423L21.5719 8.576C21.8044 8.98348 21.7249 9.49825 21.3799 9.815L19.9549 11.115C20.0202 11.7036 20.0202 12.2971 19.9549 12.885L21.3799 14.185C21.7258 14.5027 21.8059 15.0173 21.5719 15.424L19.7519 18.575C19.5169 18.9823 19.0299 19.1709 18.5819 19.028L16.7449 18.443C16.2623 18.7991 15.7516 19.0958 15.2079 19.33L14.7959 21.214C14.6958 21.673 14.2897 22.0005 13.8199 22ZM12.0009 15.5C14.4813 15.5 16.5009 13.4804 16.5009 11C16.5009 8.51961 14.4813 6.5 12.0009 6.5C9.52055 6.5 7.50092 8.51961 7.50092 11C7.50092 13.4804 9.52055 15.5 12.0009 15.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span class="mx-1">Ajustes</span>
                        </a>

                        <a href="PHP/logout.php"
                            class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19.5 13.5C19.5 13.2348 19.3946 12.9804 19.2071 12.7929C19.0196 12.6054 18.7652 12.5 18.5 12.5H12.5V11.5H14.5C14.7652 11.5 15.0196 11.3946 15.2071 11.2071C15.3946 11.0196 15.5 10.7652 15.5 10.5V6.5C15.5 6.23478 15.3946 5.98043 15.2071 5.79289C15.0196 5.60536 14.7652 5.5 14.5 5.5H9.5C9.23478 5.5 8.98043 5.60536 8.79289 5.79289C8.60536 5.98043 8.5 6.23478 8.5 6.5V10.5C8.5 10.7652 8.60536 11.0196 8.79289 11.2071C8.98043 11.3946 9.23478 11.5 9.5 11.5H11.5V12.5H5.5C5.23478 12.5 4.98043 12.6054 4.79289 12.7929C4.60536 12.9804 4.5 13.2348 4.5 13.5V18.5C4.5 18.7652 4.60536 19.0196 4.79289 19.2071C4.98043 19.3946 5.23478 19.5 5.5 19.5H18.5C18.7652 19.5 19.0196 19.3946 19.2071 19.2071C19.3946 19.0196 19.5 18.7652 19.5 18.5V13.5ZM7 13.5H17V17.5H7V13.5ZM10 9.5V7.5H14V9.5H10ZM12 2C11.7348 2 11.4804 2.10536 11.2929 2.29289C11.1054 2.48043 11 2.73478 11 3V4H13V3C13 2.73478 12.8946 2.48043 12.7071 2.29289C12.5196 2.10536 12.2652 2 12 2ZM4 9.5C4 9.76522 4.10536 10.0196 4.29289 10.2071C4.48043 10.3946 4.73478 10.5 5 10.5C5.26522 10.5 5.51957 10.3946 5.70711 10.2071C5.89464 10.0196 6 9.76522 6 9.5V8.5H4V9.5ZM18 10.5C18.2652 10.5 18.5196 10.3946 18.7071 10.2071C18.8946 10.0196 19 9.76522 19 9.5V8.5H17V9.5C17 9.76522 17.1054 10.0196 17.2929 10.2071C17.4804 10.3946 17.7348 10.5 18 10.5Z"
                                    fill="currentColor"></path>
                            </svg>
                            <span class="mx-1">Cerrar sesion</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function openMenu() {
        var menu = document.getElementById("menu");
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
        } else {
            menu.classList.add("hidden");
        }
    }
</script>

<section>
  <div class="pb-4 border-b border-gray-600">
    <h3 class="text-xl font-semibold leading-6 text-gray-800">Latest Entries</h3>
  </div>

  <div class="relative mx-auto max-w-7xl">
    <div class="grid max-w-lg gap-12 mx-auto mt-12 lg:grid-cols-3 lg:max-w-none">
      <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
        <a href="/blog-post">
          <div class="flex-shrink-0">
            <img class="object-cover w-full h-48 rounded-lg" src="/assets/images/placeholders/neon-1.jpg" alt="">
          </div>
        </a>
        <div class="flex flex-col justify-between flex-1">
          <a href="/blog-post"></a>
          <div class="flex-1">
            <a href="/blog-post">
              <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-10"> Mar 10, 2020 </time>
                <span aria-hidden="true"> · </span>
                <span> 4 min read </span>
              </div>
            </a>
            <a href="#" class="block mt-2 space-y-6">
              <h3 class="text-2xl font-semibold leading-none tracking-tighter text-neutral-600">Typography on app.</h3>
              <p class="text-lg font-normal text-gray-500">Filling text so you can see how it looks like with text. Did I said text?</p>
            </a>
          </div>
        </div>
      </div>

      <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
        <a href="/blog-post">
          <div class="flex-shrink-0">
            <img class="object-cover w-full h-48 rounded-lg" src="/assets/images/placeholders/neon-2.jpg" alt="">
          </div>
        </a>
        <div class="flex flex-col justify-between flex-1">
          <a href="/blog-post"></a>
          <div class="flex-1">
            <a href="/blog-post">
              <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-10"> Mar 10, 2020 </time>
                <span aria-hidden="true"> · </span>
                <span> 4 min read </span>
              </div>
            </a>
            <a href="#" class="block mt-2 space-y-6">
              <h3 class="text-2xl font-semibold leading-none tracking-tighter text-neutral-600">Typography on app.</h3>
              <p class="text-lg font-normal text-gray-500">Filling text so you can see how it looks like with text. Did I said text?</p>
            </a>
          </div>
        </div>
      </div>

      <div class="flex flex-col mb-12 overflow-hidden cursor-pointer">
        <a href="/blog-post">
          <div class="flex-shrink-0">
            <img class="object-cover w-full h-48 rounded-lg" src="/assets/images/placeholders/neon-3.jpg" alt="">
          </div>
        </a>
        <div class="flex flex-col justify-between flex-1">
          <a href="/blog-post"></a>
          <div class="flex-1">
            <a href="/blog-post">
              <div class="flex pt-6 space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-10"> Mar 10, 2020 </time>
                <span aria-hidden="true"> · </span>
                <span> 4 min read </span>
              </div>
            </a>
            <a href="#" class="block mt-2 space-y-6">
              <h3 class="text-2xl font-semibold leading-none tracking-tighter text-neutral-600">Typography on app.</h3>
              <p class="text-lg font-normal text-gray-500">Filling text so you can see how it looks like with text. Did I said text?</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
<footer class=" dark:bg-gray-900">
        <div class="container p-6 mx-auto">
            <div class="lg:flex">
                <div class="w-full -mx-6 lg:w-2/5">
                    <div class="px-6">
                        <a href="#">
                            <img class="w-auto h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                        </a>

                        <p class="max-w-sm mt-2  dark:text-gray-400">Join 31,000+ other and never miss out on new tips,
                            tutorials, and more.</p>

                        <div class="flex mt-6 -mx-2">
                            <a href="#" class="mx-2 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                                aria-label="Reddit">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z">
                                    </path>
                                </svg>
                            </a>

                            <a href="#" class="mx-2 dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                                aria-label="Facebook">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                                    </path>
                                </svg>
                            </a>

                            <a href="#" class="mx-2  dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400"
                                aria-label="Github">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.026 2C7.13295 1.99937 2.96183 5.54799 2.17842 10.3779C1.395 15.2079 4.23061 19.893 8.87302 21.439C9.37302 21.529 9.55202 21.222 9.55202 20.958C9.55202 20.721 9.54402 20.093 9.54102 19.258C6.76602 19.858 6.18002 17.92 6.18002 17.92C5.99733 17.317 5.60459 16.7993 5.07302 16.461C4.17302 15.842 5.14202 15.856 5.14202 15.856C5.78269 15.9438 6.34657 16.3235 6.66902 16.884C6.94195 17.3803 7.40177 17.747 7.94632 17.9026C8.49087 18.0583 9.07503 17.99 9.56902 17.713C9.61544 17.207 9.84055 16.7341 10.204 16.379C7.99002 16.128 5.66202 15.272 5.66202 11.449C5.64973 10.4602 6.01691 9.5043 6.68802 8.778C6.38437 7.91731 6.42013 6.97325 6.78802 6.138C6.78802 6.138 7.62502 5.869 9.53002 7.159C11.1639 6.71101 12.8882 6.71101 14.522 7.159C16.428 5.868 17.264 6.138 17.264 6.138C17.6336 6.97286 17.6694 7.91757 17.364 8.778C18.0376 9.50423 18.4045 10.4626 18.388 11.453C18.388 15.286 16.058 16.128 13.836 16.375C14.3153 16.8651 14.5612 17.5373 14.511 18.221C14.511 19.555 14.499 20.631 14.499 20.958C14.499 21.225 14.677 21.535 15.186 21.437C19.8265 19.8884 22.6591 15.203 21.874 10.3743C21.089 5.54565 16.9181 1.99888 12.026 2Z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-6 lg:mt-0 lg:flex-1">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <div>
                            <h3 class=" uppercase dark:text-white">About</h3>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Company</a>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">community</a>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Careers</a>
                        </div>

                        <div>
                            <h3 class=" uppercase dark:text-white">Blog</h3>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Tec</a>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Music</a>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Videos</a>
                        </div>

                        <div>
                            <h3 class=" uppercase dark:text-white">Products</h3>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Mega cloud</a>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Aperion UI</a>
                            <a href="#" class="block mt-2 text-sm  dark:text-gray-400 hover:underline">Meraki UI</a>
                        </div>

                        <div>
                            <h3 class=" uppercase dark:text-white">Contact</h3>
                            <span class="block mt-2 text-sm  dark:text-gray-400 hover:underline">+1 526 654 8965</span>
                            <span
                                class="block mt-2 text-sm  dark:text-gray-400 hover:underline">example@email.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="h-px my- border-none dark:bg-gray-700">

            <div>
                <p class="text-center  dark:text-gray-400">© Brand 2020 - All rights reserved</p>
            </div>
        </div>
</footer>

</body>

</html>