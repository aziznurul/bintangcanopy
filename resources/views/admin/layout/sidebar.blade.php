<div id="sidebar" x-data="{ collapsed: false, mobileOpen: false }"
     :class="collapsed ? 'w-20' : 'w-64'"
     class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 shadow-lg
            fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 md:relative z-40 transition-all duration-300">

    <!-- Logo & Hamburger -->
    <div class="p-4 flex items-center justify-between border-b dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <!-- Logo selalu muncul -->
            <img src="{{ asset('asset/images/BC.png') }}" alt="Logo"
                 class="object-contain transition-all duration-300"
                 :class="collapsed ? 'h-8 w-8' : 'h-8 w-8'">
            <!-- Nama sidebar hilang saat collapse -->
            <span x-show="!collapsed" class="font-bold text-xl text-gray-800 dark:text-gray-100 transition-all duration-300">
                Bintang Canopy
            </span>
        </div>

        <!-- Desktop collapse toggle -->
        <button @click="collapsed = !collapsed" class="text-gray-700 dark:text-gray-200 focus:outline-none hidden md:block">
            ☰
        </button>
        <!-- Mobile close toggle -->
        <button @click="mobileOpen = false" class="text-gray-700 dark:text-gray-200 focus:outline-none md:hidden">
            ✕
        </button>
    </div>

    <!-- Menu -->
    <nav class="flex-1 px-2 py-4 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <!-- Icon Dashboard / Speedometer -->
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 6v6m0 0h-6m6 0h6"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Dashboard</span>
        </a>

        <!-- Home -->
        <a href="{{ route('admin.home.index') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V12H9v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9z"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Home</span>
        </a>

        <!-- About -->
        <a href="{{ route('admin.about.index') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M12 4h9m-9 8h9M3 6h9m-9 8h9"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">About</span>
        </a>

        <!-- Services -->
        <a href="{{ route('admin.services.index') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.7 10a4.5 4.5 0 0 1-1.4 2.2l-2.1 2.1a4.5 4.5 0 1 1-2.1-2.1l2.1-2.1a4.5 4.5 0 0 1 2.2-1.4l2 2z"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Services</span>
        </a>

        <!-- Portfolio -->
        <a href="{{ route('admin.portfolio.index') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10v10H7z"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Portfolio</span>
        </a>

        <!-- Mitra & Cabang -->
        <a href="{{ route('admin.mitra.index') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 22V12h6v10"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Mitra & Cabang</span>
        </a>

        <!-- Contact -->
        <a href="{{ route('admin.contact.index') }}" class="flex items-center px-2 py-2 rounded-md text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 0 1 2-2h2.5a2 2 0 0 1 2 1.7l.5 2a2 2 0 0 1-1.3 2.3l-1.7.7a16.01 16.01 0 0 0 6.1 6.1l.7-1.7a2 2 0 0 1 2.3-1.3l2 .5A2 2 0 0 1 21 16.5V19a2 2 0 0 1-2 2h-1c-9.941 0-18-8.059-18-18V5z"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Contact</span>
        </a>
    </nav>
    <!-- Pengaturan Website -->
<div x-data="{ open: false }">
    <button @click="open = !open" 
            class="flex items-center justify-between w-full px-2 py-2 text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 rounded-md transition-all duration-300">
        <div class="flex items-center space-x-2">
            <!-- Icon Gear -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M11.049 2.927c.3-.921 1.603-.921 1.902 0a1.724 1.724 0 002.516 1.057 1.724 1.724 0 011.057 2.516c.921.3.921 1.603 0 1.902a1.724 1.724 0 00-1.057 2.516 1.724 1.724 0 01-2.516 1.057c-.3.921-1.603.921-1.902 0a1.724 1.724 0 00-2.516-1.057 1.724 1.724 0 01-1.057-2.516c-.921-.3-.921-1.603 0-1.902a1.724 1.724 0 001.057-2.516 1.724 1.724 0 012.516-1.057z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span x-show="!collapsed" class="ml-3 transition-all duration-300">Pengaturan Website</span>
        </div>
        <svg x-show="!collapsed" xmlns="http://www.w3.org/2000/svg" :class="{'rotate-180': open}" class="w-4 h-4 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <!-- Submenu -->
    <div x-show="open" x-collapse class="ml-8 mt-1 space-y-1">
        <a href="{{ route('admin.seo.index') }}" class="block px-2 py-1 text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 rounded-md transition-all duration-300" x-show="!collapsed">SEO</a>
        <a href="{{ route('admin.tagline.index') }}" class="block px-2 py-1 text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 rounded-md transition-all duration-300" x-show="!collapsed">Tagline</a>
        <a href="{{ route('admin.logo.index') }}" class="block px-2 py-1 text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 rounded-md transition-all duration-300" x-show="!collapsed">Ganti Logo</a>
        <a href="{{ route('admin.social_media.index') }}" class="block px-2 py-1 text-gray-700 dark:text-gray-200 hover:bg-indigo-100 dark:hover:bg-indigo-700 rounded-md transition-all duration-300" x-show="!collapsed">Sosial Media</a>
    </div>
</div>

</div>

