@extends('filme.layout.layout_scroll_list')
@section('title') Notas @endsection
@section('style_list')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('libs/rating/css/star-rating-svg.css') }}">
    <style>
        .jq-star:hover {
            cursor: default !important;
        }

    </style>
@endsection
@section('list')
    @foreach (range(5, 0) as $item)
        <div id="m-2">
            <div class="m-4">
                <div><span class="star"></span></div>
            </div>
            <div class="CarouselFilmes d-flex my-3 align-items-center" style="max-height: 1280px;">
                <a class="buttonCarousel prev" style="left:0;">
                    <span><i class="fas fa-chevron-left"></i></span>
                </a>
                <div class="FilmCovers w-100">
                    @foreach (range(1, 10) as $item)
                        <a href="#">
                            <div class="mx-2 cardFilme">
                                @includeIf('content.card_filme_layout',
                                ['titulo'=>"$item Titulo Filme",
                                'imagem'=>'https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg']
                                )
                            </div>
                        </a>
                    @endforeach
                </div>
                <a class="buttonCarousel next" style="right: 0;">
                    <span><i class="fas fa-chevron-right"></i></span>
                </a>
            </div>
        </div>
    @endforeach
@endsection
@section('script_list')
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
        }
        $(function() {
            $('.star').starRating(configRating);
            $('.star').each(function(element) {
                if (element > 0) {
                    $(this).starRating('setRating', element)
                }
            });
        });
    </script>
@endsection
