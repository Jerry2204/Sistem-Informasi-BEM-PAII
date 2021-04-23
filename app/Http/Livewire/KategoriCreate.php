<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use Livewire\Component;

class KategoriCreate extends Component
{
    public $nama_kategori;

    protected $rules = [
        'nama_kategori' => 'required'
    ];

    protected $messages = [
        'nama_kategori.required' => 'Nama Kategori Harus diisi'
    ];

    public function render()
    {
        return view('livewire.kategori-create');
    }

    public function store ()
    {
        $this->validate();

        Kategori::create([
            'nama_kategori' => $this->nama_kategori
        ]);

        $this->resetInput();

        session()->flash('message', 'Kategori Berhasil Ditambahkan');

        $this->emit('kategoriStore');
    }

    private function resetInput ()
    {
        $this->nama_kategori = null;
    }

    public function updated ($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
