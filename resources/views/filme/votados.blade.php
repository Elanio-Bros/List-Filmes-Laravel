@extends('filme.layout.layout_grade_list')
@section('title')
    Votados
@endsection
@section('title_page')
    Votados
@endsection
@section('grade')
    <div class="gridPerson w-100">
        @foreach ($filmes as $filme)
            <div class="col-auto mb-2">
                @includeIf('content.card_filme_layout', [
                    'titulo' => $filme['titulo'],
                    'imagem' => $filme['capa_url'],
                    'code_url' => $filme['imdb_code'],
                ])
            </div>
        @endforeach
    </div>
    @includeIf('content.paginate', ['element' => $filmes])
@endsection
