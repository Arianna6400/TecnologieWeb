@if ($paginator->lastPage() != 1)
<div id="pagination" class="form1">
    @empty($data)
    <!-- Link alla prima pagina -->
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}" class="btn btn-outline-success">Inizio</a> |
        @else
            <a href="{{ $paginator->url(1) }}" class="btn btn-outline-success disabled" aria-disabled="true">Inizio</a> |
        @endif

    <!-- Link alla pagina precedente -->
        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-success">&lt; Precedente</a> |
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-success disabled" aria-disabled="true">&lt; Precedente</a> |
        @endif

    <!-- Link alla pagina successiva -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-success">Successivo &gt;</a> |
        @else
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-success disabled" aria-disabled="true">Successivo &gt;</a> |
        @endif

    <!-- Link all'ultima pagina -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="btn btn-outline-success">Fine</a>
        @else
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="btn btn-outline-success disabled" aria-disabled="true">Fine</a>
        @endif
    @endempty
    @isset($data)
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->appends($data)->url(1) }}" class="btn btn-outline-success">Inizio</a> |
        @else
            <a href="{{ $paginator->url(1) }}" class="btn btn-outline-success disabled" aria-disabled="true">Inizio</a> |
        @endif

    <!-- Link alla pagina precedente -->
        @if ($paginator->currentPage() != 1)
            <a href="{{ $paginator->appends($data)->previousPageUrl() }}" class="btn btn-outline-success">&lt; Precedente</a> |
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-success disabled" aria-disabled="true">&lt; Precedente</a> |
        @endif

    <!-- Link alla pagina successiva -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->appends($data)->nextPageUrl() }}" class="btn btn-outline-success">Successivo &gt;</a> |
        @else
        <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-success disabled" aria-disabled="true">Successivo &gt;</a> |
        @endif

    <!-- Link all'ultima pagina -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->appends($data)->url($paginator->lastPage()) }}" class="btn btn-outline-success">Fine</a>
        @else
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="btn btn-outline-success disabled" aria-disabled="true">Fine</a>
        @endif
    @endisset
</div>
@endif
