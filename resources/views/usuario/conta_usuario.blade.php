@extends('layout')
@section('title')
    Minha Conta
@endsection
@section('style')
    <style>
        .h-100 {
            height: 80vh !important;
        }

        span {
            color: black;
        }

        form .perfil {
            width: 5rem;
            height: 5rem;
        }
    </style>
@endsection
@section('content')
    @include('content.nav')
    <div id="error">
    </div>
    <div class="d-flex justify-content-center align-items-center h-100">
        <form class="bg-light p-5 rounded" name="infousuario" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-column w-100 mb-3">
                <div class="form-group row mr-2">
                    <span class="col">
                        <img class="perfil" src="{{ $usuario['url_perfil'] }}">
                        {{-- <div class="edit perfil d-flex justify-content-center align-items-center"><i
                                    class="fas fa-edit"></i></div> --}}
                        <input type="file" name="photo" style="display:none" id="img" accept=".png, .jpge, .jpg">
                    </span>
                    <span class="col">
                        <div class="card">
                            <div class="card-header">
                                Votados
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">{{ $count_votos }}</p>
                            </div>
                        </div>
                    </span>
                    <span class="col">
                        <div class="card">
                            <div class="card-header">
                                Grupos
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">{{ $count_group }}</p>
                            </div>
                        </div>
                    </span>
                    <span class="col">
                        <div class="card">
                            <div class="card-header">
                                Tipo
                            </div>
                            <div class="card-body">
                                <p class="card-text text-center">{{ ucwords($usuario['tipo']) }}</p>
                            </div>
                        </div>
                    </span>
                </div>
                <div class="form-group w-100">
                    <input type="text" class="form-control" name="nome" value="{{ $usuario['nome'] }}"
                        placeholder="Nome">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ $usuario['email'] }}"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="usuario" value="{{ $usuario['usuario'] }}"
                        placeholder="Usuário">
                </div>
                <div class="d-flex justify-content-between">
                    <div class="input-group mr-2">
                        <input type="password" name="senha" class="form-control" id="pass" placeholder="Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a class="ocultaPass">
                                    <i class="fas fa-eye" style="display: none"></i>
                                    <i class="fas fa-eye-slash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="password" name="confirmSenha" class="form-control" id="passConfi"
                            placeholder="Confirmação Senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a class="ocultaPass">
                                    <i class="fas fa-eye" style="display: none"></i>
                                    <i class="fas fa-eye-slash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="save" class="btn btnPerson w-100">Salvar</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $('form .perfil').click(function() {
            $('#img').trigger('click');
        });

        $(".ocultaPass").click(function() {
            $(this).children("i").toggle();
            let senha = $("#" + $(this).parents().children().get(2).id)
            senha.prop("type", senha.prop("type") == "password" ? "text" : "password");
        });

        $('form[name="infousuario"]').submit(function(event) {
            if ($(this).find('input[name="senha"]').val() != $(this).find('input[name="confirmSenha"]').val()) {
                $('#error').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    '<span>Senha e Confirmações de Senha Estão Diferentes</span><button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span></button></div>');
                event.preventDefault();
            }
        });
    </script>
@endsection
