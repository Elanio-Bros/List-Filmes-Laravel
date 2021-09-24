@extends('layout')
@section('title')
    Home
@endsection
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        .form-inline {
            width: 50% !important;
        }

        .form-control {
            width: 70% !important;
        }

    </style>
@endsection
@section('content')
 @include('filme.nav')
    <div>
        <div id="cometariosFilmes m-2">
            <div class="m-4">
                <h4>Ultimos Filmes Adicionados</h4>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach (range(1, 10) as $item)
                        <a href="#">
                            <div class="mx-2 cardFilme">
                                @includeIf('content.card_layout',
                                ['titulo'=>"$item Titulo Filme",
                                'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                                )
                            </div>
                        </a>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
        <div id="cometariosFilmes m-2">
            <div class="m-4">
                <h4>Filmes Mais Comentados</h4>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach (range(1, 10) as $item)
                        <div class="mx-2 cardFilme">
                            @includeIf('content.card_layout',
                            ['titulo'=>"$item Titulo Filme",
                            'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                            )
                        </div>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
        <div class="m-3">
            <h4>3 Categoria mais comentadas</h4>
        </div>
        <div id="cometariosFilmes m-2">
            <div class="m-4">
                <h4>Ação</h4>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach (range(1, 10) as $item)
                        <div class="mx-2 cardFilme">
                            @includeIf('content.card_layout',
                            ['titulo'=>"$item Titulo Filme",
                            'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                            )
                        </div>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
        <div id="cometariosFilmes m-2">
            <div class="m-4">
                <h4>Aventura</h4>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach (range(1, 10) as $item)
                        <div class="mx-2 cardFilme">
                            @includeIf('content.card_layout',
                            ['titulo'=>"$item Titulo Filme",
                            'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                            )
                        </div>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
        <div id="cometariosFilmes m-2">
            <div class="m-4">
                <h4>Atividade</h4>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach (range(1, 10) as $item)
                        <div class="mx-2 cardFilme">
                            @includeIf('content.card_layout',
                            ['titulo'=>"$item Titulo Filme",
                            'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                            )
                        </div>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
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
