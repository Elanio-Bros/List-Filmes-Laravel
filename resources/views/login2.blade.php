@extends('layout')
@section('title')
    Login
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <style>
        /* body {
                                                                        background-image: url("{{ URL::asset('img/banner_welcome/teste1.jpg') }}");
                                                                        background-repeat: no-repeat;
                                                                        background-size: cover;
                                                                    } */

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
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .vert .carousel-item-next,
        .vert .active.carousel-item-right {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100% 0);
        }

        .vert .carousel-item-prev,
        .vert .active.carousel-item-left {
            -webkit-transform: translate3d(0, -100vh, 0);
            transform: translate3d(0, -100vh, 0);
        }

        .container {
            width: 30%;
            float: left;
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
    <div class="quadrado">
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
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div id="carouselExample" class="carousel vert slide" data-ride="carousel" data-interval="500">
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
    <div class="container">
        <div id="carouselExample" class="carousel vert slide" data-ride="carousel" data-interval="500">
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
    <div class="container">
        <div id="carouselExample" class="carousel vert slide" data-ride="carousel" data-interval="500">
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

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script>
        $("#ocultaLogin").click(function() {
            $(this).children("i").toggle();
            let senha = $("#pass")
            senha.prop("type", senha.prop("type") == "password" ? "text" : "password");
        });
    </script>
@endsection
