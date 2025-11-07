<header x-data="{ dark: false }"
        class="bg-white dark:bg-gray-800 shadow flex items-center justify-between px-6 py-4">
    
        <div class="flex items-center space-x-4 w-full">
            <!-- Mobile hamburger -->
            <button @click="$dispatch('toggle-mobile-sidebar')" class="text-gray-700 dark:text-gray-200 text-2xl focus:outline-none md:hidden">
                ☰
            </button>

            <!-- Form Pencarian -->
            <form action="{{ route('admin.home.index') }}" method="GET" class="flex w-full md:w-1/2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari ..." 
                    value="{{ request('search') }}"
                    class="w-full border rounded-l-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600">
                    Cari
                </button>
            </form>

        </div>


    <div class="flex items-center space-x-4">
        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md font-medium">
                Logout
            </button>
        </form>
    </div>
</header>

