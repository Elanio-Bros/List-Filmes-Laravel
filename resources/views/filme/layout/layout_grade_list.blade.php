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
        @include('content.order')
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
