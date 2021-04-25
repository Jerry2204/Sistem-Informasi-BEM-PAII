<?php

namespace App\Http\Livewire;

use App\Models\AnggotaDepartemen;
use App\Models\User;
use Livewire\Component;

class AnggotaIndex extends Component
{
    public $anggota;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'anggotaStore' => 'handleStored',
        'anggotaUpdate' => 'handleUpdated',
        'destroy'
    ];

    public function render()
    {
        $this->anggota = auth()->user()->kadep->departemen->anggota_departemen;

        return view('livewire.anggota-index');
    }

    public function handleStored ()
    {
        $this->statusCreate = false;
    }

    public function getAnggota (AnggotaDepartemen $anggota, User $user)
    {
        $this->statusUpdate = true;
        $this->emit('getAnggota', $anggota, $user);
    }

    public function handleUpdated ()
    {
        $this->statusUpdate = false;

        session()->flash('message', 'Anggota Departemen Berhasil diubah');
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

    public function destroy (AnggotaDepartemen $anggota) {
        if ($anggota) {
            $anggota->user()->forceDelete();
            $anggota->delete();
        }
    }
}
