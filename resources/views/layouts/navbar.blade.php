<header class="bg-white shadow fixed w-full z-50">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('storage/' . ($logo->path ?? 'default-logo.png')) }}" alt="Logo" class="h-10">
            <span class="font-bold text-lg">Bintang Canopy</span>
        </div>

        <!-- Menu di tengah -->
        <nav class="hidden md:flex space-x-6 mx-auto">
            <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
            <a href="{{ url('/tentang') }}" class="hover:text-blue-600">Tentang Kami</a>
            <a href="{{ url('/layanan') }}" class="hover:text-blue-600">Layanan</a>
            <a href="{{ url('/portfolio') }}" class="hover:text-blue-600">Portfolio</a>
            <a href="{{ url('/mitra') }}" class="hover:text-blue-600">Cabang & Mitra</a>
            <a href="{{ url('/kontak') }}" class="hover:text-blue-600">Kontak</a>
        </nav>

        <!-- Tombol Login di kanan -->
        <div class="hidden md:flex">
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Login
            </a>
        </div>
    </div>
</header>
