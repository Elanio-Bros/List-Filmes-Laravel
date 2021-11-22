@extends('filme.layout.layout_scroll_list')
@section('title') Home @endsection
@section('list')
    {{-- {{dd($filmes_mais_comentados)}} --}}
    <div id="m-2">
        <div class="m-4">
            <h4>Ultimos Filmes Adicionados</h4>
        </div>
        <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
            <a class="buttonCarousel prev" style="left:0;">
                <span><i class="fas fa-chevron-left"></i></span>
            </a>
            <div class="FilmCovers w-100">
                @foreach ($ult_filmes as $filme)
                    <div class="mx-2 cardFilme">
                        @includeIf('content.card_filme_layout',
                        ['titulo'=>$filme['titulo'],'imagem'=>$filme['capa_url']])
                    </div>
                @endforeach
            </div>
            <a class="buttonCarousel next" style="right: 0;">
                <span><i class="fas fa-chevron-right"></i></span>
            </a>
        </div>
    </div>
    @if (count($filmes_mais_comentados) > 0)
        <div id="m-2">
            <div class="m-4">
                <h4>Filmes Mais Comentados</h4>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach ($filmes_mais_comentados as $filme)
                        <div class="mx-2 cardFilme">
                            @includeIf('content.card_filme_layout',
                            ['titulo'=>$filme['titulo'],'imagem'=>$filme['capa_url']])
                        </div>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
    @endif
    @if (count($categorias_utimo_filmes) > 0)
        <div class="m-3">
            <h4>Ultimos por Categoria</h4>
        </div>
        @foreach ($categorias_utimo_filmes as $categoria)
            <div id="m-2">
                <div class="m-4">
                    <h4>{{ $categoria['nome'] }}</h4>
                </div>
                <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                    <a class="buttonCarousel prev" style="left:0;">
                        <span><i class="fas fa-chevron-left"></i></span>
                    </a>
                    <div class="FilmCovers w-100">
                        @foreach ($categoria['filmes'] as $filme)
                            <div class="mx-2 cardFilme">
                                @includeIf('content.card_filme_layout',
                                ['titulo'=>$filme['titulo'],'imagem'=>$filme['capa_url']])
                            </div>
                        @endforeach
                    </div>
                    <a class="buttonCarousel next" style="right: 0;">
                        <span><i class="fas fa-chevron-right"></i></span>
                    </a>
                </div>
            </div>
        @endforeach
    @endif
@endsection
