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

        .fundo {
            /* display: flex;
            flex-flow: row wrap; */
            width: 100%;
            border: 1px solid red;
        }

        .fundo img {
            height: 260px;
        }

        .quadrado {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: 5;
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
            <div class="coluna">
                <div class="linha">
                    @foreach (range(1, 4) as $item2)
                        <div>
                            <img src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg"
                                alt="{{ $item2 }}">
                        </div>
                    @endforeach
                </div>
            </div>

        @endforeach
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"
        integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#ocultaLogin").click(function() {
            $(this).children("i").toggle();
            let senha = $("#pass")
            senha.prop("type", senha.prop("type") == "password" ? "text" : "password");
        });
        // setInterval(function() {
        //     var elem = document.getElementsByTagName('img')
        //     var selectEle = elem[Math.floor(Math.random() * (elem.length))];
        //     anime({
        //         targets: selectEle,
        //         duration: 10000,
        //         opacity: [0, 1],
        //     })
        //     selectEle.setAttribute('src', 'https://macmagazine.com.br/wp-content/uploads/2018/01/05-filme.jpg')
        // }, 2000)
    </script>
@endsection
