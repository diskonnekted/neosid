@extends('theme::template')
@section('layout')
<div class="container">
    <div class="fresh-layout sidebar-right">
        <main class="fresh-card">
            <div class="fresh-card-body">
                @yield('content')
            </div>
        </main>
        <aside class="fresh-sidebar">
            @include('theme::partials.sidebar')
        </aside>
    </div>
</div>
@endsection
