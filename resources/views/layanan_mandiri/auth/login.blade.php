@extends('layanan_mandiri.auth.index')

@section('content')
    <form id="validasi" autocomplete="off" action="{{ $form_action }}" method="post" class="space-y-5">
        @if (config_item('csrf_protection'))
            <input type="hidden" name="{{ $token_name }}" value="{{ $token_value }}">
        @endif
        <div class="space-y-1">
            <label for="nik" class="text-xs font-semibold text-slate-300">Nomor Induk Kependudukan (NIK)</label>
            <input type="text" autocomplete="off" 
                   class="w-full h-11 px-4 bg-slate-800/80 border border-slate-700/80 hover:border-slate-600 focus:border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:ring-opacity-20 text-white text-sm font-medium transition shadow-sm placeholder:text-slate-500" 
                   name="nik" maxlength="16" placeholder="Masukkan 16 digit NIK Anda">
        </div>

        <div class="space-y-1">
            <label for="pin" class="text-xs font-semibold text-slate-300">Kode PIN</label>
            <input type="password" autocomplete="off" 
                   class="w-full h-11 px-4 bg-slate-800/80 border border-slate-700/80 hover:border-slate-600 focus:border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:ring-opacity-20 text-white text-sm font-medium transition shadow-sm placeholder:text-slate-500" 
                   name="password" placeholder="Masukkan PIN" id="pin" maxlength="6">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" id="checkbox" class="w-4 h-4 rounded border-slate-700 bg-slate-800 focus:ring-primary text-primary transition-all">
            <label for="checkbox" class="text-xs text-slate-400 select-none">Tampilkan PIN</label>
        </div>

        <div class="pt-2 space-y-3">
            <button type="submit" class="w-full h-11 bg-primary hover:bg-primary-700 text-white font-bold rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all hover:scale-[1.02] active:scale-[0.98]">
                <span>MASUK</span> <i class="fa fa-chevron-right text-xs"></i>
            </button>
            
            <a href="{{ site_url('layanan-mandiri/masuk-ektp') }}" class="block">
                <button type="button" class="w-full h-11 bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-300 font-semibold rounded-xl flex items-center justify-center gap-2 shadow transition hover:text-white">
                    <i class="fa fa-id-card text-xs"></i> <span>MASUK DENGAN E-KTP</span>
                </button>
            </a>
            
            @if (setting('tampilkan_pendaftaran'))
                <a href="{{ site_url('layanan-mandiri/daftar') }}" class="block">
                    <button type="button" class="w-full h-11 bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-300 font-semibold rounded-xl flex items-center justify-center gap-2 shadow transition hover:text-white">
                        <span>DAFTAR AKUN BARU</span>
                    </button>
                </a>
            @endif
            
            <div class="text-center pt-2">
                <a href="{{ site_url('layanan-mandiri/lupa-pin') }}" class="text-xs text-primary-200 hover:text-white font-medium hover:underline transition">
                    Lupa PIN Anda?
                </a>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script type="text/javascript">
        $('document').ready(function() {
            var pass = $("#pin");
            $('#checkbox').click(function() {
                if (pass.attr('type') === "password") {
                    pass.attr('type', 'text');
                } else {
                    pass.attr('type', 'password')
                }
            });
        });
    </script>
@endpush
