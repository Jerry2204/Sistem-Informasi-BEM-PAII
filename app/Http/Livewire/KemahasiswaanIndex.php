<?php

namespace App\Http\Livewire;

use App\Models\Kemahasiswaan;
use App\Models\User;
use Livewire\Component;

class KemahasiswaanIndex extends Component
{
    public $kemahasiswaans;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'kemahasiswaanStore' => 'handleStore',
        'kemahasiswaanUpdate' => 'handleUpdate',
        'destroy'
    ];

    public function render()
    {
        $this->kemahasiswaans = Kemahasiswaan::all();

        return view('livewire.kemahasiswaan-index');
    }

    public function handleStore ()
    {
        $this->statusCreate = false;
    }

    public function getKemahasiswaan (Kemahasiswaan $kemahasiswaan, User $user)
    {
        $this->statusUpdate = true;
        $this->emit('getKemahasiswaan', $kemahasiswaan, $user);
    }

    public function handleUpdate ()
    {
        $this->statusUpdate = false;

        session()->flash('message', 'Kemahasiswaan Berhasil diubah');
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

    public function destroy (Kemahasiswaan $kemahasiswaan)
    {
        if ($kemahasiswaan)
        {
            $kemahasiswaan->user()->forceDelete();
            $kemahasiswaan->delete();
        }
    }
}
