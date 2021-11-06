@extends('layout')
@section('title')
    Filme Adiconar/Editar
@endsection
@section('style')
    <link rel="stylesheet" href="{{ URL::asset('libs/bootstrap-select/dist/css/bootstrap-select.css') }}">
    <style>
        .h-80{
            height: 80vh !important;
        }
        .add-filme{
            width:3.5em;
            height:5em;
            font-size:2em;
            background-color:#FFFFFFCC;
        }
        .add-filme-active{
            color: black;
        }
        .add-filme-disable{
            color: #a1a1a1FF;
        }
        .add-filme-active:hover{
            cursor: pointer;
            background-color:#FFFFFFEE;
        }
        .add-filme-active:active{
            background-color:#FFFFFFCC;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex justify-content-center align-items-center h-80">
        <form class="bg-light p-5 rounded w-75">
            <div class="d-flex flex-column">
                <div class="form-group d-flex flex-row w-100">
                    <div class="mr-2 d-flex flex-column">
                        <div class="card add-filme add-filme-active d-flex justify-content-center align-items-center mb-2">
                            <i class="fas fa-plus mb-2"></i>
                        </div>
                        <input type="file" name="img" style="display:none" id="case-filme" accept=".png, .jpge, .jpg">
                        <select name="type_file" class="form-control">
                            <option value="file" selected>Capa Arquivo</option>
                            <option value="imdb">Capa IMDB</option>
                        </select>
                    </div>
                    <div class="d-flex flex-column w-75">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Titulo Filme">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cod" placeholder="Código IMDB">
                        </div>
                        <div class="form-group">
                            <select name="categoria" class="selectpicker w-100" title="Selecione as categorias" data-live-search="true" data-size="4" multiple>
                                <option value="ola">Ola</option>
                                <option value='tudo bem'>Tudo bem</option>
                                <option value='massa'>Massa</option>
                                <option>Ola1</option>
                                <option>Tudo bem2</option>
                                <option>Massa</option>
                            </select>
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
    <script src='{{ URL::asset('libs/bootstrap-select/dist/js/bootstrap-select.js') }}'></script>
    <script>
        $('.selectpicker').selectpicker();
        // $('.selectpicker').selectpicker('val', ['Ola','Tudo bem']);
        $('form .add-filme').click(function() {
            $('#case-filme').trigger('click');
        });
        $('select').change(function(){
            if(this.value=='imdb'){
                $('#case-filme').attr('disabled','')
                $('#case-filme').removeAttr('name')
                $('.add-filme').removeClass('add-filme-active')
                $('.add-filme').addClass('add-filme-disable')
            }
            else{
                $('#case-filme').removeAttr('disabled')
                $('#case-filme').attr('name','img')
                $('.add-filme').removeClass('add-filme-disable')
                $('.add-filme').addClass('add-filme-active')
            }
        });
    </script>
@endsection
