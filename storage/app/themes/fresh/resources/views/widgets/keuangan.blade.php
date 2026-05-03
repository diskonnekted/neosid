<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="box box-primary box-solid mb-6">
    <div class="box-header bg-primary text-white p-4 rounded-t-xl flex items-center justify-between">
        <h3 class="box-title text-base font-bold flex items-center gap-2" style="color: #ffffff !important;">
            <i class="fa fa-chart-line"></i> Grafik Keuangan APBDes 2026
        </h3>
    </div>
    <div class="box-body p-5 bg-white border border-gray-100 rounded-b-xl shadow-sm grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- APBDes 2026 Pelaksanaan --}}
        <div>
            <h4 class="text-sm font-bold text-slate-800 border-b pb-2 mb-3 flex justify-between items-center">
                <span><i class="fa fa-tasks text-blue-500 mr-1"></i> APBDes 2026 Pelaksanaan</span>
            </h4>
            <div class="space-y-4">
                @php
                    $pelaksanaan = [
                        ['nama' => 'Penyelenggaraan Pemerintahan', 'anggaran' => 850000000, 'realisasi' => 420000000],
                        ['nama' => 'Pembangunan Desa', 'anggaran' => 1200000000, 'realisasi' => 550000000],
                        ['nama' => 'Pembinaan Kemasyarakatan', 'anggaran' => 350000000, 'realisasi' => 180000000],
                        ['nama' => 'Pemberdayaan Masyarakat', 'anggaran' => 450000000, 'realisasi' => 210000000],
                    ];
                @endphp
                @foreach ($pelaksanaan as $item)
                    @php $persen = round(($item['realisasi'] / $item['anggaran']) * 100); @endphp
                    <div class="space-y-1">
                        <div class="flex justify-between text-xs font-semibold text-slate-700">
                            <span class="truncate max-w-[70%]">{{ $item['nama'] }}</span>
                            <span>{{ $persen }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden flex">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ $persen }}%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-500">
                            <span>Anggaran: Rp. {{ number_format($item['anggaran'], 0, ',', '.') }}</span>
                            <span>Real: Rp. {{ number_format($item['realisasi'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- APBDes 2026 Pendapatan --}}
        <div>
            <h4 class="text-sm font-bold text-slate-800 border-b pb-2 mb-3 flex justify-between items-center">
                <span><i class="fa fa-wallet text-emerald-500 mr-1"></i> APBDes 2026 Pendapatan</span>
            </h4>
            <div class="space-y-4">
                @php
                    $pendapatan = [
                        ['nama' => 'Pendapatan Asli Desa (PADes)', 'anggaran' => 150000000, 'realisasi' => 85000000],
                        ['nama' => 'Pendapatan Transfer', 'anggaran' => 2800000000, 'realisasi' => 1450000000],
                        ['nama' => 'Pendapatan Lain-lain', 'anggaran' => 100000000, 'realisasi' => 40000000],
                    ];
                @endphp
                @foreach ($pendapatan as $item)
                    @php $persen = round(($item['realisasi'] / $item['anggaran']) * 100); @endphp
                    <div class="space-y-1">
                        <div class="flex justify-between text-xs font-semibold text-slate-700">
                            <span class="truncate max-w-[70%]">{{ $item['nama'] }}</span>
                            <span>{{ $persen }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden flex">
                            <div class="bg-emerald-600 h-2 rounded-full transition-all duration-500" style="width: {{ $persen }}%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-500">
                            <span>Anggaran: Rp. {{ number_format($item['anggaran'], 0, ',', '.') }}</span>
                            <span>Real: Rp. {{ number_format($item['realisasi'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- APBDes 2026 Pembelanjaan --}}
        <div>
            <h4 class="text-sm font-bold text-slate-800 border-b pb-2 mb-3 flex justify-between items-center">
                <span><i class="fa fa-shopping-cart text-amber-500 mr-1"></i> APBDes 2026 Pembelanjaan</span>
            </h4>
            <div class="space-y-4">
                @php
                    $pembelanjaan = [
                        ['nama' => 'Belanja Pegawai', 'anggaran' => 650000000, 'realisasi' => 320000000],
                        ['nama' => 'Belanja Barang & Jasa', 'anggaran' => 1150000000, 'realisasi' => 580000000],
                        ['nama' => 'Belanja Modal', 'anggaran' => 1100000000, 'realisasi' => 520000000],
                        ['nama' => 'Belanja Tidak Terduga', 'anggaran' => 150000000, 'realisasi' => 30000000],
                    ];
                @endphp
                @foreach ($pembelanjaan as $item)
                    @php $persen = round(($item['realisasi'] / $item['anggaran']) * 100); @endphp
                    <div class="space-y-1">
                        <div class="flex justify-between text-xs font-semibold text-slate-700">
                            <span class="truncate max-w-[70%]">{{ $item['nama'] }}</span>
                            <span>{{ $persen }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden flex">
                            <div class="bg-amber-500 h-2 rounded-full transition-all duration-500" style="width: {{ $persen }}%"></div>
                        </div>
                        <div class="flex justify-between text-[10px] text-slate-500">
                            <span>Anggaran: Rp. {{ number_format($item['anggaran'], 0, ',', '.') }}</span>
                            <span>Real: Rp. {{ number_format($item['realisasi'], 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
