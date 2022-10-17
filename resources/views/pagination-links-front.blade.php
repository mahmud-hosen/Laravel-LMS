<div>
    <style>
        .pagination li {
            font-size: 11.5px;
            
        }

        .rotate_arrow {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .pagination_numbers {
            display: flex;
            justify-content: center;
        }

        .page-link {
            background: none;
        }

        .page-link {
            background: none;
        }
        .disabled-link{
            color: black;
            cursor: default;
        }
        .disabled-link:hover{
            color: black;
            cursor: default;
        }

    </style>

    @if ($paginator->hasPages())
        <nav class="pagination-outer" aria-label="Page navigation">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-2 mt-2">
                    <div class="pagination_numbers">
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <a href="javascript:void(0)" class="disabled-link">Previous</a>
                            @else
                                <a href="javascript:void(0)" dusk="previousPage" wire:click="previousPage"
                                    wire:loading.attr="disabled" rel="prev">Previous</a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <li class="page-item disabled" aria-disabled="true"><span
                                            class="page-link">{{ $element }}</span></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($paginator->currentPage() > 3 && $page == 2)
                                            <span class="" style="border: none; margin-top: 5px;"><i
                                                    class="fa fa-ellipsis-h"
                                                    style="margin-left: 5px; "></i></span>
                                        @endif
                                        @if ($page == $paginator->currentPage())
                                            <span wire:key="paginator-page-{{ $page }}"
                                                aria-current="page" style=" margin-left: 5px;">{{ $page }}</span>
                                        @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 1 || $page === $paginator->lastPage() || $page === 1)
                                            <a href="javascript:void(0)" class="page-item"
                                                wire:key="paginator-page-{{ $page }}"
                                                wire:click="gotoPage({{ $page }})" style=" margin-left: 5px;">{{ $page }}
                                            </a>
                                        @endif
                                        @if ($paginator->currentPage() < $paginator->lastPage() - 2 && $page === $paginator->lastPage() - 1)
                                            <span class="" style="border: none; margin-top: 5px;"><i
                                                    class="fa fa-ellipsis-h"
                                                    style="margin-left: 5px; "></i></span>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <a href="javascript:void(0)" dusk="nextPage" wire:click="nextPage"
                                    wire:loading.attr="disabled" rel="next" style="margin-left: 5px;">Next</a>
                            @else
                                <a href="javascript:void(0)" class="disabled-link" style="margin-left: 5px;">Next</a>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    @endif
</div>
