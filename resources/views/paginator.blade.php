@if ($paginator->hasPages())

<div class="row justify-content-center mt-4 mb-4">
    <nav aria-label="...">
    <ul class="pagination">

@if ($paginator->onFirstPage())
            
    <li class="page-item disabled"><span class="page-link">Назад</span></li>
    <li class="page-item active"><span class="page-link">1</span></li>
    <li class="page-item"><a class="page-link" href="{{$paginator->url(2)}}">2</a></li>
    @if($paginator->lastPage() > 2)
    <li class="page-item"><a class="page-link" href="{{$paginator->url(3)}}">3</a></li>
    @endif
    <li class="page-item"><a class="page-link" href="{{$paginator->nextPageUrl()}}">Далее</a></li>

@else

    @if($paginator->currentPage() == $paginator->lastPage())   
    
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->lastPage()-1)}}">Назад</a></li>
        @if($paginator->lastPage() > 2)
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->lastPage()-2)}}">{{$paginator->lastPage()-2}}</a></li>
        @endif
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->lastPage()-1)}}">{{$paginator->lastPage()-1}}</a></li>
        <li class="page-item active"><span class="page-link">{{$paginator->lastPage()}}</span></li>
        <li class="page-item disabled"><span class="page-link">Далее</span></li>

    @else
    
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage()-1)}}">Назад</a></li>
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage()-1)}}">{{$paginator->currentPage()-1}}</a></li>
        <li class="page-item active"><span class="page-link">{{$paginator->currentPage()}}</span></li>
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage()+1)}}">{{$paginator->currentPage()+1}}</a></li>
        <li class="page-item"><a class="page-link" href="{{$paginator->url($paginator->currentPage()+1)}}">Далее</a></li>

    @endif

@endif
    </ul>
    </nav>
</div>
@endif