@extends('layout')
@section('title')
    {{ $categoria }}
@endsection
@section('style')
    <style>
        .filme img {
            max-height: 50vh;
        }

        .row {
            margin: 0 auto;
        }

    </style>
@endsection
@section('content')
    @include('filme.nav')
    <div>
        <h4 class="m-3">Titulo Categoria {{ $categoria }}</h4>
        <div class="container-fluid mb-2">
            <div class="row">
                @foreach (range(1, 10) as $item)
                    <div class="col-auto mb-2">
                        @includeIf('content.card_layout', ['titulo'=>"$item Titulo Filme",
                        'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Anterior</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Próximo">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </li>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.filme').hover(function() {
            $(this).children().next().slideToggle('fast')
        });
    </script>
@endsection
