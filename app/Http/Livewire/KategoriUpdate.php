<?php

namespace App\Http\Livewire;

use Livewire\Component;

class KategoriUpdate extends Component
{

    public $nama_kategori;

    public function render()
    {
        return view('livewire.kategori-update');
    }
}
