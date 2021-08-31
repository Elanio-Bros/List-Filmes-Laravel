@extends('layout')
@section('title')
    Bem vindo
@endsection
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        .Cardcarroseul {
            width: 100%;
        }

        #carouselFundo img {
            width: 100%;
            max-height: 78vh;
            filter: brightness(50%);
        }

        .carousel,
        .carousel-inner {
            z-index: -1;
        }

        .borde1 {
            border: 1px solid red;
        }

        #frontText {
            color: azure;
            position: absolute;
            top: 0;
            margin: auto;
            width: 100%;
            height: 78vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
@endsection
@section('content')
    <div>
        <div id="carouselFundo" class="carousel slide carousel-fade" data-ride="carousel" data-inteval="2500">
            <div class="carousel-inner">
                @foreach (File::glob(public_path('img/banner_welcome/*.*')) as $key => $imagem)
                    <div class="carousel-item @if ($key == 0) active @endif">
                        <img class=" d-block w-100" src="{{ URL::asset('img/banner_welcome/' . basename($imagem)) }}">
                    </div>
                @endforeach
            </div>
        </div>
        <div id="frontText">
            <div class="w-50">
                <h1>Movies Historic</h1>
                <p>É um site onde você pode compartilhar suas opiniões e notas sobre os filmes para outros verem</p>
                <a href="{{ url('login') }}"><button type="button" class="btn btn-primary">Faça parte
                        dessa comunidade</button></a>
            </div>
        </div>
    </div>
    <div>
        <h2>Ultimos Filmes Adicionados</h2>
        <div class="CardCarroseul">
            @foreach (range(1, 10) as $item)
                <div class="mx-2">
                    @include('card',
                    ['titulo'=>"$item Titulo Filme",
                    'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
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
