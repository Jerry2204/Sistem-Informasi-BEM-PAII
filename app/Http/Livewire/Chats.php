<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Chats extends Component
{
    use WithFileUploads;

    public $chats;
    public $pesan;
    public $files;
    public $error;

    protected $rules = [
        'files' => 'nullable|image|max:3024',
    ];

    public function render()
    {
        $this->chats = Chat::with(['user'])->get();
        return view('livewire.chats');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function download($name)
    {
        if (Storage::disk('public_uploads')->exists($name)) {
            return Storage::disk('public_uploads')->download($name);
        }
    }

    public function resetFile()
    {
        $this->files = null;
    }


    public function store()
    {
        $this->validate();

        $string_name_file = "";
        $string_title_file = "";
        $type = "text";

        if (!empty($this->files) || !empty($this->pesan)) {
            if ($this->files && empty($this->pesan)) {
                $string_name_file = $this->files->hashName();
                $string_title_file = $this->files->getClientOriginalName();
                $this->files->store('/', 'public_uploads');
                $this->pesan = "";
                $type = "files";
            } else if (empty($this->files) && $this->pesan) {
                $this->files = "";
            } else {
                $type = "all";
                $string_title_file = $this->files->getClientOriginalName();
                $string_name_file = $this->files->hashName();
                $this->files->store('/', 'public_uploads');
            }
            $chat = new Chat;
            $chat->name = auth()->user()->name;
            $chat->pesan = $this->pesan;
            $chat->user_id = auth()->user()->id;
            $chat->type = $type;
            $chat->files = $string_name_file;
            $chat->files_title = $string_title_file;
            $chat->save();
        } else {
            $this->error = "Pesan tidak boleh kosong";
        }


        $this->resetInput();
    }

    public function resetInput()
    {
        $this->pesan = null;
    }
}
