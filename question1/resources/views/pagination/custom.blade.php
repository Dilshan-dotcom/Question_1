<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item{{ ($companies->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $companies->previousPageUrl() }}" aria-label="Previous">
                Previous
            </a>
        </li>
        @for ($i = 1; $i <= $companies->lastPage(); $i++)
            <li class="page-item{{ ($companies->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $companies->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item{{ ($companies->currentPage() == $companies->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $companies->nextPageUrl() }}" aria-label="Next">
                Next
            </a>
        </li>
    </ul>
</nav>
