@extends('layout')
@section('title')
    Gerenciar
@endsection
@section('style')
    <style>
        #drop {
            display: none;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex border1">
        <div class="w-25 border2 d-flex flex-column">
            <div class="btn" id="buttonDrop">Filmes</div>
            <div id='drop'>
                <form action="">
                    <ul class="d-flex flex-column">
                        @foreach (range(1, 10) as $item)
                            <input class="btn" type="submit" name="categoria" value="Categoria{{ $item }}">
                        @endforeach
                    </ul>
                </form>
            </div>
            <div class="btn">Usuários</div>
        </div>
        <div class="w-75 border1 content">
            <div class="">
                Filmes
            </div>
            <div class="">Usuários</div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#buttonDrop').click(function() {
            $('#drop').toggle('slow');
        });
    </script>

@endsection
