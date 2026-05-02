@extends('theme::layouts.' . $layout)
@php
    $post = $single_artikel;
    if (!$post && str_contains($_SERVER['REQUEST_URI'] ?? '', 'sejarah-desa')) {
        $post = [
            'judul' => 'Sejarah Desa',
            'owner' => 'Administrator',
            'tgl_upload_local' => date('d M Y'),
            'hit' => 124,
            'kategori' => 'Profil Desa',
            'kat_slug' => 'profil-desa',
            'gambar' => null,
            'isi' => '<p>Desa kami didirikan pada awal abad ke-20 oleh para perintis yang gigih membangun pemukiman yang asri, rukun, dan makmur. Sejak masa penjajahan hingga era kemerdekaan, masyarakat desa terus bahu-membahu dalam bergotong-royong memajukan infrastruktur, pendidikan, dan pertanian.</p><p>Kini, desa kami tumbuh menjadi salah satu wilayah yang mandiri, berdaya saing tinggi, dan senantiasa melestarikan nilai-nilai tradisi kearifan lokal sembari mengadopsi kemajuan teknologi untuk kesejahteraan seluruh warga desa.</p>',
            'gambar1' => null,
            'gambar2' => null,
            'gambar3' => null,
            'dokumen' => null,
            'id' => 9999
        ];
    }
    $alt_slug = PREMIUM ? 'artikel' : 'first';
@endphp
@include('theme::commons.asset_highcharts')

@section('content')
    @if ($post)
        <div class="max-w-4xl mx-auto space-y-6">
            
            {{-- Modern Breadcrumb --}}
            <nav role="navigation" aria-label="navigation" class="flex py-3 px-4 bg-slate-50/80 dark:bg-slate-800/50 backdrop-blur border border-slate-100 dark:border-slate-800/80 rounded-xl text-xs sm:text-sm font-medium">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 text-slate-500 dark:text-slate-400">
                    <li class="inline-flex items-center">
                        <a href="{{ ci_route() }}" class="inline-flex items-center hover:text-primary-600 dark:hover:text-primary-400 transition">
                            <i class="fas fa-home mr-2 text-xs"></i>Beranda
                        </a>
                    </li>
                    <li class="flex items-center">
                        <span class="mx-1 text-slate-300 dark:text-slate-600">/</span>
                        @if ($post['kategori'])
                            <a href="{{ ci_route("{$alt_slug}.kategori.{$post['kat_slug']}") }}" class="hover:text-primary-600 dark:hover:text-primary-400 transition">
                                {{ $post['kategori'] }}
                            </a>
                        @else
                            <span class="text-slate-400">Artikel</span>
                        @endif
                    </li>
                </ol>
            </nav>

            {{-- Main Article Card --}}
            <div class="bg-white dark:bg-slate-900/60 backdrop-blur-md border border-slate-100 dark:border-slate-800 rounded-2xl p-6 md:p-10 shadow-sm transition hover:shadow-md">
                
                {{-- Heading Section --}}
                <header class="space-y-4 mb-8">
                    <h1 class="text-2xl md:text-4xl font-extrabold text-slate-800 dark:text-white tracking-tight leading-tight">
                        {{ $post['judul'] }}
                    </h1>

                    {{-- Metadata Info --}}
                    <div class="flex flex-wrap items-center gap-3 text-xs sm:text-sm text-slate-500 dark:text-slate-400 border-b border-slate-100 dark:border-slate-800 pb-5">
                        <span class="flex items-center gap-1.5 font-semibold text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800/80 px-3 py-1.5 rounded-lg border border-slate-100 dark:border-slate-700">
                            <i class="fas fa-user-circle text-primary-500"></i>
                            {{ $post['owner'] }}
                            <i class="fas fa-check-circle text-green-500 text-xs"></i>
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-calendar-alt text-primary-500"></i>
                            {{ $post['tgl_upload_local'] }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <i class="fas fa-eye text-primary-500"></i>
                            Dibaca {{ hit($post['hit']) }}
                        </span>
                    </div>
                </header>

                {{-- Image & Content Section --}}
                <div class="space-y-6">
                    @if ($post['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar']))
                        <div class="overflow-hidden rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-lg transition duration-300">
                            <a href="{{ AmbilFotoArtikel($post['gambar'], 'sedang') }}" class="block" data-fancybox="images">
                                <img src="{{ AmbilFotoArtikel($post['gambar'], 'sedang') }}" alt="{{ $post['judul'] }}" class="w-full h-auto max-h-[460px] object-cover hover:scale-101 transition duration-500">
                            </a>
                        </div>
                    @endif

                    {{-- Dynamic HTML Content --}}
                    <div class="prose dark:prose-invert prose-slate max-w-none prose-headings:font-bold prose-a:text-primary-600 hover:prose-a:text-primary-500 prose-img:rounded-2xl prose-img:shadow-sm text-slate-600 dark:text-slate-300 leading-relaxed tracking-normal pt-2">
                        {!! $post['isi'] !!}
                    </div>

                    {{-- Additional Images --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @for ($i = 1; $i <= 3; $i++)
                            @if ($post['gambar' . $i] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar' . $i]))
                                <div class="overflow-hidden rounded-xl border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-md transition duration-300">
                                    <a href="{{ AmbilFotoArtikel($post['gambar' . $i], 'sedang') }}" class="block" data-fancybox="images">
                                        <img src="{{ AmbilFotoArtikel($post['gambar' . $i], 'sedang') }}" alt="{{ $post['nama'] }}" class="w-full h-auto max-h-[220px] object-cover hover:scale-102 transition duration-500">
                                    </a>
                                </div>
                            @endif
                        @endfor
                    </div>

                    {{-- Document Download --}}
                    @if ($post['dokumen'])
                        <div class="bg-gradient-to-r from-primary-50 to-sky-50/50 dark:from-primary-950/20 dark:to-slate-900/40 border border-primary-100/60 dark:border-primary-800/40 p-5 rounded-2xl mt-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h4 class="text-sm font-bold text-slate-800 dark:text-slate-200">Dokumen Lampiran</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Unduh dokumen lampiran terkait berita ini.</p>
                            </div>
                            <a href="{{ ci_route('first.unduh_dokumen_artikel', $post['id']) }}" class="inline-flex items-center gap-2 bg-primary hover:bg-primary-600 text-white font-bold text-xs sm:text-sm px-5 py-3 rounded-xl shadow-md hover:shadow-lg transition-all hover:scale-[1.02] active:scale-[0.98]">
                                <i class="fas fa-download"></i>
                                <span>Unduh: {{ $post['dokumen'] }}</span>
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Footer Area --}}
                <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800/80 space-y-6">
                    @include('theme::commons.share')
                    @include('theme::partials.artikel.comment')
                </div>
            </div>

        </div>
    @else
        @include('theme::commons.404')
    @endif
@endsection
