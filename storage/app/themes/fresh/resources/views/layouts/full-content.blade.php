@extends('theme::template')
@section('layout')
<div class="container">
    <div class="fresh-layout">
        <main class="fresh-card">
            <div class="fresh-card-body">
                @yield('content')
            </div>
        </main>
    </div>
</div>
@endsection
