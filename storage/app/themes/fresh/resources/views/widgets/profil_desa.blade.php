<div class="fresh-widget-title">
    <i class="fa fa-building"></i> {{ $judul_widget ?? 'Profil Desa' }}
</div>
<div class="fresh-widget-body" style="padding:0">
    <ul class="fresh-data-list" style="padding:0 16px">
        <li><span style="color:#64748b">Kepala Desa</span><strong>{{ $desa['nama_kepala_desa'] ?? '-' }}</strong></li>
        <li><span style="color:#64748b">Kecamatan</span><strong>{{ ucwords($desa['nama_kecamatan']) }}</strong></li>
        <li><span style="color:#64748b">Kabupaten</span><strong>{{ ucwords($desa['nama_kabupaten']) }}</strong></li>
        <li><span style="color:#64748b">Provinsi</span><strong>{{ ucwords($desa['nama_propinsi']) }}</strong></li>
        @if($desa['luas_wilayah'])
        <li><span style="color:#64748b">Luas Wilayah</span><strong>{{ $desa['luas_wilayah'] }} km²</strong></li>
        @endif
        @if($desa['telepon'])
        <li><span style="color:#64748b">Telepon</span><strong>{{ $desa['telepon'] }}</strong></li>
        @endif
        @if($desa['email'])
        <li><span style="color:#64748b">Email</span><strong>{{ $desa['email'] }}</strong></li>
        @endif
        @if($desa['website'])
        <li><span style="color:#64748b">Website</span>
            <a href="{{ $desa['website'] }}" target="_blank" style="font-size:13px">{{ $desa['website'] }}</a>
        </li>
        @endif
    </ul>
</div>
