@extends('filme.layout.layout_grade_list')
@section('title')
    {{$categoria}}
@endsection
@section('title_page')
    Categoria: {{ $categoria }}
@endsection
@section('grade')
    <div class="gridPerson">
            @foreach (range(1, 10) as $item)
                <div class="col-auto mb-2">
                    @includeIf('content.card_filme_layout', ['titulo'=>"$item Titulo Filme",
                    'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
                </div>
            @endforeach
    </div>
@endsection
