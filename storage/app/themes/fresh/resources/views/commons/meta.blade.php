@php
    $nama_desa = ucwords(setting('sebutan_desa')) . ' ' . ucwords($desa['nama_desa']);
    $title = preg_replace('/[^A-Za-z0-9- ]/', '', trim(str_replace('-', ' ', get_dynamic_title_page_from_path())));
    $suffix = setting('website_title') . ' ' . ucwords(setting('sebutan_desa')) . ($desa['nama_desa'] ? ' ' . $desa['nama_desa'] : '');
    $desa_title = $title ? $title . ' - ' . $suffix : $suffix;
@endphp
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="google" content="notranslate" />
<meta name="theme" content="Fresh" />
<meta name="theme:version" content="{{ $themeVersion }}" />
<meta name="theme-color" content="#2563eb">
<meta name="keywords" content="{{ $desa_title }} {{ $nama_desa }} {{ ucfirst(setting('sebutan_kecamatan')) }} {{ ucwords($desa['nama_kecamatan']) }}, {{ ucfirst(setting('sebutan_kabupaten')) }} {{ ucwords($desa['nama_kabupaten']) }}, Provinsi {{ ucwords($desa['nama_propinsi']) }}" />
<meta property="og:site_name" content="{{ $nama_desa }}" />
<meta property="og:type" content="article" />
<link rel="canonical" href="{{ site_url() }}" />
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
<meta name="language" content="Indonesia">
<meta name="category" content="Desa, Pemerintahan">
<meta name="url" content="{{ site_url() }}">
@if (isset($single_artikel))
    <title>{{ $single_artikel['judul'] . ' - ' . $nama_desa }}</title>
    <meta name="description" content="{{ str_replace('"', "'", substr(strip_tags($single_artikel['isi']), 0, 150)) }}" />
    <meta property="og:title" content="{{ $single_artikel['judul'] }}" />
    @if (trim($single_artikel['gambar']) != '')
        <meta property="og:image" content="{{ base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $single_artikel['gambar']) }}?v={{ time() }}" />
    @endif
    <meta property="og:description" content="{{ str_replace('"', "'", substr(strip_tags($single_artikel['isi']), 0, 150)) }}" />
@else
    <title>{{ $desa_title }}</title>
    <meta name="description" content="{{ $desa_title }} {{ $nama_desa }} {{ ucfirst(setting('sebutan_kecamatan')) }} {{ ucwords($desa['nama_kecamatan']) }}" />
    <meta property="og:title" content="{{ $desa_title }}" />
@endif
<meta property="og:url" content="{{ current_url() }}" />
<link rel="shortcut icon" href="{{ favico_desa() }}" />
<noscript>JavaScript harus aktif untuk menggunakan tema ini.</noscript>
@if (cek_koneksi_internet())
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endif
<script>
    var BASE_URL = '{{ base_url() }}';
    var SITE_URL = '{{ site_url() }}';
    var setting = @json(setting());
    var config = @json(identitas());
</script>
