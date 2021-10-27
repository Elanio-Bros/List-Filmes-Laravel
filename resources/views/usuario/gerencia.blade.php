@extends('layout')
@section('title')
    Gerenciar
@endsection
@section('style')
    <style>
        #drop {
            display: none;
        }

        .usuario {
            width: 35%;
        }

        .usuario .head {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-around;
            align-items: center;
            font-size: 90%;
        }

        .usuario .head i {
            font-size: 120%;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex border1">
        <div class="w-25 border2 d-flex flex-column list-btn">
            <div class="btn btnPerson" id="filme">Filmes</div>
            <div id='drop'>
                <form>
                    <ul class="d-flex flex-column">
                        @foreach (range(1, 10) as $item)
                            <input class="btn" type="submit" name="categoria"
                                value="Categoria{{ $item }}">
                        @endforeach
                    </ul>
                </form>
            </div>
            <div class="btn btnPerson" id="user">Usuários</div>
        </div>
        <div class="w-75 border1 content">
            <div class="d-none filme">Filmes</div>
            <div class="d-none user">Usuários
                {{-- <div class="usuario" style="color:black">
                    <div class="card-header d-flex border-0">
                        <img class="perfil"
                            src="https://d11a6trkgmumsb.cloudfront.net/original/3X/f/b/fbbaacfa1033254471f614b67d58dae45236ce5b.jpg">
                        <b class="p-2">Nome Usuario</b>
                        <i class="far fa-trash-alt"></i>
                        <i class="fas fa-edit"></i>
                    </div>
                    <div class="card-body p-2">
                        <blockquote class="m-2">
                            <p>Ola</p>
                            <p>Ola</p>
                            <p>Ola</p>
                        </blockquote>
                    </div>
                </div> --}}
                <div class="usuario border1">
                    <div class="head">
                        <img class="perfil"
                            src="https://d11a6trkgmumsb.cloudfront.net/original/3X/f/b/fbbaacfa1033254471f614b67d58dae45236ce5b.jpg">
                        <p class="p-2">Nome Usuario</p>
                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="body">
                        Ola
                        Ola
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.btnPerson').click(function() {
            let id = $(this).attr('id')
            let gradeClass = (id == 'filme' ? 'user' : 'filme')
            $('.' + id).toggleClass('d-none', 'd-flex');
            if (!$('.' + gradeClass).hasClass('d-none')) {
                $('.' + gradeClass).toggleClass('d-none', 'd-flex');
            } else if ($('.' + id).hasClass('d-none') && $('.' + gradeClass).hasClass('d-none')) {
                $('.' + gradeClass).toggleClass('d-none', 'd-flex');
            }
            // $('#drop').toggle('slow');
        });
        $("#user").trigger('click');
    </script>

@endsection
