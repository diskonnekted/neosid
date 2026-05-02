<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

@php
    $dummy_sosmed = [
        ['nama' => 'Facebook', 'link' => 'https://facebook.com', 'icon' => 'fab fa-facebook-f', 'color' => '#1877F2'],
        ['nama' => 'Instagram', 'link' => 'https://instagram.com', 'icon' => 'fab fa-instagram', 'color' => '#E4405F'],
        ['nama' => 'YouTube', 'link' => 'https://youtube.com', 'icon' => 'fab fa-youtube', 'color' => '#CD201F'],
        ['nama' => 'WhatsApp', 'link' => 'https://wa.me/62812345678', 'icon' => 'fab fa-whatsapp', 'color' => '#25D366'],
        ['nama' => 'TikTok', 'link' => 'https://tiktok.com', 'icon' => 'fab fa-tiktok', 'color' => '#000000'],
    ];
@endphp

<div class="box box-primary box-solid mb-6">
    <div class="box-header bg-primary text-white p-4 rounded-t-xl flex items-center justify-between">
        <h3 class="box-title text-base font-bold flex items-center gap-2" style="color: #ffffff !important;">
            <i class="fas fa-share-alt mr-1"></i> {{ $judul_widget ?? 'Media Sosial' }}
        </h3>
    </div>
    <div class="box-body p-4 bg-white border border-gray-100 rounded-b-xl shadow-sm flex flex-wrap gap-3 justify-center">
        @foreach ($dummy_sosmed as $data)
            <a href="{{ $data['link'] }}" target="_blank" rel="noopener noreferrer" 
               class="w-10 h-10 rounded-full flex items-center justify-center text-white hover:opacity-85 hover:scale-105 transition-all shadow-md"
               style="background-color: {{ $data['color'] }};" title="{{ $data['nama'] }}">
                <i class="{{ $data['icon'] }} text-lg"></i>
            </a>
        @endforeach
    </div>
</div>
