@if ($element->hasPages())
    <div class="d-flex justify-content-center m-2">
        <div class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $element->previousPageUrl() }}" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                </a>
            </li>
            @foreach (range(1, $element->lastPage()) as $number)
                <li class="page-item @if ($element->currentPage() == $number) active @endif">
                    <a class="page-link" href="?page={{ $number }}">{{ $number }}</a>
                </li>
            @endforeach
            <a class="page-link" href="{{ $element->nextPageUrl() }}" aria-label="Próximo">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Próximo</span>
            </a>
            </li>
        </div>
    </div>
@endif
