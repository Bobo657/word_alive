@if ($paginator->hasPages())
<nav>
  <ul class="pagination pagination-xs pagination-gutter">
      <li class="page-item page-indicator">
          <a class="page-link" wire:click.prevent="{{ !$paginator->onFirstPage() ? 'previousPage()' : '' }}" href="javascript:void(0)">
              <i class="la la-angle-left"></i></a>
      </li>
      @foreach($elements as $element)
        @if(is_array($element))
            @foreach($element as $page => $url)
                @if($page == $paginator->currentPage())
                  <li class="page-item">
                    <a class="page-link" wire:click.prevent href="javascript:void(0)">{{ $page }}</a>
                  </li>
                @else
                <li class="page-item">
                  <a class="page-link" wire:click.prevent="gotoPage({{$page}})" href="javascript:void(0)">
                  {{ $page }}</a>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach
      <!-- <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
      <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
      <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li> -->
      <li class="page-item page-indicator">
          <a class="page-link" href="javascript:void(0)" wire:click.prevent="{{ $paginator->hasMorePages() ? 'nextPage()' : '' }}">
              <i class="la la-angle-right"></i></a>
      </li>
  </ul>
</nav>
@endif