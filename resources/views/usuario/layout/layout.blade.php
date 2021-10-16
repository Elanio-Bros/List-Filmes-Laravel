@extends('layout')
@section('style')
    <style>
        html {
            overflow-y: hidden
        }

        .fundo {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            width: 100%;
            margin: 0 auto;
            height: 100vh;
            background-color: black;
        }

        .fundo img {
            height: 21.5em;
            width: 250px;
        }

        .quadrado {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 5;
            background: #000000AA;
        }

        .quadrado .login {
            background-color: #00000099;
            border-radius: 5px;
            padding: 3em;
            color: white;
            fill: white;
            width: 60vh;
        }

    </style>
    @yield('styleEntrada')
@endsection
@section('content')
    <div class="quadrado d-flex justify-content-center align-items-center">
        <div class="login d-flex flex-column justify-content-center align-items-center">
            @yield('contentEntrada')
        </div>
    </div>
    <div class="fundo">
        @foreach (range(1, 8) as $item)
            <div>
                <img src="https://images-na.ssl-images-amazon.com/images/I/71yDb8SKTTL.jpg">
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"
        integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".ocultaPass").click(function() {
            $(this).children("i").toggle();
            let senha = $("#" + $(this).parents().children().get(2).id)
            senha.prop("type", senha.prop("type") == "password" ? "text" : "password");
        });
        setInterval(function() {
            let elem = document.getElementsByTagName('img')
            let selectEle = elem[Math.floor(Math.random() * (elem.length))];
            anime({
                targets: selectEle,
                duration: 10000,
                opacity: [0, 1],
            })
            selectEle.setAttribute('src',
                'https://macmagazine.com.br/wp-content/uploads/2018/01/05-filme.jpg?__cf_chl_jschl_tk__=pmd_b157d66b7dd7e9fdd6b8c1b3bd7b4f516cedf869-1631542095-0-gqNtZGzNAfijcnBszQb6'
            )
        }, 2000)
    </script>
@endsection
