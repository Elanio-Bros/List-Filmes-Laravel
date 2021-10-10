@extends('layout')
@section('title')
    {{ $idFilme }}
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
        }

        #categorias li {
            list-style-type: none;
            border: solid black 1px;
            border-radius: 4px;
            padding: 2px 4px;
            font-size: 0.8em;
            margin-left: 0.2em;
        }

        #categorias li:hover {
            background-color: black;
            color: white;
        }

        .desc {
            max-width: 100%;
            font-size: 15px;
            text-align: justify;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 6;
            -webkit-box-orient: vertical;
            -webkit-box-pack: end;
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
            background-color: white;
            padding: 5px;
            width: 80%;
            text-align: justify;
            border-radius: 5px;
        }

        .descOcult #close {
            display: flex;
            justify-content: flex-end;
            width: 80%;
            color: white;
            font-size: 20px;
        }

        .comentario {
            margin-bottom: 5px;
        }

        .chat,
        .titulo-chat {
            background-color: black;
            color: #ffffff;
            border: 0.1em solid black;
            border-radius: 2px;
            margin-top: 0.1em;
        }

        .formUser button{
            font-size: 2vh;
        }

        .titulo-chat {
            font-weight: bolder;
            border-radius: 5px 5px 0px 0px;
        }

        .chat:hover {
            cursor: pointer;
            background-color: #000000AA;
        }

        .chat:active {
            cursor: pointer;
            background-color: #FFFFFF;
            color: black;
            border: 0.1em solid black;
        }

        .chat .dot {
            height: 1.4vh;
            width: 1.4vh;
            border-radius: 50%;
            display: inline-block;
        }

        .chat .dot[date-value='active'] {
            background-color: green;
        }

        .chat .dot[date-value='suspended'] {
            background-color: gold;
        }

        .chat .dot[date-value='deactivate'] {
            background-color: red;
        }

    </style>
@endsection
@section('content')
    @include('filme.nav')
    <div id="mostFilme">
        <img class="ml-2 py-2" src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg">
        <div class="ml-3 m-2 w-100">
            <h3>Titulo Filme</h3>
            <div id="categorias" class="d-flex flex-row">
                @foreach (range(1, 4) as $item)
                    <a href="Categoria{{ $item }}">
                        <li>Categoria{{ $item }}</li>
                    </a>
                @endforeach
            </div>
            <div class="my-1">
                <div>Quantidade de Votos</div>
                <div id="voteUsers"></div>
                <form class="formUser d-none">
                    <div id="voteUsersForm" class=""></div>
                    <span class="ml-2">
                        <button type=" button" class="btn btn-primary">Votar</button>
                        <button type="button" class="btn btn-primary" onclick="document.location.reload()">Cancelar</button>
                    </span>
                </form>
                <span><span class="voteUserVal">3.1</span> media de 250 votos</span>
                {{-- <a href="https://www.google.com.br/">
                <div id="voteIMDB" class="vote w-25 border3"></div>
            </a> --}}
                <a href="#">
                    <div id="voteIMDB"></div>
                </a>
                <span><span class="voteIMDBVal">4.5</span> media de 250 votos no IMDB</span>
            </div>
            <div>
                <div id="desc" class="w-100 desc">
                    Descrição wiki
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas a quam vestibulum, dapibus tellus ac,
                    commodo lorem. Ut elementum tempus aliquam. Duis faucibus tincidunt sem a placerat. Nullam facilisis,
                    urna.
                </div>
                <a id="leanMore">leia mais</a>
                <div class="descOcult d-none">
                    <div id="close">
                        <a><i class="fas fa-times"></i></a>
                    </div>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-2">
    <div class="d-flex flex-row justify-content-between p-2 w-100">
        <div class="w-75 d-flex flex-column">
            <button class="btn btn-block" arial-label="criar novo tópico" type="button"><i
                    class="fas fa-plus"></i></button>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse1" aria-expanded="true">Comentarios Gerais</button>
                        </h2>
                    </div>
                    <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            @includeIf('content.comentario_layout',['name'=>'juaão','comentario'=>'olaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaola'])
                            @includeIf('content.comentario_layout',['name'=>'juaão','comentario'=>'olaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaola'])
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapse2" aria-expanded="true">Comentario Sobre Ola</button>
                        </h2>
                    </div>
                    <div id="collapse2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            @includeIf('content.comentario_layout',['name'=>'juaão','comentario'=>'olaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaolaola'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-25 ml-2 chats">
            <div class="titulo-chat text-center">Chat</div>
            <div class="d-flex flex-column">
                <div class="chat p-2 d-flex justify-content-center">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="chat p-2 d-flex justify-content-between">
                    <span>
                        <div class="h6">Titulo Chat</div>
                        <div style="font-size:80%">09/11 Usuário</div>
                    </span>
                    <span class="dot" date-value='active'></span>
                </div>
                <div class="chat p-2 d-flex justify-content-between">
                    <span>
                        <div class="h6">Titulo Chat</div>
                        <div style="font-size:80%">09/11 Usuário</div>
                    </span>
                    <span class="dot" date-value='suspended'></span>
                </div>
                <div class="chat p-2 d-flex justify-content-between">
                    <span>
                        <div class="h6">Titulo Chat</div>
                        <div style="font-size:80%">09/11 Usuário</div>
                    </span>
                    <span class="dot" date-value='deactivate'></span>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src='{{ URL::asset('libs/rating/jquery.star-rating-svg.js') }}'></script>
    <script>
        $('#leanMore').click(function() {
            if ($('.descOcult p').text().length <= 0) {
                $('.descOcult p').text($('.desc').text())
            }
            $('.descOcult').attr('style', 'display: flex !important');
            $('body').attr('style', 'overflow: hidden');
        });
        $('#close').click(function() {
            $('.descOcult').removeAttr('style', 'display: flex !important');
            $('body').removeAttr('style', 'overflow: hidden');
        });
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
        }
        $(function() {
            $('#voteUsers, #voteIMDB').starRating(configRating);
            $('#voteUsers').starRating('setRating', parseFloat($('.voteUserVal').text()))
            $('#voteIMDB').starRating('setRating', parseFloat($('.voteIMDBVal').text()))
        });
        $('#voteUsers').dblclick(function() {
            $('#voteUsers').hide();
            configRating['disableAfterRate'] = false
            configRating['readOnly'] = false
            $('.formUser').attr('style', 'display: flex !important');
            $("#voteUsersForm").starRating(configRating);
        });
    </script>
@endsection
