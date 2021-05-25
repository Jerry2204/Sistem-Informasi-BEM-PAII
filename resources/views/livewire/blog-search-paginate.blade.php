<div>
    <div class="row d-flex justify-content-between">
        <div class="col-md-12 pl-0 pr-1 mt-3 position-relative">
            <div class="input-group mb-3 h-100">
                <input type="text" class="form-control text font-14 h-100" placeholder="Search"
                    aria-describedby="basic-addon2" wire:model="query">
            </div>
        </div>
        @if ($posts->total() > 0)
            <div class="card-columns pt-5">
                @foreach ($posts as $item)
                    <div class="card">
                        <img class="card-img-top" src="{{ $item->thumbnail() }}" alt="Card image cap">
                        <div class="card-body">
                            <a class="card-title heading font-weight-bold"
                                href="{{ route('single.post', $item->slug) }}">{{ $item->title }}</a>
                            <p class="text font-14 text-secondary my-2"><i class="fas fa-user-alt"></i>&nbsp;
                                {{ $item->user->name }}</p>
                            <div class="div-change mt-3">
                                {!! substr($item->content, 0, 150) !!}
                            </div>
                            <p class="text font-14 text-secondary text-right"><i class="fas fa-calendar-alt"></i>&nbsp;
                                {{ $item->updated_at->format('d M Y') }} | {{ $item->kategori_id() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-2">
                <p class="text text-danger">No Results</p>
            </div>
        @endif
    </div>
    <nav aria-label="Page navigation example" class="navs-search">
        <ul class="pagination">
            <li class="page-item @if ($posts->currentPage() === 1) disabled @endif">
                <a class="page-link" href="/blog?page={{ $posts->currentPage() - 1 }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                <li class="page-item">
                    <a class="page-link" href="/blog?page={{ $i }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item @if ($posts->currentPage() === $posts->total()) disabled @endif">
                <a class="page-link" href="/blog?page={{ $posts->currentPage() + 1 }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
