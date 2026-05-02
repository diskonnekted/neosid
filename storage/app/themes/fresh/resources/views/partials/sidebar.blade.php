<aside class="space-y-6 sidebar">
    <form action="{{ site_url('/') }}" role="form" class="relative mb-6">
        <div class="relative">
            <i class="fas fa-search absolute top-1/2 left-4 transform -translate-y-1/2 z-10 text-gray-400"></i>
            <input type="text" name="cari" class="px-12 w-full h-12 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent shadow-sm text-sm" placeholder="Cari artikel...">
        </div>
    </form>
    <!-- Tampilkan Widget -->
    @if ($widgetAktif)
        @foreach ($widgetAktif as $widget)
            @if (in_array($widget['isi'], ['keuangan', 'peta_wilayah_desa', 'peta_lokasi_kantor', 'statistik_pengunjung']) || str_contains($widget['isi'], 'keuangan'))
                @continue
            @endif
            @php
                $judul_widget = [
                    'judul_widget' => str_replace('Desa', ucwords(setting('sebutan_desa')), strip_tags($widget['judul'])),
                ];
            @endphp
            @includeIf("theme::widgets.{$widget['isi']}", $judul_widget)
        @endforeach
    @endif
</aside>

