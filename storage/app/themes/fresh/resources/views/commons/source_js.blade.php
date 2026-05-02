<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://unpkg.com/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/2.0.1/mapbox-gl.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.14/leaflet-mapbox-gl.min.js"></script>
@include('core::admin.layouts.components.token')
<script>
    var BASE_URL = '{{ base_url() }}';
    if (typeof $.fn !== 'undefined' && typeof $.fn.dataTable !== 'undefined') {
        $.extend($.fn.dataTable.defaults, {
            lengthMenu: [[10,25,50,100,-1],[10,25,50,100,"Semua"]],
            pageLength: 10,
            language: { url: "{{ asset('bootstrap/js/dataTables.indonesian.lang') }}" }
        });
    }

    // Initialize Owl Carousel
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof $ !== 'undefined' && typeof $.fn.owlCarousel !== 'undefined') {
            $('.owl-carousel').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                nav: false,
                dots: true
            });
        }
    });

    // Back to top
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.querySelector('.fresh-back-top');
        if (btn) {
            window.addEventListener('scroll', function () {
                btn.classList.toggle('show', window.scrollY > 400);
            });
            btn.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });
</script>
@if (!setting('inspect_element'))
<script src="{{ asset('js/disabled.min.js') }}"></script>
@endif
