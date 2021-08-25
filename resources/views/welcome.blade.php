@extends('layout')
@section('title')
    Bem vindo
@endsection
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/welcome.css') }}">
@endsection
@section('content')
    <div>
        <div id="textAb">
            <h1>Movies Historic</h1>
            <p>É um site onde você pode compartilhar suas opiniões e notas sobre os filmes para outros verem</p>
            <button type="button" class="btn btn-primary">Faça parte dessa comunidade</button>
        </div>
        <div id="carouselFundo" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach (File::glob(public_path('img/banner_welcome/*.*')) as $key => $imagem)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <img class=" d-block w-100" src="{{ URL::asset('img/banner_welcome/' . basename($imagem)) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <h2>Ultimos Filmes Adicionados</h2>
        <div class="CardCarroseul">
            @foreach (range(1, 10) as $item)
                <div class="mx-2">
                    <div class="card" style="width: 15rem;">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item }} Card title</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ComentariosCarroseul">
            @foreach (range(1, 10) as $item1)
                <div class="mx-5">
                    @foreach (range(1, 5) as $item)
                        <div class="my-2">
                            <div class="card">
                                <div class="card-header">
                                    Comentario Filme {{ $item1 }}
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>Comentario {{ $item }}</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script>
        $('#carouselFundo').carousel({
            interval: 2500,
            keyboard: false,
            pause: false
        });
        $('.CardCarroseul').slick({
            accessibility: false,
            centerMode: true,
            slidesToShow: 3,
            variableWidth: true,
            arrows: false,
            asNavFor: '.ComentariosCarroseul'
        });
        $('.ComentariosCarroseul').slick({
            accessibility: false,
            asNavFor: '.CardCarroseul',
            centerMode: true,
            autoplay: true,
            slidesToShow: 1,
            autoplaySpeed: 2500,
            arrows: false,
        });
    </script>
@endsection
