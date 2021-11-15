@extends('layout')
@section('style')
    <style>
        html {
            overflow-y: hidden
        }

        .fundo {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(auto, 25%));
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
            background-color: #000000AA;
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
        @if (count($test) == 8)
            <div class="d-none" id="Listimgs">
                @foreach ($test as $item)
                    <img src="@if ($item['tipo_capa'] == 'file') {{ URL::asset($item['capa_url']) }} @else {{ $item['capa_url'] }} @endif">
                @endforeach
            </div>
            @foreach ($test as $key => $item)
                @if ($key == 8)
                @break
            @endif
            <div class="imgsFundo">
                <img src="@if ($item['tipo_capa'] == 'file') {{ URL::asset($item['capa_url']) }} @else {{ $item['capa_url'] }} @endif">
            </div>
        @endforeach
        @endif
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
        $(function() {
            if ($('.imgsFundo').length == 0) {
                $('body').css('background-color', '#AAAAAAAA')
            } else {
                setInterval(function() {
                    let ListImgsSelect = $('#Listimgs').children().eq(Math.floor(Math.random() * ($(
                        '#Listimgs').children().length)));
                    let gridImgSelect = $('.imgsFundo').children().eq(Math.floor(Math.random() * ($(
                        '.imgsFundo').children().length)));
                    anime({
                        targets: gridImgSelect[0],
                        duration: 10000,
                        opacity: [0, 1],
                    });
                    gridImgSelect.attr('src', ListImgsSelect.attr('src'));
                }, 2000)
            }
        })
    </script>
@endsection
