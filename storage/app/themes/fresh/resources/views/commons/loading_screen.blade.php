<div x-data="{ loading: true, onLoading() { setTimeout(() => { this.loading = false }, 1200) } }" x-init="onLoading()">
    <div class="fresh-loading" x-show="loading" x-transition.opacity>
        <img src="{{ gambar_desa($desa['logo']) }}" alt="{{ $desa['nama_desa'] }}" class="fresh-loading-logo">
        <div class="fresh-spinner"></div>
    </div>
</div>
