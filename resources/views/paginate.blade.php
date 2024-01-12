<div class="row">
    <div class="col-lg-12">
        <div class="pagination_wrap">
            <ul>

                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           aria-label="@lang('pagination.previous')"> <i class="ti-angle-left"></i> </a></li>
                @endif


                {{-- Pagination Elements --}}
                @foreach ($elements as $element)

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page">
                                    <a href="javascript:void(0);">
                                        <span><b>{{ $page }}</b></span>
                                    </a>
                                </li>
                            @else
                                <li><a href="{{ $url }}"><span>{{ $page }}</span></a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())

                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> <i
                                    class="ti-angle-right"></i> </a></li>
                @endif


            </ul>
        </div>
    </div>
</div>
