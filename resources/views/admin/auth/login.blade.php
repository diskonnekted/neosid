@extends('admin.auth.index')

@php
    preg_match('/(\d+)/', $errors?->first('email'), $matches);
    $second = $matches[0] ?? 0;
    $isProduction = app()->isProduction();
@endphp

@section('content')
    <form id="validasi" class="space-y-5" action="{{ $form_action }}" method="post">
        @if (config_item('csrf_protection'))
            <input type="hidden" name="{{ $token_name }}" value="{{ $token_value }}">
        @endif
        <div class="space-y-1">
            <label for="username" class="text-xs font-semibold text-slate-300">Nama Pengguna</label>
            <input name="username" type="text" autocomplete="off" placeholder="Nama pengguna" @disabled($second)
                   class="w-full h-11 px-4 bg-slate-800/80 border border-slate-700/80 hover:border-slate-600 focus:border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:ring-opacity-20 text-white text-sm font-medium transition shadow-sm placeholder:text-slate-500 required" 
                   maxlength="100">
        </div>

        <div class="space-y-1">
            <label for="password" class="text-xs font-semibold text-slate-300">Kata Sandi</label>
            <input id="password" name="password" type="password" autocomplete="off" placeholder="Kata sandi" @disabled($second)
                   class="w-full h-11 px-4 bg-slate-800/80 border border-slate-700/80 hover:border-slate-600 focus:border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:ring-opacity-20 text-white text-sm font-medium transition shadow-sm placeholder:text-slate-500 required" 
                   maxlength="100">
        </div>

        @if ($isProduction && setting('google_recaptcha'))
            {!! app('captcha')->display() !!}
        @elseif ($isProduction)
            <div class="space-y-2">
                <a href="#" id="b-captcha" onclick="event.preventDefault(); document.getElementById('captcha').src = '{{ site_url('captcha') }}?' + Math.random();" class="inline-block hover:opacity-85 transition">
                    <img id="captcha" src="{{ site_url('captcha') }}" alt="CAPTCHA Image" class="rounded-xl border border-slate-700 shadow-sm" />
                </a>
                <input name="captcha_code" type="text" class="w-full h-11 px-4 bg-slate-800/80 border border-slate-700/80 hover:border-slate-600 focus:border-primary-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-200 focus:ring-opacity-20 text-white text-sm font-medium transition shadow-sm placeholder:text-slate-500 required" 
                       maxlength="6" placeholder="Masukkan kode di atas" @disabled($second) autocomplete="off" />
            </div>
        @endif

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <input @disabled($second) type="checkbox" id="checkbox" class="w-4 h-4 rounded border-slate-700 bg-slate-800 focus:ring-primary text-primary transition-all">
                <label for="checkbox" class="text-xs text-slate-400 select-none">Tampilkan sandi</label>
            </div>
            <a href="{{ site_url('siteman/lupa_sandi') }}" class="text-xs text-primary-200 hover:text-white font-medium hover:underline transition">Lupa kata sandi?</a>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full h-11 bg-primary hover:bg-primary-700 text-white font-bold rounded-xl flex items-center justify-center gap-2 shadow-lg transition-all hover:scale-[1.02] active:scale-[0.98]" @disabled($second)>
                <span>MASUK</span> <i class="fa fa-chevron-right text-xs"></i>
            </button>
        </div>
    </form>
@endsection

@push('js')
    @if ($isProduction && setting('google_recaptcha'))
        {!! app('captcha')->renderJs('id', true, 'recaptchaCallback') !!}

        <script>
            var recaptchaCallback = function() {
                grecaptcha.render(document.querySelector('.g-recaptcha'), {
                    'sitekey': '{{ $list_setting->firstWhere('key', 'google_recaptcha_site_key')?->value }}',
                    'error-callback': function() {
                        $.ajax({
                            url: '{{ site_url('siteman/matikan-captcha') }}',
                            type: 'post',
                            success: function(response) {
                                window.location.href = '{{ site_url('siteman') }}';
                            },
                            error: function(xhr, status, error) {
                                console.error('Error in captcha disabling request:', error);
                            }
                        });
                    }
                });
            }
        </script>
    @endif

    <script>
        function start_countdown() {
            let totalSeconds = {{ $second }};
            const timer = setInterval(function() {
                const minutes = Math.floor(totalSeconds / 60);
                const seconds = totalSeconds % 60;

                if (totalSeconds <= 0) {
                    clearInterval(timer);
                    location.reload();
                } else {
                    document.getElementById("countdown").innerHTML = `Terlalu banyak upaya masuk. Silakan coba lagi dalam ${minutes} menit ${seconds} detik.`;
                    totalSeconds--;
                }
            }, 1000);
        }

        $(document).ready(function() {
            var pass = $("#password");
            $('#checkbox').click(function() {
                if (pass.attr('type') === "password") {
                    pass.attr('type', 'text');
                } else {
                    pass.attr('type', 'password')
                }
            });
            if ($('#countdown').length) {
                start_countdown();
            }
        });
    </script>
@endpush
