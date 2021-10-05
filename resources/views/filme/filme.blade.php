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

        .formUser {
            display: none;
        }

        #categorias span {
            border: solid black 1px;
            border-radius: 4px;
            padding: 2px;
        }

        #clasificacao {
            border: solid black 1px;
            border-radius: 1px;
            padding: 2px;
        }

    </style>
@endsection
@section('content')

    @include('filme.nav')
    {{-- @include('content.stars') --}}
    <div id="mostFilme" class="border1">
        <img class="ml-2 py-2" src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg">
        <div id="values" class="ml-3 m-2 w-100 border2">
            <h3>Titulo Filme</h3>
            <div id="categorias">
                <span><a href="Categoria1">Categoria1</a></span>
                <span><a href="Categoria2">Categoria2</a></span>
            </div>
            <div id="clasificacao">XX</div>
            <div id="voteUsers" class="w-25">
            </div>
            <form class="formUser">
                <div id="voteUsersForm" class="w-25">
                </div>
                <button type="button" class="btn btn-primary">Votar</button>
                <button type="button" class="btn btn-primary" onclick="document.location.reload()">Cancelar</button>
            </form>
            <span><span class="voteUserVal">3.1</span> media de 250 votos</span>
            {{-- <a href="https://www.google.com.br/">
                <div id="voteIMDB" class="vote w-25 border3"></div>
            </a> --}}
            <a href="#">
                <div id="voteIMDB" class="w-25"></div>
            </a>
            <span><span class="voteIMDBVal">4.5</span> media de 250 votos no IMDB</span>
            <div class="w-100 border3">
                Descrição e outros
            </div>
        </div>
    </div>
    <div>
        <div>Div Comentarios</div>
        <div>Chats</div>
    </div>
@endsection
@section('script')
    <script src='{{ URL::asset('libs/rating/jquery.star-rating-svg.js') }}'></script>
    <script>
        let configRating = {
            totalStars: 5,
            minRating: 0,
            starShape: 'rounded',
            starSize: 40,
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
            $('.formUser').css('display', 'flex');
            $("#voteUsersForm").starRating(configRating);
        });
    </script>
@endsection
