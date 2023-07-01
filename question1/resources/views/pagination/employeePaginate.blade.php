<!-- <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item{{ ($employees->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $employees->previousPageUrl() }}" aria-label="Previous">
                Previous
            </a>
        </li>
        @for ($i = 1; $i <= $employees->lastPage(); $i++)
            <li class="page-item{{ ($employees->currentPage() == $i) ? ' active' : '' }}">
                <a class="page-link" href="{{ $employees->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item{{ ($employees->currentPage() == $employees->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link" href="{{ $employees->nextPageUrl() }}" aria-label="Next">
                Next
            </a>
        </li>
    </ul>
</nav> -->
