<div id="topbar" class="w-full bg-white border-b border-gray-200 fixed top-0 left-0 z-50 transition-transform duration-300">
    <div class="max-w-7xl mx-auto px-4 py-3 flex flex-col md:flex-row items-center justify-between gap-3">

        <!-- Left: Follow Us -->
        <div class="flex items-center gap-2 text-gray-600 text-sm font-medium">
            <span>Follow Us:</span>

            @if($social)
                @if($social->whatsapp)
                    <a href="https://wa.me/{{ $social->whatsapp }}" target="_blank" class="transition transform hover:scale-110">
                        <img src="{{ asset('asset/images/whatsapp.png') }}" alt="WhatsApp" class="h-5 w-5">
                    </a>
                @endif

                @if($social->instagram)
                    <a href="https://instagram.com/{{ $social->instagram }}" target="_blank" class="transition transform hover:scale-110">
                        <img src="{{ asset('asset/images/instagram.png') }}" alt="Instagram" class="h-5 w-5">
                    </a>
                @endif

                @if($social->tiktok)
                    <a href="https://tiktok.com/{{ $social->tiktok }}" target="_blank" class="transition transform hover:scale-110">
                        <img src="{{ asset('asset/images/tiktok.png') }}" alt="TikTok" class="h-5 w-5">
                    </a>
                @endif

                @if($social->youtube)
                    <a href="https://youtube.com/{{ $social->youtube }}" target="_blank" class="transition transform hover:scale-110">
                        <img src="{{ asset('asset/images/youtube.png') }}" alt="YouTube" class="h-5 w-5">
                    </a>
                @endif
            @endif
        </div>


        <!-- Center: Informasi Email & Jadwal Live -->
        <div class="w-full md:w-1/2 flex flex-col md:flex-row items-center justify-center gap-2 text-sm text-gray-700 font-medium">

            <!-- Email -->
            <div class="flex items-center gap-1">
                <span class="font-semibold">Email:</span>
                <span>info@example.com</span>
            </div>

            <!-- Separator desktop -->
            <span class="hidden md:inline">|</span>

            @php
                $now = \Carbon\Carbon::now('Asia/Jakarta');
            @endphp

            <!-- Tanggal Live -->
            <div class="flex items-center gap-1">
                <span class="font-semibold">Tanggal Live:</span>
                <span>{{ $now->format('d M Y') }}</span>
            </div>

            <span class="hidden md:inline">|</span>

            <!-- Jam Live Realtime -->
            <div class="flex items-center gap-1">
                <span class="font-semibold">Jam:</span>
                <span id="live-time">{{ $now->format('H:i:s') }} WIB</span>
            </div>

        </div>


        <!-- Right: Login Button -->
        <div class="hidden md:flex">
            <a href="{{ route('login') }}" 
                class="bg-white border border-gray-300 text-gray-800 px-4 py-2 rounded-full hover:bg-blue-600 hover:text-white transition-all duration-300 text-sm font-medium">
                Login
            </a>
        </div>

    </div>
</div>

<script>
function updateLiveTime() {
    const now = new Date();

    const h = String(now.getHours()).padStart(2, '0');
    const m = String(now.getMinutes()).padStart(2, '0');
    const s = String(now.getSeconds()).padStart(2, '0');

    document.getElementById('live-time').textContent = `${h}:${m}:${s} WIB`;
}

// Tampilkan langsung saat halaman dibuka
updateLiveTime();

// Update setiap detik
setInterval(updateLiveTime, 1000);
</script>
