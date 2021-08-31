<div class="card filme" style="width: 13rem;">
    <img class="d-block mx-auto img-fluid" src="{{ $imagem }}" alt="First slide">
    @if (isset($body))
        <div class="card-body">
            <h6 class="card-title">{{ $titulo }}</h6>
        </div>
    @endif
</div>
