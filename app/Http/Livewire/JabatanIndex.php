<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use Livewire\Component;

class JabatanIndex extends Component
{
    public $jabatan;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'jabatanStore' => 'handleStored',
        'jabatanUpdate' => 'handleUpdated',
        'destroy'
    ];

    public function render()
    {
        $this->jabatan = Jabatan::all();
        return view('livewire.jabatan-index');
    }

    public function handleStored ()
    {
        $this->statusCreate = false;
    }

    public function getposition (Jabatan $jabatan)
    {
        $this->statusUpdate = true;
        $this->emit('getPosition', $jabatan);
    }

    public function handleUpdated ()
    {
        $this->statusUpdate = false;
        session()->flash('message', 'jabatan berhasil diubah');
    }

    public function confirmation($id) {
        $this->statusUpdate = false;

        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function destroy (Jabatan $jabatan) {
        if ($jabatan) {
            if ($jabatan->bph)
            {
                $bph = $jabatan->bph;
                $user = $bph->user;
                $user->forceDelete();
                $bph->forceDelete();
            }

            $jabatan->delete();
        }

    }
}
