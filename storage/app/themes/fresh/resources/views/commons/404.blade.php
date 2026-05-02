@extends('theme::layouts.full-content')
@section('content')
<div class="fresh-404">
    <i class="fa fa-triangle-exclamation" style="font-size:80px;color:#e2e8f0;margin-bottom:24px;display:block"></i>
    <h1>404</h1>
    <p>Halaman yang Anda cari tidak ditemukan atau telah dipindahkan.</p>
    <a href="{{ site_url('/') }}" class="fresh-btn fresh-btn-primary" style="display:inline-flex">
        <i class="fa fa-house"></i> Kembali ke Beranda
    </a>
</div>
@endsection