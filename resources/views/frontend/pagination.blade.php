<?php $paginator = $paginator->appends(Request::except('page')); ?>
@if ($paginator->lastPage() > 1)
<div class="pagination-bx clearfix text-center">
    <ul class="pagination">
        @if ($paginator->lastPage() > 1)
            @if ($paginator->currentPage() > 1)
                <li class="previous"><a href="{!! $paginator->url($paginator->currentPage() - 1) !!}"><i class="ti-arrow-left"></i>Prev</a></a></li>
            @endif
            <?php $current = $paginator->currentPage(); $total = $paginator->lastPage(); ?>
            @if($current >= 4)
                <li><a href="{!! $paginator->url(1) !!}">1</a></li>
                <li>...</li>
                @if( $total > $current )
                    <li class="active"><a href="">{!! $current !!}</a></li>
                    <li><a href="{!! $paginator->url($current + 1) !!}">{!! $current + 1 !!}</a></li>
                @else
                    <li><a href="{!! $paginator->url($current - 1) !!}">{!! $current - 1 !!}</a></li>
                    <li class="active"><a href="">{!! $current !!}</a></li>
                @endif
            @else
                @for ($page = 1; $page <= $paginator->lastPage() && $page < 5; $page++)
                    @if ($paginator->currentPage() == $page)
                        <li class="active"><a href="">{!! $page !!}</a></li>
                    @else
                        <li><a href="{!! $paginator->url($page) !!}">{!! $page !!}</a></li></a></li>
                    @endif
                @endfor
            @endif
            @if ($paginator->currentPage() < $paginator->lastPage())
                <li class="next"><a href="{!! $paginator->url($paginator->currentPage() + 1) !!}">Next <i class="ti-arrow-right"></i></a></li>
            @endif
        @endif
    </ul>
</div>
@endif

