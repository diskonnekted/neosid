@php
    $url = $post->url_slug;
    $abstract = potong_teks(strip_tags($post['isi']), 300);
    $image = $post['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar']) ? AmbilFotoArtikel($post['gambar'], 'sedang') : gambar_desa($desa['logo']);
@endphp

<div class="fresh-card bg-white shadow-sm hover:shadow-md transition duration-300 rounded-xl overflow-hidden border border-gray-100 flex flex-col h-full">
    <figure class="w-full h-48 overflow-hidden flex-shrink-0">
        <a href="{{ $url }}">
            <img src="{{ $image }}" alt="{{ $post['judul'] }}" class="w-full h-48 object-cover object-center transform hover:scale-105 transition duration-500">
        </a>
    </figure>
    <div class="p-5 flex flex-col justify-between flex-1">
        <div class="space-y-3">
            <a href="{{ $url }}" class="text-lg font-bold text-gray-800 hover:text-primary leading-snug block">{{ potong_teks($post['judul'], 80) }}{{ strlen($post['judul']) > 80 ? '...' : '' }}</a>
            <p class="text-sm text-gray-600 line-clamp-3">{!! potong_teks(html_entity_decode($abstract), 100) !!}{{ strlen($abstract) > 100 ? '...' : '' }}</p>
        </div>
        <ul class="flex flex-wrap gap-x-4 gap-y-2 mt-4 pt-3 border-t border-gray-50 text-xs text-gray-500">
            <li class="flex items-center gap-1"><i class="fas fa-calendar-alt text-primary-100"></i> {{ tgl_indo($post['tgl_upload']) }}</li>
            <li class="flex items-center gap-1"><i class="fas fa-user text-primary-100"></i> {{ $post['owner'] }}</li>
            @if ($post['kategori'])
                <li class="flex items-center gap-1"><i class="fas fa-bookmark text-primary-100"></i> {{ $post['category']['kategori'] }}</li>
            @endif
        </ul>
    </div>
</div>
