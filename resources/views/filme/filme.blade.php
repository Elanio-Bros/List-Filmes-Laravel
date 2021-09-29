@extends('layout')
@section('title')
    {{ $idFilme }}
@endsection
@section('style')
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        #mostFilme {
            display: flex;
            width: 100%;
        }

        #mostFilme img {
            width: 20%;
        }

        .vote {
            display: flex;
            width: 100%;
        }

        .star_full,
        .star_middle,
        .star_void {
            display: none;
            width: 2em;
            stroke: #FFA500FF;
        }

        /* .star_full:hover,
                                                                                                                                                                                                                                                                            .star_middle:hover,
                                                                                                                                                                                                                                                                            .star_void:hover {
                                                                                                                                                                                                                                                                                cursor: pointer;
                                                                                                                                                                                                                                                                            } */

        .star_full {
            fill: #FFA500FF;
        }

        .star_middle #star_middle-left {
            fill: #FFA500FF;
        }

        .star_middle #star_middle-right {
            fill: #00000000;
        }

        .star_void {
            fill: #00000000;
        }

    </style>
@endsection
@section('content')
    @include('filme.nav')
    @include('content.stars')
    <div id="mostFilme" class="border1">
        <img class="ml-2 py-2" src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg">
        <div id="values" class="ml-3 m-2 w-100 border2">
            <h3>Titulo Filme</h3>
            <div>Cantegorias</div>
            <div>Classificação</div>
            <div id="voteUsers" class="vote w-25 border3"></div><span>4.1 media de 250 votos</span>
            <div id="voteIMDB" class="vote w-25 border3"></div>
            <span>4.1 media de 250 votos</span>
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
    <script>
        let vote_user = $("#voteUsers")
        let vote_imdb = $("#voteIMDB")
        let Mediavote = 1.4;

        function voteStar(result, element) {
            result = (result * 2).toFixed() / 2;
            for (stars = 0.5; stars <= 5; stars++) {
                if (!Number.isInteger(result) && stars == result) {
                    $(".star_middle:first").clone().appendTo(element).show();
                } else if (stars <= parseInt(result)) {
                    $(".star_full:first").clone().appendTo(element).show();
                } else {
                    $(".star_void:first").clone().appendTo(element).show();
                }
            }
        }

        voteStar(Mediavote, vote_user)
        voteStar(3.5, vote_imdb)
    </script>
@endsection
