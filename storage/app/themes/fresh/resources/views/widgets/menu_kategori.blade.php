<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

@php
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

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fas fa-bars mr-1"></i>{{ $judul_widget }}</h3>
    </div>
    <div class="box-body content">
        <ul class="divide-y divide-gray-100">
            @if(isset($menu_kiri))
                @foreach ($menu_kiri as $data)
                    <li>
                        <a href="{{ site_url('artikel/kategori/' . $data['slug']) }}" class="py-2 px-1 block text-sm font-medium text-slate-700 hover:text-blue-600 transition">
                            {{ $data['kategori'] }}
                        </a>
                    </li>
                @endforeach
            @endif
            @foreach ($menus_to_render as $menu)
                @php $has_dropdown = count($menu['childrens'] ?? []) > 0 @endphp
                <li @if($has_dropdown) x-data="{ open: false }" @endif class="py-1">
                    <div class="flex items-center justify-between">
                        <a href="{{ $has_dropdown ? '#!' : $menu['link_url'] }}" 
                           @if($has_dropdown) @click.prevent="open = !open" @endif
                           class="py-2 px-1 text-slate-700 hover:text-blue-600 font-medium text-sm flex-1 block transition">
                            {!! $menu['nama'] !!}
                        </a>
                        @if ($has_dropdown)
                            <button @click="open = !open" class="p-2 text-slate-400 hover:text-blue-600 transition-transform duration-200" :class="{'rotate-180': open}">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                        @endif
                    </div>
                    @if ($has_dropdown)
                        <ul x-show="open" x-transition class="pl-4 mt-1 border-l-2 border-gray-100 space-y-1">
                            @foreach ($menu['childrens'] as $child)
                                <li>
                                    <a href="{{ $child['link_url'] }}" class="py-1.5 px-1 block text-sm text-slate-600 hover:text-blue-600 transition">
                                        {!! $child['nama'] !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>

