<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use Livewire\Component;

class KategoriIndex extends Component
{
    public $kategori;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'kategoriStore' => 'handleStored'
    ];

    public function render()
    {
        $this->kategori = Kategori::all();

        return view('livewire.kategori-index');
    }

    public function handleStored ()
    {
        $this->statusCreate = false;
    }

    public function getKategori (Kategori $kategori) {
        $this->statusUpdate = true;
        $this->emit('getKategori', $kategori);
    }
}
