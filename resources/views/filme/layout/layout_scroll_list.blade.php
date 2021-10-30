@extends('layout')
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        .filme{
            width: 13rem;
        }
    </style>
    @yield('style_list')
@endsection
@section('content')
    @include('content.nav')
    <div>
        @yield('list')
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('script_list')
    <script>
        $('.FilmCovers').slick({
            accessibility: false,
            centerMode: true,
            variableWidth: true,
            arrows: false,
        });
        $('.prev').click(function() {
            $(this).parents().children().siblings('.FilmCovers').slick('slickPrev')
        })
        $('.next').click(function() {
            $(this).parents().children().siblings('.FilmCovers').slick('slickNext')
        })
        $('.filme').hover(function() {
            $(this).children().next().slideToggle('fast')
        });
    </script>
@endsection
