@extends('layout')
@section('title')
    {{ $filme['titulo'] }}
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/rating/css/star-rating-svg.css') }}">
    <style>
        #mostFilme {
            display: flex;
            width: 100%;
        }

        #mostFilme img {
            width: 20%;
            max-height: 50vh;
        }

        #categorias li {
            list-style-type: none;
            border: solid #F8F8FFFF 1px;
            border-radius: 4px;
            padding: 2px 4px;
            font-size: 0.8em;
            margin-left: 0.2em;
            color: #F8F8FFFF;
        }

        #categorias li:hover {
            background-color: #F8F8FFFF;
            color: #000000DD;
        }

        .area {
            padding: 5px;
            background-color: #000000DD;
            color: #F8F8FFFF;
            font-size: 0.8em;
        }

        #desc,
        #leanMore {
            text-align: justify;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            -webkit-box-pack: end;
        }

        #leanMore {
            width: 5em;
        }

        #leanMore:hover {
            text-decoration: underline #F8F8FFFF;
        }

        .descOcult {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #000000DD;
            z-index: 5;
        }

        .descOcult p {
            background-color: #000000DD;
            padding: 1em;
            width: 70%;
            text-align: justify;
            border-radius: 1px;
            overflow-y: scroll;
            max-height: 50%;
        }

        .descOcult #close {
            display: flex;
            justify-content: flex-end;
            width: 70%;
            color: #F8F8FFFF;
            font-size: 20px;
        }

        .comentario {
            margin-bottom: 5px;
            color: #000000DD;
        }

        .titulo {
            background-color: #151515FF;
            color: #F8F8FFFF;
            border: 0.1em solid #202020FF;
            height: 2em;
            font-size: 1em;
            border-radius: 5px 5px 0px 0px;
        }

        .formUser button {
            font-size: 0.9em;
        }

        .groups {
            overflow-y: auto;
            height: 30vh;
        }

        .accordion .card {
            background-color: #191919;
        }

        .comentario .card-body {
            border: 1px solid white;
        }

        .accordion .card-body {
            color: white;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div id="mostFilme">
        <img class="ml-2 py-2" src="{{ $filme['capa_url'] }}">
        <div class="ml-3 m-2 w-100">
            <div>
                <span class="h4">{{ $filme['titulo'] }}</span>
                {{-- <span class="dropdown ml-3">
                    <a class="ropdown-toggle" role="button" id="moreOptionDropDown" data-toggle="dropdown"
                        aria-haspopup="true"><i class="fas fa-ellipsis-h" style='color:white;'></i></a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="moreOptionDropDown">
                        <a class="dropdown-item">Adicionar aos Favoritos</a>
                        {{-- <a class="dropdown-item">Novo Group</a> 
                        <a class="dropdown-item">Novo Aba Comentarios</a>
                    </div>
                </span> --}}
            </div>
            <div id="categorias" class="d-flex flex-row my-2">
                @foreach ($filme['categoriasFilmes'] as $categoria)
                    <a href="{{ url('/filme/categoria/' . $categoria['nome']) }}">
                        <li>{{ $categoria['nome'] }}</li>
                    </a>
                @endforeach
            </div>
            <div class="my-2 area">
                <strong>Quantidade de Votos</strong>
                <div id="voteUsers"></div>
                <form class="formUser d-none" method="POST"
                    action="{{ route('voto', ['code_url' => $filme['imdb_code']]) }}">
                    @csrf
                    <div id="areaStarVote">
                        <div id="voteUsersForm" class=""></div>
                        <select name="voto" hidden>
                            <option value="0" selected></option>
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            <option value="4"></option>
                            <option value="5"></option>
                        </select>
                    </div>
                    <span class="ml-2">
                        <button type="submit" class="btn btnPerson">Votar</button>
                        <button name="cancelar" type="button" class="btn btnPerson">Cancelar</button>
                    </span>
                </form>
                <span><span class="voteUserVal">{{ $filme['nota_media'] }}</span>/5 em média de
                    {{ $filme['votos_count'] }} votos</span>
                <a href="https://www.imdb.com/title/{{ $filme['imdb_code'] }}/">
                    <div id="voteIMDB" class="vote w-25"></div>
                </a>
                <span><span class="voteIMDBVal">{{ $filme['nota_imdb'] }}</span>/10 em média no IMDB</span>
            </div>
            <div>
                <div class="area">
                    <div id="desc" class="w-100">{{ $filme['descricao'] }}</div>
                    <a id="leanMore">Ler Mais</a>
                </div>
                <div class="descOcult d-none">
                    <div id="close">
                        <a><i class="fas fa-times"></i></a>
                    </div>
                    <div class="h4">Descrição completa</div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-2">
    <div class="d-flex flex-row justify-content-between p-2 w-100">
        <div class="w-100 d-flex flex-column">
            <div class="titulo text-center">Grupos de Comentários</div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">
                            <button class="btn btnPerson  btn-block" arial-label="criar novo tópico" type="button"
                                data-toggle="modal" data-target="#modalGrupoComentario">
                                <i class="fas fa-plus"></i></button>
                        </h2>
                    </div>
                </div>
            </div>
            @foreach ($filme['grupos'] as $grupo)
                <div class="accordion">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btnPerson btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#grupo{{ $grupo['id'] }}"
                                aria-expanded="true"><span class="grupo-titulo">{{ $grupo['titulo'] }}</span></button>
                        </div>
                        <div id="grupo{{ $grupo['id'] }}" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($grupo['comentarios'] as $comentario)
                                    @includeIf('content.comentario_layout',['name'=>$comentario['usuario'][0]['nome'],'comentario'=>$comentario['comentario']])
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <form>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="comentario"
                                            placeholder="Comentario..." aria-label="Username"
                                            aria-describedby="basic-addon1">
                                        <button type="button" class="btn btnPerson comentar">Comentar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="w-25 ml-2">
            <div class="titulo text-center">Groups</div>
            <div class="d-flex flex-column groups">
                <div class="chat p-2 d-flex justify-content-center">
                        <i class="fas fa-plus"></i>
                </div>
                @includeIf('content.chat_layout',['title'=>'Titulo Massa','users'=>'12/30','value'=>'active'])
                @includeIf('content.chat_layout',['title'=>'Titulo Massa','users'=>'12/30','value'=>'suspended'])
                @includeIf('content.chat_layout',['title'=>'Titulo Massa','users'=>'12/30','value'=>'deactivate'])
            </div>
        </div> --}}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalGrupoComentario" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                @if ($errors->any() && array_key_exists('grupo', $errors->messages()))
                    <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                        {{ $errors->messages()['grupo'][0] }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form class="modal-content" method="POST"
                    action="{{ route('criarGrupo', ['code_url' => $filme['imdb_code']]) }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Criar Grupo para Comentario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="titulo_grupo" placeholder="Título do Grupo">
                            <small class="form-text text-muted">Não coloque Títulos Já Existentes</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btnPerson">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    @section('script')
        <script src='{{ URL::asset('libs/rating/jquery.star-rating-svg.js') }}'></script>
        <script>
            let configRating = {
                totalStars: 5,
                minRating: 0,
                starShape: 'rounded',
                starSize: 30,
                emptyColor: '#FFFFFFFF',
                hoverColor: '#FFAE00FF',
                strokeColor: '#FFA500FF',
                strokeWidth: 9,
                useGradient: false,
                disableAfterRate: true,
                readOnly: true,
                useFullStars: true,
                callback: function(currentRating, element) {
                    console.log(currentRating);
                    $('select[name="voto"]').val(currentRating);
                },
            }
            $(function() {
                $('#voteUsers,#voteIMDB').starRating(configRating);
                let voteUser = parseFloat($('.voteUserVal').text())
                let voteIMDB = parseFloat($('.voteIMDBVal').text() / 2)
                if (voteUser > 0) {
                    $('#voteUsers').starRating('setRating', voteUser)
                }
                if (voteIMDB > 0) {
                    $('#voteIMDB').starRating('setRating', voteIMDB)
                }
                @if ($errors->any() && array_key_exists('grupo', $errors->messages()))
                    $('#modalGrupoComentario').modal('show');
                    setTimeout(function(){
                    $('.alert').alert('close')
                    }, 5000);
                @endif

            });
            $('#voteUsers').dblclick(function() {
                $('#voteUsers').hide();
                configRating['disableAfterRate'] = false
                configRating['readOnly'] = false
                $('.formUser').attr('style', 'display: flex !important');
                startFromStar();

            });
            $('button[name="cancelar"]').on({
                click: function() {
                    $("#voteUsersForm").remove();
                    $('#areaStarVote').append('<div id="voteUsersForm" class=""></div>')
                    $("#voteUsersForm").starRating(configRating);
                    $('select[name="voto"]').val(0);
                },
                dblclick: function() {
                    $('.formUser').hide();
                    $('#voteUsers').show();
                }
            });
            $('#leanMore').click(function() {
                window.scrollTo(0, 0);
                if ($('.descOcult p').text().length <= 0) {
                    $('.descOcult p').text($('#desc').text())
                }
                $('.descOcult').attr('style', 'display: flex !important');
                $('body').attr('style', 'overflow: hidden');
            });
            $('#close').click(function() {
                $('.descOcult').removeAttr('style', 'display: flex !important');
                $('body').removeAttr('style', 'overflow: hidden');
            });
            $('.comentar').click(function() {
                console.log($(this).parents('.grupo-titulo'))
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    url: "{{ route('comentario', ['code_url' => $filme['imdb_code']]) }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}","id_grupo":$(this).closest('.collapse').attr('id')
                    },
                }).done(function(response) {
                    // let id = $(this).closest('.collapse').attr('id')
                    // console.log($(this).closest('.accordion .card .card-header').children());
                    console.log(response);

                }).fail(function(jqXHR, textStatus) {
                    console.log("Request failed: " + textStatus);

                })
            });

            function startFromStar() {
                $("#voteUsersForm").starRating(configRating);
                @if (isset($filme['usuario_voto']))
                    let user_voto = {{ $filme['usuario_voto'] }};
                    if (user_voto > 0) {
                    $("#voteUsersForm").starRating('setRating',user_voto)
                    $('select[name="voto"]').val(user_voto);
                    }
                @endif
            }
        </script>
    @endsection
