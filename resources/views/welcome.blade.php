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
        body {
            background-color: #F8F8FF;
            color: #000000DD;
        }

        .btnPerson{
            background-color: #F8F8FF;
            color: #000000DD;
        }

        .btnPerson:hover {
            background-color: #000000FF;
            color: #F8F8FF;
        }

        .btnPerson:active {
            background-color: #F8F8FF;
            border-color: #000000DD;
            color: #000000DD;
        }

        #carouselFundo .carousel,
        .carousel-inner {
            z-index: -1;
            width: 100%;
            max-height: 500px;
            filter: brightness(50%);
        }

        #frontText {
            color: azure;
            position: absolute;
            top: 0;
            margin-top: 20%;
            margin-left: 5%;
        }

        #explanation {
            background: black;
            color: white;
            padding: 5px;
        }

    </style>
@endsection
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('entrada') }}"><svg id="svg2" width="40" height="40" viewBox="0 0 512 512"
                sodipodi:docname="icone.svg">
                <g inkscape:groupmode="layer" inkscape:label="Image" id="g10">
                    <path style="fill-opacity:1"
                        d="m 65.990845,511.25386 c -18.83196,-3.59257 -36.441272,-20.759 -40.960212,-39.93005 -1.30339,-5.52946 -1.51225,-23.1667 -1.52501,-128.77936 L 23.490823,220.17202 12.903812,178.54445 C 1.3239818,133.01318 1.1355018,131.54751 5.5674918,121.49592 7.9841315,116.0151 14.546732,108.99795 19.788863,106.28953 24.147363,104.03765 15.669522,106.08887 269.49083,45.873913 442.73949,4.7734936 462.56308,0.26512983 467.7129,0.79340463 477.72254,1.8202066 487.24036,7.7206126 492.00685,15.854006 c 3.27196,5.583183 22.75009,78.950016 21.94864,82.672336 -1.57444,7.312488 11.36155,4.098528 -299.46466,74.402278 -12.925,2.92342 -37,8.39172 -53.5,12.15178 l -30,6.83648 188.5964,0.5 c 161.37237,0.42782 188.84461,0.70601 190.31594,1.92717 4.77576,3.96375 4.58881,-1.67202 4.5703,137.77317 -0.019,143.38092 0.19058,138.10851 -5.98995,150.66294 -5.93464,12.05498 -16.24715,21.27071 -29.61344,26.46392 l -6.87925,2.6728 -200.5,0.14541 C 147.80517,512.15199 69.075255,511.84227 65.990825,511.25386 Z M 473.53648,488.31577 c 11.16699,-5.23775 17.15567,-13.31125 18.91811,-25.50399 0.5935,-4.10592 1.00466,-38.54699 1.01645,-85.1449 l 0.0198,-78.25 h -224.5 -224.500008 v 81.39466 c 0,78.50033 0.0709,81.62434 1.99491,87.85343 3.306183,10.70415 12.364893,18.97009 23.751023,21.67245 2.14203,0.50839 88.348255,0.8241 200.754075,0.73522 l 197,-0.15576 z M 85.987725,246.42313 c 8.52672,-17.04656 15.503125,-31.44656 15.503125,-32 0,-0.65146 -10.048665,-1.00625 -28.500005,-1.00625 H 44.490842 v 32 32 h 12.996883 12.99687 z m 106.760515,-0.5104 c 8.65843,-17.32728 15.74261,-31.73227 15.74261,-32.01109 0,-0.27882 -18.5625,-0.38945 -41.25,-0.24585 l -41.25,0.26109 -15.70043,31 c -8.63524,17.05 -15.722745,31.3375 -15.750005,31.75 -0.0273,0.4125 18.516255,0.75 41.207825,0.75 h 41.25738 z m 107,0 c 8.65843,-17.32728 15.74261,-31.72728 15.74261,-32 0,-0.27272 -18.56582,-0.49585 -41.25739,-0.49585 h -41.25738 l -15.74262,31.50415 c -8.65843,17.32728 -15.74261,31.72728 -15.74261,32 0,0.27272 18.56582,0.49585 41.25739,0.49585 h 41.25738 z m 106.74261,-0.49585 16.00606,-32 h -41.5 -41.5 l -16.00606,32 -16.00606,32 h 41.5 41.5 z m 86.76405,0.25 -0.26405,-31.75 h -23.5 -23.5 l -15.70043,31 c -8.63524,17.05 -15.72274,31.3375 -15.75,31.75 -0.0273,0.4125 17.73175,0.75 39.46448,0.75 h 39.51404 z M 74.464295,182.88759 c 18.41039,-4.17134 33.580645,-7.69147 33.711675,-7.82249 0.13102,-0.13103 -12.283615,-12.75408 -27.588075,-28.05122 l -27.8263,-27.81299 -11.627133,2.70384 c -9.991739,2.32354 -11.979919,3.12311 -14.135369,5.68472 -1.61751,1.9223 -2.50825,4.20669 -2.50825,6.43267 0,3.065 12.37924,54.58132 13.58428,56.53112 0.26388,0.42696 1.02786,0.58331 1.697749,0.34745 0.66988,-0.23586 16.281023,-3.84176 34.691423,-8.0131 z m 97.026555,-21.97266 c 20.625,-4.675 38.29234,-8.83706 39.26075,-9.24902 1.42844,-0.60767 -3.57286,-6.06595 -26.5,-28.92139 l -28.26075,-28.172358 -39,9.357008 c -21.450005,5.14635 -39.221985,9.38642 -39.493305,9.42236 -0.61569,0.0816 55.290815,56.06572 55.986605,56.06437 0.27869,-5.4e-4 17.3817,-3.82598 38.0067,-8.50097 z m 106.24874,-24.22566 c 21.31181,-4.82481 38.74931,-9.00035 38.75,-9.27897 6.9e-4,-0.27862 -12.79038,-13.29231 -28.4246,-28.919308 l -28.42586,-28.41274 -39.60751,9.379462 -39.60751,9.379466 28.27679,28.28985 c 15.55223,15.55942 28.72975,28.29993 29.28337,28.31224 0.55362,0.0123 18.44351,-3.92519 39.75532,-8.75 z m 111.55906,-25.31018 32.3078,-7.34241 -29.3078,-29.257148 -29.3078,-29.257155 -38,8.975913 c -20.9,4.936751 -38.65191,9.208203 -39.44869,9.492115 -0.96455,0.343691 8.17918,10.148374 27.36059,29.338337 l 28.80928,28.822128 7.63941,-1.71468 c 4.20168,-0.94308 22.17792,-5.01877 39.94721,-9.0571 z M 467.9162,93.479242 c 11.9808,-2.715712 21.94742,-5.101792 22.14804,-5.302412 0.72273,-0.72273 -15.32152,-59.726602 -16.89291,-62.124848 -0.8853,-1.351137 -3.13052,-2.958548 -4.98937,-3.572026 -2.97771,-0.982732 -7.59132,-0.114641 -38.78543,7.297817 -19.47312,4.627276 -36.92878,8.738117 -38.79034,9.135202 l -3.38466,0.721974 29.3783,29.390968 c 16.15807,16.165033 29.41313,29.390965 29.4557,29.390965 0.0426,0 9.87987,-2.22194 21.86067,-4.93764 z"
                        id="path16" />
                </g>
            </svg></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#explanation">Como funciona a comunidade</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cometariosFilmes">Filmes Mais Comentados</a>
                </li>
            </ul>
            <div><a href="{{ route('login') }}">Login</a></div>
        </div>
    </nav>
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
                <a href="{{ route('conta') }}"><button type="button" class="btn btnPerson">Faça parte
                        dessa comunidade</button></a>
            </div>
        </div>
    </div>
    <div id="explanation">
        <div class="m-4">
            <h4>Como Funciona a Comunidade</h4>
            <div>
                <p>Se junte a comunidade e compartilhe suas notas, ideias, teorias entre várias outras coisas sobre cada um
                    dos filmes. Fale com a comunidade e compartilhe seus pontos comentando ou criando tópicos e gerenciando
                    os seus tópicos para melhor uso. Crie também comentários em gerais sobre cada um dos filmes dando um
                    explicação razão ou mesmos funcionalidade. Fale tudo que sabe e explique a outras cenas e situações de
                    cada um dos filmes. Crie e coloque filmes ajudando assim a comunidade a ficar melhor e com mais contéudo
                </p>
            </div>
        </div>
    </div>
    <div id="cometariosFilmes">
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
                        @includeIf('content.card_filme_layout',
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
        <div class="CommentMovies">
            @foreach (range(1, 10) as $item1)
                <div class="mx-5">
                    @foreach (range(1, 5) as $item)
                        <div class="my-2">
                            @includeIf('content.comentario_layout',
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
        $("nav li a").click(function(e) {
            e.preventDefault();
            var id = $(this).attr('href'),
                targetOffset = $(id).offset().top,
                menuHeight = $('nav').innerHeight();
            $('html,body').animate({
                scrollTop: targetOffset - menuHeight,
            }, 500);
        });
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
