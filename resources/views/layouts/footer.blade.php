<footer class="bg-gray-800 text-white mt-10 rounded-tl-[15px] rounded-tr-[15px]">
    <div class="container mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Logo dan Hak Cipta -->
        <div>
            <div class="flex items-center space-x-2 mb-4">
                <img src="{{ asset('storage/' . ($logo->path ?? 'default-logo.png')) }}" alt="Logo" class="h-8">
                <span class="font-bold text-lg">Bintang Canopy</span>
            </div>
            <p class="mb-2">© {{ date('Y') }} Bintang Canopy. All rights reserved.</p>
            <p>Hak cipta website & konten.</p>
        </div>

        <!-- Menu dan Sosial Media -->
        <div>
            <!-- Menu horizontal -->
            <ul class="flex flex-wrap gap-4">
                <li><a href="{{ url('/') }}" class="hover:text-blue-400">Beranda</a></li>
                <li><a href="#about" class="hover:text-blue-400">Tentang Kami</a></li>
                <li><a href="#services" class="hover:text-blue-400">Layanan</a></li>
                <li><a href="#portfolio" class="hover:text-blue-400">Portfolio</a></li>
                <li><a href="#partners" class="hover:text-blue-400">Cabang & Mitra</a></li>
                <li><a href="#contact" class="hover:text-blue-400">Kontak</a></li>
            </ul>

            <!-- Sosial Media -->
            <div class="flex space-x-4 mt-4">
                @if($social)
                    @if($social->whatsapp)
                        <a href="https://wa.me/{{ $social->whatsapp }}" target="_blank" class="transition transform hover:scale-110">
                            <img src="{{ asset('asset/images/whatsapp.png') }}" alt="WhatsApp" class="h-6 w-6">
                        </a>
                    @endif
                    @if($social->instagram)
                        <a href="https://instagram.com/{{ $social->instagram }}" target="_blank" class="transition transform hover:scale-110">
                            <img src="{{ asset('asset/images/instagram.png') }}" alt="Instagram" class="h-6 w-6">
                        </a>
                    @endif
                    @if($social->tiktok)
                        <a href="https://tiktok.com/{{ $social->tiktok }}" target="_blank" class="transition transform hover:scale-110">
                            <img src="{{ asset('asset/images/tiktok.png') }}" alt="TikTok" class="h-6 w-6">
                        </a>
                    @endif
                    @if($social->youtube)
                        <a href="https://youtube.com/{{ $social->youtube }}" target="_blank" class="transition transform hover:scale-110">
                            <img src="{{ asset('asset/images/youtube.png') }}" alt="YouTube" class="h-6 w-6">
                        </a>
                    @endif
                @endif
            </div>

        </div>
    </div>
</footer>


@if($social && $social->whatsapp) <a href="https://wa.me/{{ $social->whatsapp }}" target="_blank"
     class="fixed right-4 bottom-4 bg-white border border-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center animate-bounce"
     title="Hubungi Kami via WhatsApp"> <img src="{{ asset('asset/images/whatsapp.png') }}" alt="WhatsApp" class="w-8 h-8"> </a>
@endif



<!-- Swiper CSS & JS -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        autoplay: { delay: 5000, disableOnInteraction: false },
        on: {
            slideChange: function () {
                // ambil data slide aktif
                const activeIndex = this.realIndex;
                const slidesData = @json($slides);

                // update teks
                const titleEl = document.getElementById('hero-title');
                const descEl = document.getElementById('hero-desc');

                // reset animasi
                titleEl.classList.remove('translate-x-0','opacity-100');
                descEl.classList.remove('translate-x-0','opacity-100');

                // set teks baru
                titleEl.textContent = slidesData[activeIndex]?.title || 'Judul Hero';
                descEl.textContent = slidesData[activeIndex]?.description || 'Deskripsi singkat hero di sini.';

                // trigger animasi
                setTimeout(() => {
                    titleEl.classList.add('translate-x-0','opacity-100');
                    descEl.classList.add('translate-x-0','opacity-100');
                }, 50);
            }
        }
    });

    // trigger animasi awal
    setTimeout(() => {
        document.getElementById('hero-title').classList.add('translate-x-0','opacity-100');
        document.getElementById('hero-desc').classList.add('translate-x-0','opacity-100');
    }, 100);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper', {
        loop: false,
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: { 
            el: '.swiper-pagination', 
            clickable: true 
        },
        navigation: { 
            nextEl: '.swiper-button-next', 
            prevEl: '.swiper-button-prev' 
        },
        autoplay: { 
            delay: 5000, 
            disableOnInteraction: false 
        },
    });
});
</script>

