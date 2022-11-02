<div class="dropdown ml-3">
    <a class="ropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <img class="perfil" src="{{ $url_perfil }}">
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('minha_conta') }}">Minha Conta</a>
        {{-- <a class="dropdown-item" href="{{ route('favorito') }}">Favoritos</a> --}}
        {{-- <a class="dropdown-item" href="{{route('chat')}}">Chats</a> --}}
        <div class="dropdown-item link" data-toggle="modal" data-target="#exampleModal">Avisos <span class='dot'
                date-value='noti'></span></div>
        @if ($is_admin == true)
            <a class="dropdown-item" href="{{ route('admin') }}">Administração</a>
        @endif
        <div class="dropdown-divider"></div>
        <a type="button" class="dropdown-item btn-danger" href="{{ route('logout') }}">Sair</a>
    </div>
</div>
