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
        'kategoriStore' => 'handleStored',
        'kategoriUpdate' => 'handleUpdated',
        'destroy'
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

    public function confirmation ($id)
    {
        $this->statusUpdate = false;

        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function destroy (Kategori $kategori)
    {
        if ($kategori)
        {
            dd($kategori->posts);
            $kategori->delete();
        }
    }

    public function handleUpdated ()
    {
        $this->statusUpdate = false;
        session()->flash('message', 'Kategori berhasil diubah');
    }
}
