@extends('layout')
@section('title')
    Gerenciar
@endsection
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-select/dist/css/bootstrap-select.css') }}">
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

        .add-filme {
            width: 94%;
            height: 100%;
            font-size: 2em;
            background-color: #FFFFFFCC;
        }

        .add-filme:hover {
            background-color: #FFFFFFEE;
        }

        .add-filme:active {
            background-color: #FFFFFFCC;
        }

        .h-80 {
            height: 80vh !important;
        }

        .add-filme-case {
            width: 3.5em;
            height: 5em;
            font-size: 2em;
            background-color: #FFFFFFCC;
        }

        .add-filme-active-case {
            color: black;
        }

        .add-filme-case-disable {
            color: #a1a1a1FF;
        }

        .add-filme-case-active:hover {
            cursor: pointer;
            background-color: #FFFFFFEE;
        }

        .add-filme-case-active:active {
            background-color: #FFFFFFCC;
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

        .gridPerson .btnPerson {
            background-color: #F8F8FF;
            color: #000000DD;
        }

        .gridPerson .btnPerson:hover {
            background-color: #000000FF;
            color: #F8F8FF;
        }

        .gridPerson .btnPerson:active {
            background-color: #F8F8FF;
            border-color: #000000DD;
            color: #000000DD;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex">
        <div id="list-btn" class="d-flex flex-column">
            <div class="btn btnPerson" id="filmes">Filmes</div>
            <span id='drop'>
                <form method="get">
                    <ul class="d-flex flex-column">
                        <input class="btn btnPerson" type="submit" value="Últimos adicionados">
                        @foreach (range(1, 1) as $item)
                            <input class="btn btnPerson" type="submit" name="categoria"
                                value="Categoria {{ $item }}">
                        @endforeach
                    </ul>
                </form>
            </span>
            <div class="btn btnPerson" id="user">Usuários</div>
            <div class="btn btnPerson" id="category">Categorias Filme</div>
        </div>
        <div class="w-100 container">
            <div class="d-none filmes">
                <div id="ult" class="@if (isset($request['categoria'])) d-none @endif gridPerson">
                    <a href='#' class="m-1" data-toggle="modal" data-target="#add-filme">
                        <div class="card add-filme d-flex justify-content-center align-items-center">
                            <i class="fas fa-plus mb-2"></i>
                        </div>
                    </a>
                    @foreach (range(1, 1) as $item)
                        @includeIf('content.card_filme_layout', ['date_value'=>$item,'url'=>'#','titulo'=>"$item
                        Titulo Filme",
                        'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
                    @endforeach
                </div>
                <div id="categeria" class="@if (!isset($request['categoria'])) d-none @endif gridPerson">
                    @if (isset($request['categoria']))
                        @foreach (range(1, 1) as $item)
                            @includeIf('content.card_filme_layout', ['date_value'=>$item,'url'=>'#','titulo'=>"$item
                            Titulo Filme",
                            'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg'])
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="d-none user">
                <div class="gridPerson">
                    @foreach (range(1, 1) as $item)
                        <div class="cardUser" date-value="{{ $item }}">
                            <div class="head mt-1">
                                <img class="perfil"
                                    src="https://d11a6trkgmumsb.cloudfront.net/original/3X/f/b/fbbaacfa1033254471f614b67d58dae45236ce5b.jpg">
                                <b class="p-2 name-user">Usuário {{ $item }}</b>
                                <span class="dropdown">
                                    <button class="btn btn-warning" type="button" id="buttonNoticeUser"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-exclamation-triangle"></i></button>
                                    <div class="dropdown-menu" aria-labelledby="buttonNoticeUser">
                                        <a class="dropdown-item" href="#" data-toggle="modal" date-value='1'>Avisar Sobre
                                            Comentário</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" date-value='2'>Avisar Sobre
                                            Nome Do Usuário</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" date-value='3'>Avisar Sobre
                                            Outra Coisa</a>
                                    </div>
                                </span>
                                {{-- <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> --}}
                            </div>
                            <div class="body m-2">
                                <div>Hoje</div>
                                <div>Normal</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-none category">
                <div class="gridPerson">
                    <span id="addCategori" onClick="$('#categories .modal-body input').val('')" class="btn btnPerson m-2"
                        data-toggle="modal" data-target="#categories"><i class="fas fa-plus"></i></span>
                    @foreach (range(1, 1) as $item)
                        <span class="btn btnPerson m-2 categories" date-id='{{ $item }}' data-toggle="modal"
                            data-target="#categories">Ação{{ $item }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal-fade">
        <div id="categories" class="modal fade" data-backdrop="static" aria-hidden="false">
            <div class="modal-dialog">
                <form class="modal-content" id="categories" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title-categoria" placeholder="Categoria"
                                date-value="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnPerson" id="saveCategorie">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="notf-user" class="modal fade" data-backdrop="static" aria-hidden="false">
            <div class="modal-dialog">
                <form class="modal-content" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Nome User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <select class="custom-select">
                                <option value="1">Comentario</option>
                                <option value="2">Nome Usuário</option>
                                <option value="3">Outro Assunto</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="titulo" placeholder="Título" value="" required>
                        </div>
                        <div class="input-group mb-3">
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group select-comentario">
                            <label>Comentário</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2">
                                @foreach (range(1, 10) as $item)
                                    <option value="">Filme{{ $item }}:Seção:Comentario</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnPerson">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="add-filme" class="modal fade" data-backdrop="static" aria-hidden="false">
            <div class="modal-dialog modal-xl">
                <form class="modal-content" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Filme</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column">
                            <div class="form-group d-flex flex-row">
                                <div class="mr-2 d-flex flex-column">
                                    <div
                                        class="card add-filme-case add-filme-case-active d-flex justify-content-center align-items-center mb-2">
                                        <i class="fas fa-plus mb-2"></i>
                                    </div>
                                    <input type="file" name="img" style="display:none" id="case-filme"
                                        accept=".png, .jpge, .jpg">
                                    <select name="type_file" class="form-control">
                                        <option value="file" selected>Capa Arquivo</option>
                                        <option value="imdb">Capa IMDB</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column w-75">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" placeholder="Titulo Filme">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cod" placeholder="Código IMDB">
                                    </div>
                                    <div class="form-group">
                                        <select name="categoria" class="selectpicker w-100" title="Selecione as categorias"
                                            data-live-search="true" data-size="4" multiple>
                                            <option value="ola">Ola</option>
                                            <option value='tudo bem'>Tudo bem</option>
                                            <option value='massa'>Massa</option>
                                            <option>Ola1</option>
                                            <option>Tudo bem2</option>
                                            <option>Massa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Descrição"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnPerson">Adicionar Filme</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="edit-filme" class="modal fade" data-backdrop="static" aria-hidden="false">
            <div class="modal-dialog modal-xl">
                <form class="modal-content" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar {Nome Filme}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column">
                            <div class="form-group d-flex flex-row">
                                <div class="mr-2 d-flex flex-column">
                                    <div
                                        class="card add-filme-case add-filme-case-active d-flex justify-content-center align-items-center mb-2">
                                        <img class="d-block mx-auto img-fluid" src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg" alt="Imagem Filme">
                                        {{-- <i class="fas fa-plus mb-2"></i> --}}
                                    </div>
                                    <input type="file" name="img" style="display:none" id="case-filme"
                                        accept=".png, .jpge, .jpg">
                                    <select name="type_file" class="form-control">
                                        <option value="file" selected>Capa Arquivo</option>
                                        <option value="imdb">Capa IMDB</option>
                                    </select>
                                </div>
                                <div class="d-flex flex-column w-75">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" placeholder="Titulo Filme">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cod" placeholder="Código IMDB">
                                    </div>
                                    <div class="form-group">
                                        <select name="categoria" class="selectpicker w-100" title="Selecione as categorias"
                                            data-live-search="true" data-size="4" multiple>
                                            <option>Ola</option>
                                            <option>Tudo bem</option>
                                            <option>Massa</option>
                                            <option>Ola1</option>
                                            <option>Tudo bem2</option>
                                            <option>Massa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Descrição"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnPerson">Salvar Filme</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src='{{ URL::asset('libs/bootstrap-select/dist/js/bootstrap-select.js') }}'></script>
    <script>
        $('.selectpicker').selectpicker();
        $('.filme').hover(function() {
            $(this).children().next().slideToggle('fast')
        });
        $('.categories').click(function() {
            let value = $(this).text()
            $('#categories .modal-body input').attr('date-value', value)
            $('#categories .modal-body input').val(value)
        });
        $('#saveCategorie').click(function() {
            let val = $('#categories .modal-body input').attr('date-value')
            if (val != '') {
                $('#categories .modal-body').append("<input type='hidden' name='before-title-categoria' value=" +
                    val + ">")
            }
        });
        $('#list-btn div').click(function() {
            let id = $(this).attr('id')
            $('.container').children().each(function() {
                if (!$(this).hasClass('d-none')) {
                    $(this).toggleClass('d-none');
                }
            });
            $('.' + id).toggleClass('d-none');
            if (id == 'filmes') {
                $('#drop').toggle('slow');
            } else if (id != 'filmes' && $('#drop').css('display') == 'block') {
                $('#drop').toggle('slow');
            }
        });
        $("#filmes").trigger('click');

        $('#notf-user .custom-select').change(function() {
            if ($(this).val() != 1) {
                $('.select-comentario').addClass('d-none');
            } else {
                $('.select-comentario').removeClass('d-none');
            }
        });
        $('.filme').click(function() {
            //acess API
            console.log($(this).attr('date-value'));
            $('#edit-filme').modal('show');
        });
        $('.cardUser .dropdown-item').click(function() {
            //acess API
            $('#notf-user .custom-select').val($(this).attr('date-value'));
            if ($(this).attr('date-value') != 1) {
                $('.select-comentario').addClass('d-none');
            } else {
                $('.select-comentario').removeClass('d-none');
            }
            var IdUser = $(this).closest('.cardUser').attr('date-value');
            // $('#notf-user .modal-title').text(nameUser)
            $('#notf-user').modal('show');
        });
        $('form .add-filme-case').click(function() {
            $('#case-filme').trigger('click');
        });
        $('select').change(function() {
            if (this.value == 'imdb') {
                $('#case-filme').attr('disabled', '').removeAttr('name')
                $('.add-filme-case').removeClass('add-filme-case-active').addClass('add-filme-case-disable')
            } else {
                $('#case-filme').attr('name', 'img').removeAttr('disabled')
                $('.add-filme-case').removeClass('add-filme-case-disable').addClass('add-filme-case-active')
            }
        });
    </script>

@endsection
