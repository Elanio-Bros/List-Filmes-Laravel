@extends('layout')
@section('title')
    Minha Conta
@endsection
@section('style')
    <style>
    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex border1">
        <form>
            <img class="perfil"
                src="https://d11a6trkgmumsb.cloudfront.net/original/3X/f/b/fbbaacfa1033254471f614b67d58dae45236ce5b.jpg">
        </form>
        <form>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="Usuário">
            </div>
            <div class="d-flex">
                <div class="form-group mx-1">
                    <input type="password" class="form-control" name="pass" placeholder="Senha">
                </div>
                <div class="form-group mx-1">
                    <input type="password" class="form-control" name="confiPass" placeholder="Confirmação de Senha">
                </div>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
@endsection
