@php
    $social_icons = [
        'facebook'  => 'fa-facebook-f',
        'twitter'   => 'fa-twitter',
        'instagram' => 'fa-instagram',
        'telegram'  => 'fa-telegram',
        'whatsapp'  => 'fa-whatsapp',
        'youtube'   => 'fa-youtube',
        'tiktok'    => 'fa-tiktok',
    ];
@endphp

<button class="fresh-back-top" aria-label="Kembali ke atas">
    <i class="fa fa-chevron-up"></i>
</button>

<footer class="fresh-footer bg-slate-900 text-slate-300 py-12 mt-12 border-t border-slate-800">
    <div class="container max-w-7xl mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 pb-8 border-b border-slate-800">
            
            {{-- Bagian Logo & Info Desa --}}
            <div class="space-y-4">
                <a href="{{ site_url('/') }}" class="flex items-center gap-3 hover:opacity-90 transition-all">
                    <img src="{{ gambar_desa($desa['logo']) }}" alt="{{ $desa['nama_desa'] }}" class="w-14 h-14 object-contain">
                    <div>
                        <h4 class="text-white text-lg font-bold leading-tight">{{ ucwords($desa['nama_desa']) }}</h4>
                        <span class="text-xs text-slate-400 font-medium">Website Resmi Desa</span>
                    </div>
                </a>
                <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                    {{ ucfirst(setting('sebutan_kecamatan_singkat')) }} {{ ucwords($desa['nama_kecamatan']) }},
                    {{ ucfirst(setting('sebutan_kabupaten_singkat')) }} {{ ucwords($desa['nama_kabupaten']) }},
                    Provinsi {{ ucwords($desa['nama_propinsi']) }}
                </p>
                <div class="space-y-2 text-sm text-slate-400">
                    @if($desa['telepon'])
                        <p class="flex items-center gap-2"><i class="fa fa-phone text-primary-200"></i> {{ $desa['telepon'] }}</p>
                    @endif
                    @if($desa['email'])
                        <p class="flex items-center gap-2"><i class="fa fa-envelope text-primary-200"></i> {{ $desa['email'] }}</p>
                    @endif
                </div>
            </div>

            {{-- Bagian Menu Utama --}}
            <div>
                <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Menu Utama</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="{{ site_url('/') }}" class="hover:text-primary-100 transition">Beranda</a></li>
                    @if(menu_tema())
                        @foreach(array_slice(menu_tema(), 0, 5) as $menu)
                            <li><a href="{{ $menu['link_url'] }}" class="hover:text-primary-100 transition">{!! strip_tags($menu['nama']) !!}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>

            {{-- Bagian Layanan --}}
            <div>
                <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Layanan Desa</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    @if(setting('layanan_mandiri') == 1)
                        <li><a href="{{ site_url('layanan-mandiri') }}" class="hover:text-primary-100 transition">Layanan Mandiri</a></li>
                    @endif
                    <li><a href="{{ site_url('pengaduan') }}" class="hover:text-primary-100 transition">Pengaduan</a></li>
                    <li><a href="{{ site_url('galeri') }}" class="hover:text-primary-100 transition">Galeri Desa</a></li>
                    <li><a href="{{ site_url('peta') }}" class="hover:text-primary-100 transition">Peta Wilayah</a></li>
                    <li><a href="{{ site_url('siteman') }}" class="hover:text-primary-100 transition">Login Admin</a></li>
                </ul>
            </div>

            {{-- Bagian Media Sosial & Kontak --}}
            <div>
                <h4 class="text-white text-sm font-bold uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Ikuti Kami</h4>
                <p class="text-xs text-slate-400 mb-4 leading-relaxed">Terhubung dengan kami melalui platform media sosial resmi kami untuk informasi terkini.</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($sosmed as $social)
                        @if($social['link'])
                            @php $icon = $social_icons[strtolower($social['nama'])] ?? 'fa-globe' @endphp
                            <a href="{{ $social['link'] }}" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-primary-200 text-slate-300 hover:text-white flex items-center justify-center transition shadow-sm" target="_blank" rel="noopener" aria-label="{{ $social['nama'] }}">
                                <i class="fab {{ $icon }} text-base"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>

        {{-- Bagian Bottom Footer --}}
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 mt-6 text-xs text-slate-500 font-medium tracking-wide w-full">
            <span>
                &copy; {{ date('Y') }} {{ ucwords($desa['nama_desa']) }} &mdash; 
                Tema <strong class="text-primary-100">Fresh</strong> &bull;
                <a href="https://opensid.my.id" class="text-slate-400 hover:text-white transition" target="_blank">OpenSID {{ ambilVersi() }}</a>
            </span>
            <span class="flex items-center gap-1">
                Made with <i class="fa fa-heart text-red-500 animate-pulse"></i> for advanced public service.
            </span>
        </div>
    </div>
</footer>
