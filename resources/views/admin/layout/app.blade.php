<!DOCTYPE html>
<html lang="en" class="dark" x-data>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bintang Canopy Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/BC.png') }}">

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class=" dark:bg-gray-900 font-sans antialiased">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('admin.layout.sidebar')

    {{-- Overlay for mobile --}}
    <div x-show="$refs.sidebar?.__x.$data.mobileOpen" 
         x-transition.opacity class="fixed inset-0 bg-black/50 z-30 md:hidden"></div>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col transition-all duration-300">
        {{-- Navbar --}}
        @include('admin.layout.navbar')

        <main class="flex-1 p-6 dark:bg-gray-900 transition-all duration-300">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', { mobileOpen: false });
    });

    // Listen for mobile toggle
    document.addEventListener('toggle-mobile-sidebar', () => {
        Alpine.store('sidebar').mobileOpen = !Alpine.store('sidebar').mobileOpen;
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });

    // Dark Mode toggle
    const darkModeToggle = document.getElementById('darkModeToggle');
    darkModeToggle?.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    });

    // Apply saved dark mode
    if (localStorage.theme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin ingin hapus slide ini?',
        text: "Data akan dihapus permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (e) {
        const form = this.closest('form');
        Swal.fire({
            title: 'Yakin hapus data ini?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>


</body>
</html>
