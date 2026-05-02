<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>
        {{ setting('login_title') . ' ' . ucwords(setting('sebutan_desa')) . ($desa['nama_desa'] ? ' ' . $desa['nama_desa'] : '') . get_dynamic_title_page_from_path() }}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ favico_desa() }}" />

    <!-- Tailwind CSS & Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#0284c7',
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            600: '#0284c7',
                            700: '#0369a1',
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(30, 41, 59, 0.9) 100%), url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #konfirmasi-cookie, #aktifkan-cookie {
            display: none !important;
        }
    </style>

    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
    @include('admin.layouts.components.token')
</head>

<body class="min-h-screen flex flex-col justify-between text-slate-300">

    <div class="flex-1 flex items-center justify-center p-4 md:p-6">
        <div class="max-w-4xl w-full bg-slate-900/60 backdrop-blur-md border border-slate-800 rounded-2xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">
            
            {{-- Bagian Kiri: Welcome & Info --}}
            <div class="p-8 md:p-12 flex flex-col justify-between bg-slate-800/40 border-r border-slate-800">
                <div class="space-y-4">
                    <a href="{{ base_url('/') }}" class="flex items-center gap-3 hover:opacity-90 transition">
                        <img src="{{ gambar_desa($desa['logo']) }}" alt="Lambang Desa" class="w-14 h-14 object-contain" />
                        <div>
                            <h2 class="text-white text-lg font-bold leading-tight uppercase">{{ ucwords(setting('sebutan_desa')) }} {{ $desa['nama_desa'] }}</h2>
                            <span class="text-xs text-primary-200 font-medium">Layanan Mandiri</span>
                        </div>
                    </a>
                    <p class="text-sm text-slate-400 leading-relaxed pt-2">
                        Silakan hubungi operator desa atau kunjungi kantor desa untuk mendapatkan kode PIN Anda guna mengakses Layanan Mandiri.
                    </p>
                </div>

                <div class="space-y-3 mt-8 pt-4 border-t border-slate-800/60 text-xs text-slate-400">
                    <p class="flex items-center gap-2"><i class="fa fa-map-marker-alt text-primary-200"></i> {{ $desa['alamat_kantor'] }}, Kodepos {{ $desa['kode_pos'] }}</p>
                    <p class="flex items-center gap-2"><i class="fa fa-info-circle text-primary-200"></i> IP Address: {{ request()->ip() }}</p>
                </div>
            </div>

            {{-- Bagian Kanan: Form --}}
            <div class="p-8 md:p-12 flex flex-col justify-center">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-white mb-1">Masuk ke Akun</h3>
                    <p class="text-xs text-slate-400">Gunakan NIK dan PIN Anda untuk melanjutkan.</p>
                </div>

                {{-- Alert Notification --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-500/10 border border-red-500/20 text-red-300 p-3 rounded-xl text-xs space-y-1">
                        @foreach ($errors->all() as $item)
                            <p id="countdown">{{ $item }}</p>
                        @endforeach
                    </div>
                @endif

                @if ($notif = $ci->session->flashdata('notif'))
                    <div class="mb-4 bg-red-500/10 border border-red-500/20 text-red-300 p-3 rounded-xl text-xs">
                        <p>{{ $notif }}</p>
                    </div>
                @endif

                @yield('content')
            </div>

        </div>
    </div>

    {{-- Bottom Footer --}}
    <footer class="text-center p-4 border-t border-slate-800/60 text-xs text-slate-500 font-medium">
        &copy; {{ date('Y') }} {{ ucwords($desa['nama_desa']) }} &mdash; 
        Tema <strong class="text-primary-200">Fresh</strong> &bull;
        <a href="https://github.com/OpenSID/OpenSID" class="text-slate-400 hover:text-white transition" target="_blank">OpenSID v<?= AmbilVersi() ?></a>
    </footer>

    @include('admin.layouts.components.konfirmasi_cookie', ['cookie_name' => 'pengunjung'])
    @include('admin.layouts.components.aktifkan_cookie')

    <!-- jQuery & Scripts -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validasi.js') }}"></script>
    <script src="{{ asset('js/id_browser.js') }}"></script>

    @stack('script')
</body>

</html>
