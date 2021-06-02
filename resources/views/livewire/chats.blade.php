<div>
    <div class="chat-detail">
        <div class="chat-profile-header clearfix">
            <div class="left">
                <div class="clearfix">
                    <div class="chat-profile-photo">
                        <img src="{{ auth()->user()->gambar() }}" alt="">
                    </div>
                    <div class="chat-profile-name">
                        <h3>Forum Chats</h3>
                        <span>Institut Teknologi Del</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-box">
            <div class="chat-desc" style="overflow-y: scroll; height: 500px">
                <ul>
                    <div wire:poll>
                        @foreach ($chats as $item)
                            @if ($item->user_id === auth()->user()->id)
                                @if ($item->type == 'files')
                                    <li class="clearfix upload-file admin_chat">
                                        <span class="chat-img">
                                            <img src="{{ auth()->user()->gambar() }}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="upload-file-box clearfix">
                                                <div class="left">
                                                    <img src="{{ $item->thumbnail() }}" alt="">
                                                    <div class="overlay">
                                                        <a href="#">
                                                            <span><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="right">
                                                    <h3>{{ $item->files_title }}</h3>
                                                    <a href="#">Download</a>
                                                </div>
                                            </div>
                                            <div class="chat_time">
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </li>
                                @elseif($item->type == 'all')
                                    <li class="clearfix upload-file admin_chat">
                                        <span class="chat-img">
                                            <img src="{{ auth()->user()->gambar() }}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="upload-file-box clearfix">
                                                <div class="left">
                                                    <img src="{{ $item->thumbnail() }}" alt="">
                                                    <div class="overlay">
                                                        <a href="#">
                                                            <span><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="right">
                                                    <h3>{{ $item->files_title }}</h3>
                                                    <a href="#">Download</a>
                                                </div>
                                            </div>
                                            <p style="margin-top: -10px">{{ $item->pesan }}</p>
                                            <div class="chat_time">
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix admin_chat">
                                        <span class="chat-img">
                                            <img src="{{ auth()->user()->gambar() }}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <p>{{ $item->pesan }}</p>
                                            <div class="chat_time">
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @else
                                @if ($item->type == 'files')
                                    <li class="clearfix upload-file">
                                        <span class="chat-img">
                                            <img src="{{ auth()->user()->gambar() }}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="upload-file-box clearfix">
                                                <div class="left">
                                                    <img src="{{ $item->thumbnail() }}" alt="">
                                                    <div class="overlay" wire:click="download('{{ $item->files }}')">
                                                        <a href="#">
                                                            <span><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="right">
                                                    <h3>{{ $item->files_title }}</h3>
                                                    <a href="#"
                                                        wire:click="download('{{ $item->files }}')">Download</a>
                                                </div>
                                            </div>
                                            <div class="chat_time">09:40PM</div>
                                        </div>
                                    </li>
                                @elseif($item->type == 'all')
                                    <li class="clearfix upload-file">
                                        <span class="chat-img">
                                            <img src="{{ auth()->user()->gambar() }}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="upload-file-box clearfix">
                                                <div class="left">
                                                    <img src="{{ $item->thumbnail() }}" alt="">
                                                    <div class="overlay" wire:click="download('{{ $item->files }}')">
                                                        <a href="#">
                                                            <span><i class="fa fa-angle-down"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="right">
                                                    <h3>{{ $item->files_title }}</h3>
                                                    <a wire:click="download('{{ $item->files }}')">Download</a>
                                                </div>
                                            </div>
                                            <p style="margin-top: 3px">{{ $item->pesan }}</p>
                                            <div class="chat_time" style="margin: 0;">
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="clearfix">
                                        <span class="chat-img">
                                            <img src="{{ auth()->user()->gambar() }}" alt="">
                                        </span>
                                        <div class="chat-body clearfix">
                                            <span
                                                style="font-size: 14px; font-weight: bold;">{{ $item->name }}</span>
                                            <p>{{ $item->pesan }}</p>
                                            <div class="chat_time">
                                                {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
    @if (auth()->user()->role === 'kemahasiswaan' || auth()->user()->role === 'bph')
        <div class="col-sm-12 col-md-12 mb-30 ml-0 pb-3 px-0">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="chat-footer mt-3">
                    @if (!empty($files))
                        <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-between m-0 pr-3" role="alert">
                            <p class="m-0 mt-2" style="font-size: 14px;">{{ $files->getClientOriginalName() }}</p>
                            <button type="button" class="btn btn-close" wire:click="resetFile">X</button>
                        </div>
                    @endif
                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        <div class="file-upload">
                            <label for="file-input" href="#"><i class="fa fa-paperclip"></i></label>
                            <input type="file" id="file-input" name="files" wire:model="files">
                        </div>
                        <div class="chat_text_area">
                            <textarea placeholder="Type your message…" wire:model="pesan" class="@if ($error) form-control-danger @endif"></textarea>
                            <span class="error" style="color: red; font-size: 14px">{{ $error }}</span>
                        </div>

                        <div class="chat_send">
                            <button class="btn btn-link" type="submit"><i
                                    class="icon-copy ion-paper-airplane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
    @endif
</div>
