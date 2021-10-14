@extends('layout')
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
    @include('content.nav')
    <div>
        <div class="d-flex flex-row justify-content-between mb-2">
            <h4 class="m-3">@yield('title_page')</h4>
            <div class="w-25 d-flex align-items-center">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected>--Ordenar Por--</option>
                    <option>Mais Votados</option>
                    <option>Menos Votados</option>
                    <option>Alfabetica</option>
                </select>
            </div>
        </div>
        @yield('grade')
        <div class="d-flex justify-content-center m-2">
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
