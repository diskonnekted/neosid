@php
    $alt_slug = PREMIUM ? 'artikel' : 'first';

    // Dummy navigation to mimic Sijenggung Banjarnegara
    $menus_to_render = menu_tema() ?: [
        [
            'nama' => 'Profil Desa',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'Sejarah Desa', 'link_url' => site_url('artikel/sejarah-desa')],
                ['nama' => 'Batas Desa', 'link_url' => site_url('artikel/batas-desa')],
                ['nama' => 'Peta Desa', 'link_url' => site_url('peta')],
                ['nama' => 'Galeri', 'link_url' => site_url('galeri')],
            ]
        ],
        [
            'nama' => 'Pemerintahan',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'Visi dan Misi', 'link_url' => site_url('artikel/visi-dan-misi')],
                ['nama' => 'Pemerintah Desa', 'link_url' => site_url('artikel/pemerintah-desa')],
                ['nama' => 'BPD', 'link_url' => site_url('data-lembaga/bpd')],
                ['nama' => 'Pengaduan', 'link_url' => site_url('pengaduan')],
            ]
        ],
        [
            'nama' => 'Lembaga',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'RT RW', 'link_url' => site_url('artikel/rt-rw')],
                ['nama' => 'PKK', 'link_url' => site_url('artikel/pkk')],
                ['nama' => 'Karang Taruna', 'link_url' => site_url('artikel/karang-taruna')],
                ['nama' => 'BUMDes', 'link_url' => site_url('artikel/bumdes')],
            ]
        ],
        [
            'nama' => 'Data Monografi',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'Wilayah Administratif', 'link_url' => site_url('data-wilayah')],
                ['nama' => 'Pendidikan', 'link_url' => site_url('data-statistik/pendidikan')],
                ['nama' => 'Pekerjaan', 'link_url' => site_url('data-statistik/pekerjaan')],
                ['nama' => 'Agama', 'link_url' => site_url('data-statistik/agama')],
            ]
        ],
        [
            'nama' => 'IDM',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'IDM 2023', 'link_url' => site_url('status-idm/2023')],
                ['nama' => 'IDM 2024', 'link_url' => site_url('status-idm/2024')],
            ]
        ],
        [
            'nama' => 'Desa Cantik',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'Kegiatan Desa Cantik', 'link_url' => site_url('artikel/desa-cantik')],
                ['nama' => 'Galeri Desa Cantik', 'link_url' => site_url('artikel/galeri-desa-cantik')],
                ['nama' => 'Statistik Desa 2024', 'link_url' => site_url('data-wilayah')],
            ]
        ],
        [
            'nama' => 'PPID',
            'link_url' => '#!',
            'childrens' => [
                ['nama' => 'Profil Singkat', 'link_url' => site_url('artikel/profil-ppid')],
                ['nama' => 'Visi & Misi PPID', 'link_url' => site_url('artikel/visi-misi-ppid')],
                ['nama' => 'Informasi Publik', 'link_url' => site_url('informasi-publik')],
            ]
        ]
    ];
@endphp

