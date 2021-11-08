@if (isset($url))
<a href="{{$url}}" class="card filme m-1" date-value="{{$date_value}}">
@else
<a href="{{url('filme/'.$titulo)}}" class="card filme m-1">
@endif
<div>
    <img class="d-block mx-auto img-fluid" src="{{ $imagem }}" alt="Imagem Filme">
    <div class="card-body">
        <p class="card-title">{{ $titulo }}</p>
    </div>
</div>
</a>