@extends('admin.layouts.index')

@push('css')
    <style>
        .catatan-scroll {
            height: 400px;
            overflow-y: scroll;
        }

        @media (max-width: 576px) {
            .komunikasi-opendk {
                display: none !important;
            }
        }
        
        /* Premium Dashboard Model Overrides */
        .small-box {
            border-radius: 12px !important;
            box-shadow: 0 4px 15px -1px rgba(0, 0, 0, 0.08), 0 2px 6px -1px rgba(0, 0, 0, 0.04) !important;
            overflow: hidden !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        .small-box:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 10px -2px rgba(0, 0, 0, 0.05) !important;
        }
        .small-box .inner {
            padding: 24px !important;
            position: relative !important;
            z-index: 2 !important;
        }
        .small-box .inner h3 {
            font-size: 32px !important;
            font-weight: 800 !important;
            margin: 0 0 4px 0 !important;
            letter-spacing: -0.5px !important;
            color: #ffffff !important;
        }
        .small-box .inner p {
            font-size: 14px !important;
            font-weight: 500 !important;
            opacity: 0.9 !important;
            color: #ffffff !important;
            margin: 0 !important;
        }
        .small-box .icon {
            font-size: 55px !important;
            top: 15px !important;
            right: 20px !important;
            color: rgba(255, 255, 255, 0.15) !important;
            transition: all 0.3s ease !important;
        }
        .small-box:hover .icon {
            transform: scale(1.1) !important;
            color: rgba(255, 255, 255, 0.25) !important;
        }
        .small-box-footer {
            background-color: rgba(0, 0, 0, 0.15) !important;
            padding: 10px 24px !important;
            font-size: 12px !important;
            font-weight: 600 !important;
            letter-spacing: 0.5px !important;
            text-transform: uppercase !important;
            color: #ffffff !important;
            border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
            transition: background 0.3s ease !important;
        }
        .small-box-footer:hover {
            background-color: rgba(0, 0, 0, 0.25) !important;
            color: #ffffff !important;
        }
    </style>
@endpush

@section('title')
    <h1>
        Tentang
        <?= config_item('nama_aplikasi') ?>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Tentang
        <?= config_item('nama_aplikasi') ?>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    @include('admin.home.saas')

    @include('admin.home.premium')

    @include('admin.home.rilis')
    
    @include('admin.home.percobaan')

    <div class="row">
        @foreach ($shortcut as $sc)
            @can("{$sc['akses']}:baca")
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="small-box" style="background-color: {!! $sc['warna'] !!}; border-radius: 5px;">
                        <div class="inner">
                            <h3 class="text-white">{{ $sc['count'] ?? '0' }}</h3>
                            <p class="text-white">{{ SebutanDesa($sc['judul']) }}</p>
                        </div>
                        <div class="icon">
                            <i class="faa {!! $sc['icon'] !!}"></i>
                        </div>
                        <a href="{{ ci_route($sc['link'] ?? '#') }}" class="small-box-footer text-white" style="border-radius:  0 0 5px 5px">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    @endsection
