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

        .filme .card-body {
            padding: 5%;
        }

        .comentario .card-body {
            padding: 1%;
        }

        .comentario .card-header {
            background-color: #FFF;
            border: 0px;
            display: flex;
        }

        .comentario .card-header b {
            padding: 5px;
            margin: 1px;
        }

        .comentario .card-header img {
            width: 40px;
            height: 40px;
            border-radius: 2px;
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
                <h1>Your Movie Ideas</h1>
                <p>É um site onde você pode compartilhar suas opiniões, notas, ideias, teorias e pode falar de tudo sobre um
                    ou varios filmes</p>
                <a href="{{ url('login') }}"><button type="button" class="btn btn-primary">Faça parte
                        dessa comunidade</button></a>
            </div>
        </div>
    </div>
    <div>
        <div class="m-4">
            <h4>Comentarios Gerais</h4>
        </div>
        <div class="FilmeCarousel my-3">
            @foreach (range(1, 10) as $item)
                <div class="mx-2">
                    @includeIf('content_layout.card_layout',
                    ['titulo'=>"$item Titulo Filme",
                    'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                    )
                </div>
            @endforeach
        </div>
        <div class="ComentarioCarousel">
            @foreach (range(1, 10) as $item1)
                <div class="mx-5">
                    @foreach (range(1, 5) as $item)
                        <div class="my-2">
                            @includeIf('content_layout.comentario_layout',
                            ['name' => "Pessoa $item",
                            'comentario'=>"Nº $item1 Filme Comentario"])
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
        $('.FilmeCarousel').slick({
            accessibility: false,
            centerMode: true,
            variableWidth: true,
            arrows: false,
            asNavFor: '.ComentarioCarousel'
        });
        $('.ComentarioCarousel').slick({
            accessibility: false,
            asNavFor: '.FilmeCarousel',
            centerMode: true,
            autoplay: true,
            slidesToShow: 1,
            autoplaySpeed: 2500,
            arrows: false,
        });
    </script>
@endsection
