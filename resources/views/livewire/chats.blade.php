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
            <div class="chat-desc" style="overflow-y: scroll">
                <ul>
                    <div wire:poll>
                        @foreach ($chats as $item)
                            @if ($item->user_id === auth()->user()->id)
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
                            @else
                                <li class="clearfix">
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
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 mb-30 ml-0 pb-3 px-0">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="chat-footer mt-3">
                <form wire:submit.prevent="store">
                    <div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
                    <div class="chat_text_area">
                        <textarea placeholder="Type your message…" wire:model="pesan"></textarea>
                    </div>
                    <div class="chat_send">
                        <button class="btn btn-link" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