{{-- Topbar --}}
<div class="fresh-topbar">
    <div class="container">
        <span>
            <i class="fa fa-map-marker-alt" style="margin-right:4px"></i>
            {{ ucfirst(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }},
            {{ ucfirst(setting('sebutan_kecamatan_singkat')) }} {{ ucwords($desa['nama_kecamatan']) }},
            {{ ucfirst(setting('sebutan_kabupaten_singkat')) }} {{ ucwords($desa['nama_kabupaten']) }}
        </span>
        <span style="display:flex;gap:12px;align-items:center">
            @if (setting('layanan_mandiri') == 1)
                <a href="{{ site_url('layanan-mandiri') }}">
                    <i class="fa fa-user-circle" style="margin-right:4px"></i>Layanan Mandiri
                </a>
            @endif
            <a href="{{ site_url('siteman') }}">
                <i class="fa fa-lock" style="margin-right:4px"></i>Login Admin
            </a>
        </span>
    </div>
</div>

{{-- Navbar --}}
<nav class="fresh-navbar" x-data="{ menuOpen: false }">
    <div class="container">
        {{-- Brand --}}
        <a href="{{ site_url('/') }}" class="fresh-brand">
            <img src="{{ gambar_desa($desa['logo']) }}" alt="{{ $desa['nama_desa'] }}">
            <span>{{ ucwords($desa['nama_desa']) }}</span>
        </a>

        {{-- Desktop Menu --}}
        <ul class="fresh-nav">
            <li>
                <a href="{{ site_url('/') }}">
                    <i class="fa fa-house"></i> Beranda
                </a>
            </li>
            @if ($menus_to_render)
                @foreach ($menus_to_render as $menu)
                    @php $has_dropdown = count($menu['childrens'] ?? []) > 0 @endphp
                    <li @if($has_dropdown) x-data="{open:false}" @mouseover="open=true" @mouseleave="open=false" @endif class="relative group">
                        @php $menu_link = $has_dropdown ? '#!' : $menu['link_url'] @endphp
                        <a href="{{ $menu_link }}"
                           @if($has_dropdown) @click.prevent="open=!open" @endif>
                            {!! $menu['nama'] !!}
                            @if($has_dropdown)
                                <i class="fa fa-chevron-down" style="font-size:11px"></i>
                            @endif
                        </a>
                        @if($has_dropdown)
                            <ul class="fresh-dropdown" x-show="open" x-transition @mouseover="open=true" @mouseleave="open=false">
                                @foreach($menu['childrens'] as $child)
                                    <li><a href="{{ $child['link_url'] }}">{!! $child['nama'] !!}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
        </ul>

        {{-- Nav Actions --}}
        <div class="fresh-nav-actions">
            <button class="fresh-btn fresh-btn-ghost fresh-hamburger" @click="menuOpen = !menuOpen" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div class="fresh-mobile-nav" :class="{ 'open': menuOpen }">
        <a href="{{ site_url('/') }}"><i class="fa fa-house" style="width:20px"></i> Beranda</a>
        @if ($menus_to_render)
            @foreach ($menus_to_render as $menu)
                @php $has_dropdown = count($menu['childrens'] ?? []) > 0 @endphp
                @if($has_dropdown)
                    <div x-data="{sub:false}">
                        <a href="#" @click.prevent="sub=!sub" style="justify-content:space-between">
                            {!! $menu['nama'] !!} <i class="fa fa-chevron-down" style="font-size:11px"></i>
                        </a>
                        <div x-show="sub" style="padding-left:16px">
                            @foreach($menu['childrens'] as $child)
                                <a href="{{ $child['link_url'] }}">{!! $child['nama'] !!}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $menu['link_url'] }}">{!! $menu['nama'] !!}</a>
                @endif
            @endforeach
        @endif
        @if(setting('layanan_mandiri') == 1)
            <a href="{{ site_url('layanan-mandiri') }}"><i class="fa fa-user-circle" style="width:20px"></i> Layanan Mandiri</a>
        @endif
        <a href="{{ site_url('siteman') }}"><i class="fa fa-lock" style="width:20px"></i> Login Admin</a>
    </div>
</nav>

{{-- Hero Banner --}}
<div class="fresh-hero" style="background: linear-gradient(rgba(30, 41, 59, 0.55), rgba(30, 41, 59, 0.85)), url('{{ base_url('assets/files/logo/latar_website.jpg') }}') center/cover no-repeat !important; min-height: 280px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 56px 20px;">
    <img src="{{ gambar_desa($desa['logo']) }}" alt="{{ $desa['nama_desa'] }}" class="fresh-hero-logo">
    <h1>{{ ucwords($desa['nama_desa']) }}</h1>
    <p>
        {{ ucfirst(setting('sebutan_kecamatan_singkat')) }} {{ ucwords($desa['nama_kecamatan']) }},
        {{ ucfirst(setting('sebutan_kabupaten_singkat')) }} {{ ucwords($desa['nama_kabupaten']) }},
        Provinsi {{ ucwords($desa['nama_propinsi']) }}
    </p>
</div>

{{-- Ticker --}}
@if ($teks_berjalan)
<div class="fresh-ticker">
    <span class="fresh-ticker-label"><i class="fa fa-bullhorn"></i> INFO</span>
    <marquee onmouseover="this.stop();" onmouseout="this.start();" scrollamount="4">
        @foreach ($teks_berjalan as $marquee)
            <span style="margin-right:40px">
                {{ $marquee['teks'] }}
                @if (trim($marquee['tautan']) && $marquee['judul_tautan'])
                    <a href="{{ $marquee['tautan'] }}" style="color:#fde68a;text-decoration:underline">{{ $marquee['judul_tautan'] }}</a>
                @endif
            </span>
        @endforeach
    </marquee>
</div>
@endif
