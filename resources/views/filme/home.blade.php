@extends('layout')
@section('title')
    Bem vindo
@endsection
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
            aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Mais Comentados<span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Por Nota</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Categoria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ação</a>
                        <a class="dropdown-item" href="#">Outra ação</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
            <img class="perfil ml-2"
                src="https://d11a6trkgmumsb.cloudfront.net/original/3X/f/b/fbbaacfa1033254471f614b67d58dae45236ce5b.jpg">
        </div>
    </nav>
@endsection
@section('script')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.FilmCovers').slick({
            asNavFor: '.CommentMovies',
            accessibility: false,
            centerMode: true,
            variableWidth: true,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
        });
        $('.CommentMovies').slick({
            asNavFor: '.FilmCovers',
            accessibility: false,
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
