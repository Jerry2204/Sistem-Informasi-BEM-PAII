<div class="relative">
    <div class="row d-flex justify-content-between">
        <div class="col-md-10 pl-0 pr-1 mt-3 position-relative">
            <div class="input-group mb-3 h-100">
                <input type="text" class="form-control text font-14 h-100" placeholder="Search"
                    aria-describedby="basic-addon2" 
                    wire:model="query"
                    wire:keydown.escape="resetFilters"
                >
            </div>
            @if (!empty($query))
                <div class="position-absolute list-group bg-white w-100 rounded shadow m-0" style="z-index: 100; max-height: 400px; overflow-y: scroll;">
                    @if (!empty($forum_search))
                        @foreach ($forum_search as $item)
                        <div class="list-group-item text font-14 pb-0">
                            <a href="{{ route('forum_detail', $item['id'])}}" class=" text font-14">{{ substr($item['question'], 0, 150) . "..."}}</a>
                            <div class="dropdown-divider"></div>
                            <p class="text font-12 text-secondary font-weight-regular mt-2" style="opacity: 1"><i class="fas fa-user-alt"></i> &nbsp;{{ $item['name'] }} | 
                                {{ Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</p>
                        </div>
                        @endforeach
                    @else
                        <div class="list-group-item text font-14 font-weight-bold text-danger">No Results!!</div>
                    @endif
                </div>
            @endif
        </div>
        <div class="col-md-2 px-0 mt-3">
            <button class="btn w-100 text font-14 bg-red h-100 text-white" id="btn-add-forums" data-toggle="modal"
                data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus"></i>
                Tambah
                Pertanyaan</button>
        </div>
    </div>


</div>
