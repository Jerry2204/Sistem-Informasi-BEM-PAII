<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class Chats extends Component
{
    public $chats;
    public $pesan;

    protected $rules = [
        'pesan' => 'required',
    ];

    protected $messages = [
        'pesan.required' => 'Pesan tidak boleh kosong',
    ];

    public function render()
    {
        $this->chats = Chat::with(['user'])->get();
        return view('livewire.chats');
    }

    public function store ()
    {
        $this->validate();

        $chat = new Chat;
        $chat->name = auth()->user()->name;
        $chat->pesan = $this->pesan;
        $chat->user_id = auth()->user()->id;
        $chat->save();

        $this->resetInput();
    }

    public function resetInput(){
        $this->pesan = null;
    }
}
