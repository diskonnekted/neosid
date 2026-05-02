@extends('theme::layouts.right-sidebar')
@php
    $title = !empty($judul_kategori) ? $judul_kategori : 'Artikel Terkini';
    $slug = 'terkini';
    if (is_array($title)) {
        $slug = $title['slug'];
        $title = $title['kategori'];
    }
@endphp
@section('content')
    <!-- Tampilkan slider hanya di halaman awal. Tidak tampil pada daftar artikel di halaman kategori atau halaman selanjutnya serta halaman hasil pencarian -->
    @if (empty($cari) && count($slider_gambar ?? []) > 0 && request()->segment(2) != 'kategori' && (request()->segment(2) !== 'index' && request()->segment(1) !== 'index'))
        @include('theme::partials.slider')
    @endif

    <!-- Judul Kategori / Artikel Terkini -->
    <div class="flex justify-between items-center w-full">
        <h3 class="text-h4 text-primary-200">{{ $title }}</h3>
        <a href="{{ site_url('arsip') }}" class="text-sm hover:text-primary-100">Indeks <i class="fas fa-chevron-right ml-1"></i></a>
    </div>

    @if ($artikel->count() > 0)
        @php
            $artikel_2_kolom = $artikel->slice(0, 4);
            $artikel_3_kolom = $artikel->slice(4, 6);
            if ($artikel_3_kolom->isEmpty() && $artikel->count() > 0) {
                $artikel_3_kolom = $artikel->slice(0, 3);
            }
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
            @foreach ($artikel_2_kolom as $post)
                @include('theme::partials.artikel.list', ['post' => $post])
            @endforeach
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 my-6">
            @foreach ($artikel_3_kolom as $post)
                @include('theme::partials.artikel.list', ['post' => $post])
            @endforeach
        </div>

        <div class="mt-8 mb-6">
            @include("theme::widgets.keuangan", ['judul_widget' => 'Grafik Keuangan APBDes 2026'])
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div>
                @includeIf("theme::widgets.peta_wilayah_desa", ['judul_widget' => 'Peta Wilayah Desa'])
            </div>
            <div>
                @includeIf("theme::widgets.peta_lokasi_kantor", ['judul_widget' => 'Peta Lokasi Kantor'])
            </div>
            <div>
                @includeIf("theme::widgets.statistik_pengunjung", ['judul_widget' => 'Statistik Pengunjung'])
            </div>
        </div>

        <div class="pagination space-y-1 flex-wrap w-full">
            @include('theme::commons.paging', ['paging_page' => $paging_page])
        </div>
    @else
        @include('theme::partials.artikel.empty', ['title' => $title])
    @endif
@endsection
