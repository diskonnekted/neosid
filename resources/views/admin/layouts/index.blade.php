<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        {{ setting('admin_title') . ' ' . ucwords(setting('sebutan_desa') . ' ' . ($desa['nama_desa'] ?? '')) . get_dynamic_title_page_from_path() }}
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{ favico_desa() }}" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="{{ base_url('rss.xml') }}" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/ionicons.min.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/select2.min.css') }}" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}" />
    <!-- AdminLTE Skins. -->
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}" />
    <!-- Sweetalert CSS-->
    <link rel="stylesheet" href="{{ asset('js/sweetalert2/sweetalert2.min.css') }}">
    <!-- Modifikasi -->
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}" />
    <!-- Loading Lazy -->
    <link rel="stylesheet" href="<?= asset('js/progressive-image/progressive-image.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Modern Premium Sidebar Style Overrides */
        .main-sidebar {
            background-color: #0f172a !important;
            border-right: 1px solid rgba(255, 255, 255, 0.05) !important;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1) !important;
            font-family: 'Outfit', sans-serif !important;
        }
        .user-panel {
            padding: 16px !important;
            background-color: rgba(255, 255, 255, 0.02) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
            display: flex !important;
            align-items: center !important;
            gap: 14px !important;
            margin-bottom: 12px !important;
            width: 100% !important;
            float: none !important;
            clear: both !important;
        }
        .user-panel .image, .user-panel .info {
            float: none !important;
            display: inline-block !important;
            vertical-align: middle !important;
        }
        .user-panel .image img {
            width: 48px !important;
            height: 48px !important;
            object-fit: contain !important;
            border-radius: 8px !important;
            border: 2px solid rgba(255, 255, 255, 0.1) !important;
        }
        .user-panel .info {
            padding: 0 !important;
            color: #f1f5f9 !important;
            line-height: 1.4 !important;
            font-size: 13px !important;
            white-space: normal !important;
            word-break: break-word !important;
        }
        .user-panel .info strong {
            font-weight: 700 !important;
            color: #ffffff !important;
            display: block !important;
            margin-bottom: 2px !important;
            font-size: 13px !important;
        }
        .sidebar-form {
            margin: 0 16px 16px 16px !important;
            border-radius: 8px !important;
            background-color: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.05) !important;
            overflow: hidden !important;
        }
        .sidebar-form input[type="text"] {
            background-color: transparent !important;
            border: none !important;
            color: #f1f5f9 !important;
            font-size: 13px !important;
            padding: 10px 14px !important;
        }
        .sidebar-form .btn {
            background-color: transparent !important;
            border: none !important;
            color: #64748b !important;
            padding: 10px 14px !important;
        }
        .sidebar-menu {
            padding: 0 12px !important;
        }
        .sidebar-menu > li.header {
            color: #475569 !important;
            background: transparent !important;
            font-size: 10px !important;
            font-weight: 700 !important;
            letter-spacing: 1px !important;
            padding: 16px 12px 8px 12px !important;
            text-transform: uppercase !important;
        }
        .sidebar-menu > li > a {
            padding: 12px 14px !important;
            color: #94a3b8 !important;
            border-radius: 8px !important;
            margin-bottom: 4px !important;
            font-weight: 600 !important;
            font-size: 13.5px !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            border-left: none !important;
            transition: all 0.2s ease !important;
        }
        .sidebar-menu > li > a:hover, 
        .sidebar-menu > li.active > a,
        .sidebar-menu > li.menu-open > a {
            background-color: rgba(2, 132, 199, 0.1) !important;
            color: #38bdf8 !important;
        }
        .sidebar-menu > li.active > a i,
        .sidebar-menu > li.menu-open > a i {
            color: #38bdf8 !important;
        }
        .sidebar-menu .treeview-menu {
            background: transparent !important;
            padding-left: 20px !important;
            margin-top: 4px !important;
            margin-bottom: 8px !important;
        }
        .sidebar-menu .treeview-menu > li > a {
            padding: 8px 14px !important;
            color: #64748b !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            border-radius: 6px !important;
            transition: all 0.2s ease !important;
        }
        .sidebar-menu .treeview-menu > li > a:hover,
        .sidebar-menu .treeview-menu > li.active > a {
            color: #38bdf8 !important;
            background-color: rgba(2, 132, 199, 0.05) !important;
        }
    </style>
    @stack('css')
</head>

<body id="sidebar_collapse" class="{{ setting('warna_tema_admin') }} fixed sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.partials.header')

        @include('admin.layouts.partials.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                @yield('title')

                @include('admin.layouts.components.breadcrumb')

            </section>

            <section id="maincontent" class="content">

                @include('admin.layouts.partials.info')

                @yield('content')

            </section>
        </div>

        @include('admin.pengaturan.pengaturan_modal')

        @if ($notif['pengumuman'])
            @include('admin.layouts.components.pengumuman', $notif['pengumuman'])
        @endif

        @include('admin.layouts.partials.footer')

        @include('admin.layouts.partials.control_sidebar')

        <!-- Untuk menampilkan modal bootstrap umum -->
        <div class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var SITE_URL = "{{ site_url() }}";
        var BASE_URL = "{{ base_url() }}";
        var baca = "{{ can('b') }}";
        var ubah = "{{ can('u') }}";
        var hapus = "{{ can('h') }}";
        var SYARAT_SANDI = "{{ SYARAT_SANDI }}";
    </script>
    <!-- jQuery 3 -->
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('bootstrap/js/select2.full.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('bootstrap/js/jquery.slimscroll.min.js') }}"></script>
    <!-- jquery validasi -->
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('bootstrap/js/fastclick.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    <!-- Sweetalert JS -->
    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- jquery validasi -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <!-- Loading Lazy -->
    <script src="<?= asset('js/progressive-image/progressive-image.js') ?>"></script>
    <!-- Modifikasi -->
    @if (config_item('demo_mode'))
        <!-- Website Demo -->
        <script src="{{ asset('js/demo.js') }}"></script>
    @endif
    @if (!setting('inspect_element'))
        <script src="{{ asset('js/disabled.min.js') }}"></script>
    @endif
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $('ul.sidebar-menu').on('expanded.tree', function(e) {
                e.stopImmediatePropagation();
                setTimeout(scrollTampil($('li.treeview.menu-open')[0]), 500);
            });

            function scrollTampil(elem) {
                elem.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>

    @if (isset($perbaharui_langganan) && $controller != 'pengguna' && !config_item('demo_mode'))
        <!-- cek status langganan -->
        <script type="text/javascript">
            var controller = '{{ $controller }}';
            $.ajax({
                    url: `<?= config_item('server_layanan') ?>/api/v1/pelanggan/pemesanan`,
                    headers: {
                        "Authorization": `Bearer {{ $list_setting->firstWhere('key', 'layanan_opendesa_token')?->value }}`,
                        "X-Requested-With": `XMLHttpRequest`,
                    },
                    type: 'Post',
                })
                .done(function(response) {
                    let data = {
                        body: response
                    }
                    $.ajax({
                        url: `${SITE_URL}pelanggan/pemesanan`,
                        type: 'post',
                        dataType: 'json',
                        data: data,
                    }).done(function() {
                        if (controller == 'pelanggan') {
                            location.reload();
                        }
                    });
                })
        </script>
    @endif
    @include('admin.layouts.components.token')

</body>

</html>
