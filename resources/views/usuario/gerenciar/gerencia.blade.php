@extends('layout')
@section('title')
    Gerenciar
@endsection
@section('style')
    <style>
        #drop {
            display: none;
        }

        #list-btn {
            width: 20%;
        }

        .user .grid,
        #ult,
        #categeria {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(auto, 25%));

        }

        .cardUser:hover {
            cursor: pointer;
        }

        .cardUser {
            width: 95%;
            padding: 0.5em;
            margin: 0.2em;
            color: black;
            background-color: white;
            border-radius: 3px;
            font-size: 75%;
        }

        .cardUser .head {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-around;
            align-items: center;
        }

        .cardUser .head b {
            max-width: 500px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex">
        <div id="list-btn" class="d-flex flex-column">
            <div class="btn btnPerson" id="filmes">Filmes</div>
            <div id='drop'>
                <form method="get">
                    <ul class="d-flex flex-column">
                        <input class="btn btnPerson" type="submit" value="Últimos adicionados">
                        @foreach (range(1, 10) as $item)
                            <input class="btn btnPerson" type="submit" name="categoria"
                                value="Categoria {{ $item }}">
                        @endforeach
                    </ul>
                </form>
            </div>
            <div class="btn btnPerson" id="user">Usuários</div>
        </div>
        <div class="w-100">
            <div class="d-none filmes">
                <div id="ult" class="@if (isset($request['categoria'])) d-none @endif gridPerson">
                    {{-- <div class="card filme" style="width: 13rem;">
                        <img class="d-block mx-auto img-fluid" src="Ola" alt="Imagem de um Filme">
                    </div> --}}
                    @foreach (range(1, 10) as $item)
                        @includeIf('content.card_filme_layout', ['titulo'=>"$item Titulo Filme",
                        'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
                    @endforeach
                </div>
                <div id="categeria" class="@if (!isset($request['categoria'])) d-none @endif gridPerson">
                    @foreach (range(1, 10) as $item)
                        @includeIf('content.card_filme_layout', ['titulo'=>"$item Titulo Filme",
                        'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
                    @endforeach
                </div>
            </div>
            <div class="d-none user">
                <div class="gridPerson">
                    @foreach (range(1, 20) as $item)
                        <div class="cardUser">
                            <div class="head mt-1">
                                <img class="perfil"
                                    src="https://d11a6trkgmumsb.cloudfront.net/original/3X/f/b/fbbaacfa1033254471f614b67d58dae45236ce5b.jpg">
                                <b class="p-2">Nome UsuarioNome Usuario</b>
                                <span class="dropdown">
                                    <button class="btn btn-warning" type="button" id="buttonNoticeUser"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-exclamation-triangle"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="buttonNoticeUser">
                                        <a class="dropdown-item" href="#">Notificar Sobre Comentário</a>
                                        <a class="dropdown-item" href="#">Notificar Sobre Filme</a>
                                    </div>
                                </span>
                                {{-- <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> --}}
                            </div>
                            <div class="body m-2">
                                <div>Hoje as 10 horas</div>
                                <div>Normal</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#filmes,#user').click(function() {
            let id = $(this).attr('id')
            let gradeClass = (id == 'filmes' ? 'user' : 'filmes')
            $('.' + id).toggleClass('d-none');
            if (!$('.' + gradeClass).hasClass('d-none')) {
                $('.' + gradeClass).toggleClass('d-none');
            } else if ($('.' + id).hasClass('d-none') && $('.' + gradeClass).hasClass('d-none')) {
                $('.' + gradeClass).toggleClass('d-none');
            }
            $('#drop').toggle('slow');
        });
        $("#filmes").trigger('click');
        $('.filme').hover(function() {
            $(this).children().next().slideToggle('fast')
        });
    </script>

@endsection
