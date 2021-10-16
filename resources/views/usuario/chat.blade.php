@extends('layout')
@section('title')

@endsection
@section('style')
    <style>
        .h-100 {
            height: 100% !important;
        }

        .card .card-body {
            height: 70vh !important;
        }

        .groups {
            overflow-y: auto;
            height: 80vh;
        }

    </style>
@endsection
@section('content')
    @include('content.nav')
    <div class="d-flex h-100">
        <div class="w-25 ml-2">
            <div class="titulo text-center">Groups</div>
            <div class="d-flex flex-column groups">
                @includeIf('content.chat_layout',['title'=>'Titulo Massa','users'=>'12/30','value'=>'active'])
                @includeIf('content.chat_layout',['title'=>'Titulo Massa','users'=>'12/30','value'=>'suspended'])
                @includeIf('content.chat_layout',['title'=>'Titulo Massa','users'=>'12/30','value'=>'deactivate'])
            </div>
        </div>
        <div class="w-75 ml-2">
            <div class="card">
                <div class="card-header h4 text-dark">
                    Titulo Massa
                </div>
                <div class="card-body h-75 text-dark">
                    <div class="text-right">Ola</div>
                    <div class="text-left">Ola</div>
                </div>
                <div class="card-footer d-flex flex-row">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                        aria-describedby="addon-wrapping">
                    <button type="button" class="btn">Enviar</button>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
