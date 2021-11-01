@extends('filme.layout.layout_scroll_list')
@section('title') Home @endsection
@section('list')
    <div id="m-2">
        <div class="m-4">
            <h4>Ultimos Filmes Adicionados</h4>
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
    </div>
    <div id="m-2">
        <div class="m-4">
            <h4>Filmes Mais Comentados</h4>
        </div>
        <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
            <a class="buttonCarousel prev" style="left:0;">
                <span><i class="fas fa-chevron-left"></i></span>
            </a>
            <div class="FilmCovers w-100">
                @foreach (range(1,10) as $item)
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
    </div>
    <div class="m-3">
        <h4>3 Categoria mais comentadas</h4>
    </div>
    <div id="m-2">
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
    </div>
    <div id="m-2">
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
    </div>
    <div id="m-2">
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
    </div>
@endsection
