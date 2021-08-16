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
        <div id="carouselFundo" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @foreach (File::glob(public_path('img/banner_welcome/*.*')) as $key => $imagem)
                    <div class="carousel-item @if ($key==0) active @endif">
                        <img class=" d-block w-100" src="{{ URL::asset('img/banner_welcome/' . basename($imagem)) }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <h1>Movies Historic</h1>
        <p>É um site onde você pode compartilhar suas opiniões e notas sobre os filmes para outros verem</p>
        <button type="button" class="btn btn-primary">Faça parte dessa comunidade</button>
    </div>
    <div>
        <h2>Ultimos Filmes Adicionados</h2>
        <div class="Cardcarroseul">
            @foreach (range(1, 10) as $item)
                <div>
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item }} Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of
                                thecard's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
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
        $('.Cardcarroseul').slick({
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 2500,
            centerPadding: '5px',
            slidesToShow: 3,
        });
    </script>
@endsection
