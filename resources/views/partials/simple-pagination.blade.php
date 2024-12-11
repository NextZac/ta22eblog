@if ($paginator->hasPages())
    <nav class="flex justify-center mt-6">
        <ul class="btn-group">
            <div class="join">
                @if ($paginator->onFirstPage())
                <button class="join-item btn btn-disabled">«</button>
                @else
                <a href="{{ $paginator->previousPageUrl() }}">
                <button class="join-item btn">«</button>
                </a>
                @endif
                <button class="join-item btn">Page {{$paginator->currentPage()}}</button>
                @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                <button class="join-item btn">»</button>
                </a>
                @else
                <button class="join-item btn btn-disabled">»</button>
                @endif
            </div>
        </ul>
    </nav>
@endif
