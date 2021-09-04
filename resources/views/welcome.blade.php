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
        .borde1 {
            border: 1px solid red;
        }

        .borde2 {
            border: 1px solid blue;
        }

        #carouselFundo .carousel,
        .carousel-inner {
            z-index: -1;
            width: 100%;
            max-height: 78vh;
            filter: brightness(50%);
        }


        #frontText {
            color: azure;
            position: absolute;
            top: 0;
            margin-top: 15%;
            margin-left: 5%;
        }

        .filme .card-body {
            padding: 5%;
        }

        .comentario .card-header img {
            width: 40px;
            height: 40px;
            border-radius: 2px;
        }

        .CarouselFilmes .prev,
        .next {
            position: absolute;
            width: 50px;
            min-height: 18em;
            display: flex;
            align-items: center;
            align-content: center;
            justify-content: center;
            background-color: #000000AF;
            text-decoration: none;
            z-index: 1;
            color: red;
        }

        .CarouselFilmes a,
        .cardFilme:hover {
            cursor: pointer;
        }

    </style>
@endsection
@section('content')
    <div>
        <div id="carouselFundo" class="carousel slide carousel-fade" data-ride="carousel" data-inteval="1500">
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
    <div class="m-4">
        <h4>Comentarios Gerais da Comunidade</h4>
    </div>
    <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
        <a class="prev" style="left:0;">
            <span><i class="fas fa-chevron-circle-left"></i></span>
        </a>
        <div class="FilmCovers w-100">
            @foreach (range(1, 10) as $item)
                <div class="mx-2 cardFilme">
                    @includeIf('content_layout.card_layout',
                    ['titulo'=>"$item Titulo Filme",
                    'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                    )
                </div>
            @endforeach
        </div>
        <a class="next" style="right: 0;">
            <span><i class="fas fa-chevron-circle-right"></i></span>
        </a>
    </div>
    <div class="CommentMovies">
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.FilmCovers').slick({
            accessibility: false,
            centerMode: true,
            variableWidth: true,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            asNavFor: '.CommentMovies',
        });
        $('.CommentMovies').slick({
            accessibility: false,
            asNavFor: '.FilmCovers',
            autoplay: true,
            autoplaySpeed: 3500,
            centerMode: true,
            slidesToShow: 1,
            arrows: false,
        });
        $('.cardFilme').click(function() {
            $('.FilmCovers').slick('slickGoTo', $(this).attr('data-slick-index'))
        });
    </script>
@endsection
