@extends('layout')
@section('title')
    Filme Adiconar/Editar
@endsection
@section('style')
    <style>
        .h-100 {
            height: 80vh !important;
        }

        .add-filme{
            width:3.5em;
            height:100%;
            font-size:2em;
            background-color:#FFFFFFCC;
            color: black;
        }
        .add-filme:hover{
            cursor: pointer;
            background-color:#FFFFFFEE;
        }
        .add-filme:active{
            background-color:#FFFFFFCC;
        }

        textarea {
            resize: none;
            min-height: 9em;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex justify-content-center align-items-center h-100">
        <form class="bg-light p-5 rounded w-75">
            <div class="d-flex flex-column">
                <div class="form-group d-flex flex-row w-100">
                    <div class="mr-2">
                        <div class="card add-filme d-flex justify-content-center align-items-center">
                            <i class="fas fa-plus mb-2"></i>
                        </div>
                        <input type="file" name="img" style="display:none" id="img" accept=".png, .jpge, .jpg">
                        <select name="" id="">
                            <option value="">Capa de um Arquivo</option>
                            <option value="">Capa IMDB</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="form-group w-100">
                            <input type="text" class="form-control" name="title" placeholder="Titulo Filme">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cod" placeholder="Código IMDB">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="categoria" placeholder="Categorias">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" placeholder="Descrição"></textarea>
                </div>
            </div>
            <button type="submit" name="save" class="btn btnPerson w-100">Adicionar Filme</button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $('form .add-filme').click(function() {
            $('#img').trigger('click');
        });
    </script>
@endsection
