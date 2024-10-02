<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navbar with Search Bar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
  
  <!-- Navbar -->
  <nav class="bg-[#9ba7d7] border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      
      <!-- Application Logo / Name on the left -->
      <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">SiapAda</span>
      </a>

      <!-- Nav Links in the center (Responsive) -->
      <div class="flex-grow hidden md:flex justify-center" id="navbar-default">
        <ul class="font-medium flex flex-col md:flex-row md:space-x-8 rtl:space-x-reverse items-center">
          <li>
            <a href="/home" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" aria-current="page">Home</a>
          </li>
          <li>
            <a href="/cari_kerja" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Mencari Pekerjaan</a>
          </li>
          <li>
            <a href="/tentang_kami" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tentang Kami</a>
          </li>
          <li>
            <a href="/berita" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Berita</a>
          </li>
        </ul>
      </div>

      <!-- Avatar and User Name on the right -->
      <div class="hidden md:flex items-center space-x-3">
        <div class="relative">
          <img src="https://asset.kompas.com/crops/3QcbIRoKn11P2lvzr4Ec5C26CGE=/0x0:0x0/750x500/data/photo/buku/61e6a27535e52.jpg" alt="User Avatar" class="h-10 w-10 rounded-full">
        </div>
        <span class="text-white dark:text-white">{{ auth()->user()->name }}</span>
      </div>

      <!-- Burger Menu Button for mobile -->
      <button id="burgerBtn" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
      
      <!-- Responsive Nav Links and Avatar (For Mobile View) -->
      <div class="hidden w-full md:hidden" id="navbar-default-mobile">
        <ul class="font-medium flex flex-col p-4 border border-gray-100 rounded-lg bg-[#9ba7d7] dark:bg-gray-800 dark:border-gray-700">
          <li>
            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
          </li>
          <li>
            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
          </li>
          <li>
            <div class="block flex items-center space-x-3">
              <div class="relative">
                <img src="https://asset.kompas.com/crops/3QcbIRoKn11P2lvzr4Ec5C26CGE=/0x0:0x0/750x500/data/photo/buku/61e6a27535e52.jpg" alt="User Avatar" class="h-10 w-10 rounded-full">
              </div>
              <span class="text-white dark:text-white">{{ auth()->user()->name }}</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Search Bar -->
  <div class="bg-gray-100 dark:bg-gray-800 p-4">
    <div class="max-w-screen-xl mx-auto">
      <form class="flex items-center justify-center">
        <input type="text" class="w-full md:w-2/3 lg:w-1/2 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-l-md focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" placeholder="Cari sesuatu...">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">Search</button>
      </form>
    </div>
  </div>

  <script>
    // JavaScript for handling the burger menu toggle
    const burgerBtn = document.getElementById('burgerBtn');
    const navbarDefault = document.getElementById('navbar-default-mobile');

    if (burgerBtn && navbarDefault) {
      burgerBtn.addEventListener('click', () => {
        navbarDefault.classList.toggle('hidden');
      });
    }
  </script>

</body>
</html>
