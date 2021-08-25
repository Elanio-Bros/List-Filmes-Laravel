@extends('layout')
@section('title')
    Login
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-image: url("{{ URL::asset('img/banner_welcome/teste1.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .cardLogin {
            color: black;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: #FFFFFFAA;
            width:50vh;
        }

        #seletor {
            margin-bottom: 1vh;
        }

    </style>
@endsection
@section('content')
    <div class="cardLogin">
        <div class="card">
            <div id="seletor">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="login-tab" data-toggle="pill" href="#login" role="tab"
                            aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="conta-tab" data-toggle="pill" href="#conta" role="tab"
                            aria-selected="false">Conta</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">
                    <form method="" class="d-flex flex-column justify-content-center">
                        <div class="form-group">
                            <input type="text" class="form-control" id="emailUsario" aria-describedby="emailHelp"
                                placeholder="Email/Usuário">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="pass" placeholder="Senha">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><a href="#" id="ocultaLogin">
                                        <i class="fas fa-eye" style="display: none"></i>
                                        <i class="fas fa-eye-slash"></i></a></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="conta" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form method="" class="d-flex flex-column justify-content-center">
                            <div class="form-group">
                                <input type="text" class="form-control" id="emailUsario" aria-describedby="emailHelp"
                                    placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="emailUsario" aria-describedby="emailHelp"
                                    placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="emailUsario" aria-describedby="emailHelp"
                                    placeholder="Usuário">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="pass" placeholder="Senha">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><a href="#" id="ocultaLogin">
                                            <i class="fas fa-eye" style="display: none"></i>
                                            <i class="fas fa-eye-slash"></i></a></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="pass" placeholder="Confirmação de Senha">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><a href="#" id="ocultaLogin">
                                            <i class="fas fa-eye" style="display: none"></i>
                                            <i class="fas fa-eye-slash"></i></a></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Massa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $("#ocultaLogin").click(function() {
                $(this).children("i").toggle();
                let senha = $("#pass")
                senha.prop("type", senha.prop("type") == "password" ? "text" : "password");
            });
        </script>
    @endsection
