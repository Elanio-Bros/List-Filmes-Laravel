@extends('layout')
@section('style')
    <style>
        .filme img {
            max-height: 50vh;
        }

        .row {
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    @include('content.nav')
    <div>
        @include('content.order')
        @yield('grade')
    </div>
@endsection
@section('script')
    <script>
        $('.filme').hover(function() {
            $(this).children().next().slideToggle('fast')
        });
    </script>
@endsection
