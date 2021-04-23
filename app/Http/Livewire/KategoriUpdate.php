<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use Livewire\Component;

class KategoriUpdate extends Component
{

    public $nama_kategori;
    public $id_kategori;

    protected $rules = [
        'nama_kategori' => 'required'
    ];

    protected $messages = [
        'nama_kategori.required' => 'Nama Kategori Harus diisi'
    ];

    protected $listeners = [
        'getKategori' => 'showKategori'
    ];

    public function render()
    {
        return view('livewire.kategori-update');
    }

    public function update ()
    {
        $this->validate();

        if ($this->id_kategori) {
            $kategori = Kategori::find($this->id_kategori);
            $kategori->update([
                'nama_kategori' => $this->nama_kategori
            ]);
        }

        $this->resetInput();

        $this->emit('kategoriUpdate');
    }

    private function resetInput ()
    {
        $this->nama_kategori = null;
    }

    public function updated ($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function showKategori ($kategori)
    {
        $this->nama_kategori = $kategori['nama_kategori'];
        $this->id_kategori = $kategori['id'];
    }
}
