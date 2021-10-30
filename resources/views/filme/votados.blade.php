@extends('filme.layout.layout_grade_list')
@section('title')
    Votados
@endsection
@section('title_page')
    Votados
@endsection
@section('grade')
    <div class="gridPerson w-100">
        @foreach (range(1, 15) as $item)
            <div class="col-auto mb-2">
                @includeIf('content.card_filme_layout', ['titulo'=>"$item Titulo Filme",
                'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
            </div>
        @endforeach
    </div>
@endsection
