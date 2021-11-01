<a href="{{url('filme/'.$titulo)}}">
<div class="card filme m-1">
    <img class="d-block mx-auto img-fluid" src="{{ $imagem }}" alt="Imagem de um Filme">
    <div class="card-body">
        <p class="card-title">{{ $titulo }}</p>
    </div>
</div>
</a>