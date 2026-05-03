<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header bg-primary text-white p-4 rounded-t-xl flex items-center justify-between">
        <h3 class="box-title text-base font-bold flex items-center gap-2" style="color: #ffffff !important;">
            <i class="fas fa-folder-open mr-1"></i> {{ $judul_widget }}
        </h3>
    </div>
    <div class="box-body p-4 bg-white border border-gray-100 rounded-b-xl shadow-sm">
        <div class="divide-y divide-gray-100">
            @foreach (array_slice($arsip_terkini ?? [], 0, 6) as $arsip)
                <div class="flex gap-3 py-3 items-center">
                    <a href="{{ site_url('artikel/' . buat_slug($arsip)) }}" class="w-12 h-12 flex-shrink-0 overflow-hidden rounded-lg block border border-gray-100">
                        @if (is_file(LOKASI_FOTO_ARTIKEL . "kecil_$arsip[gambar]"))
                            <img class="w-full h-full object-cover rounded-lg" src="{{ base_url(LOKASI_FOTO_ARTIKEL . "sedang_$arsip[gambar]") }}" />
                        @else
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('images/404-image-not-found.jpg') }}" />
                        @endif
                    </a>
                    <div class="flex flex-col justify-center gap-1 flex-1">
                        <a href="{{ site_url('artikel/' . buat_slug($arsip)) }}" class="block text-sm font-bold text-gray-800 hover:text-primary leading-snug line-clamp-2">{{ $arsip['judul'] }}</a>
                        <span class="text-xs text-gray-400"><i class="fas fa-calendar-alt mr-1"></i> {{ tgl_indo($arsip['tgl_upload']) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
