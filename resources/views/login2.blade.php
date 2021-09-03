@extends('layout')
@section('title')
    Login
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        a {
            color: black
        }

        .card {
            color: white;
            background-color: #000000CE;
            padding: 10vh;
        }

        .vert .carousel-item-next.carousel-item-left,
        .vert .carousel-item-prev.carousel-item-right {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .vert .carousel-item-next,
        .vert .active.carousel-item-right {
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
        }

        .vert .carousel-item-prev,
        .vert .active.carousel-item-left {
            -webkit-transform: translateY(-100%);
            transform: translateY(-100%);
        }

        .fundo {
            display: flex;
            flex-flow: row wrap;
            border: 1px solid red;
        }

        .container {
            width: 20%;
        }

        .carousel,
        .carousel-inner {
            height: 100vh;
            z-index: -1;
        }

        .quadrado {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: #000000AA;
            /* border: 1px solid red; */
        }

    </style>
@endsection
@section('content')
    {{-- <div class="quadrado">
        <div class="d-flex justify-content-center align-items-center mx-auto">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> --}}
    <div class="fundo">
        @foreach (range(1, 5) as $item)
            <div class="container">
                <div id="carousel{{ $item }}" class="carousel vert slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block mx-auto img-fluid"
                                src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto img-fluid"
                                src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block mx-auto img-fluid"
                                src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg" alt="Third slide">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script>
        $("#ocultaLogin").click(function() {
            $(this).children("i").toggle();
            let senha = $("#pass")
            senha.prop("type", senha.prop("type") == "password" ? "text" : "password");
        });
        $(".carousel").each(function(index) {
            $("#" + $(this).attr('id')).carousel({
                interval: Math.floor(Math.random() * (2000 - 1100)) + 1100,
                pause: false,
            });
        });
    </script>
@endsection
