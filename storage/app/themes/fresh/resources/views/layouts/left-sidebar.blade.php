@extends('theme::template')
@section('layout')
<div class="container">
    <div class="fresh-layout with-sidebar">
        <aside class="fresh-sidebar">
            @include('theme::partials.sidebar')
        </aside>
        <main class="fresh-card">
            <div class="fresh-card-body">
                @yield('content')
            </div>
        </main>
    </div>
</div>
@endsection
