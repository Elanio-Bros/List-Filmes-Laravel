@extends('layout')
@section('title') Todas Categorias @endsection
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        .gridPerson .btnPerson {
            background-color: #F8F8FF;
            color: #000000DD;
        }

        .gridPerson .btnPerson:hover {
            background-color: #000000FF;
            color: #F8F8FF;
        }

        .gridPerson .btnPerson:active {
            background-color: #F8F8FF;
            border-color: #000000DD;
            color: #000000DD;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    @include('content.order')
    <div class='p-3 gridPerson'>
        @foreach (range(1, 10) as $item)
            <a href='{{ url('/filme/categoria/' . $item) }}' class="btn btnPerson m-2">Ação{{ $item }}</a>
        @endforeach
    </div>
@endsection
