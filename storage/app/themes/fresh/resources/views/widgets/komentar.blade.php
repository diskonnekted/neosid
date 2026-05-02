<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

@php
    $dummy_komen = [
        [
            'komentar' => 'Informasi tentang program bantuan UMKM ini sangat jelas dan sangat membantu warga desa.',
            'owner' => 'Budi Santoso',
            'tgl_upload' => '2026-05-02 10:00:00',
            'judul' => 'Informasi UMKM'
        ],
        [
            'komentar' => 'Terima kasih atas pelayanan administrasi di kantor desa yang semakin cepat dan ramah.',
            'owner' => 'Siti Aminah',
            'tgl_upload' => '2026-05-02 09:30:00',
            'judul' => 'Layanan Desa'
        ],
        [
            'komentar' => 'Kegiatan gotong royong warga kemarin sangat luar biasa, semoga lingkungan desa tetap bersih.',
            'owner' => 'Ahmad Fauzi',
            'tgl_upload' => '2026-05-02 08:45:00',
            'judul' => 'Gotong Royong'
        ],
    ];
    $active_komen = !empty($komen) ? $komen : $dummy_komen;
@endphp

<div class="box box-primary box-solid mb-6">
    <div class="box-header bg-primary text-white p-4 rounded-t-xl flex items-center justify-between">
        <h3 class="box-title text-base font-bold flex items-center gap-2" style="color: #ffffff !important;">
            <i class="fa fa-comments mr-1"></i> {{ $judul_widget ?? 'Komentar Terkini' }}
        </h3>
    </div>
    <div class="box-body p-4 bg-white border border-gray-100 rounded-b-xl shadow-sm">
        <div class="divide-y divide-gray-100">
            @foreach (array_slice($active_komen, 0, 3) as $data)
                <div class="py-3 space-y-2">
                    <p class="text-sm italic text-gray-600 leading-relaxed">
                        <i class="fas fa-quote-left text-primary-200 opacity-30 mr-1"></i>
                        {{ !empty($data['komentar']) ? strip_tags($data['komentar']) : '' }}
                    </p>
                    <div class="flex justify-between items-center text-xs text-gray-500">
                        <span class="font-semibold text-primary"><i class="fas fa-user-circle mr-1"></i> {{ $data['owner'] }}</span>
                        <span><i class="fas fa-clock mr-1"></i> {{ tgl_indo($data['tgl_upload'] ?? date('Y-m-d')) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
