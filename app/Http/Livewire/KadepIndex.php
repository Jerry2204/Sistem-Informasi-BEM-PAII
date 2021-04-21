<?php

namespace App\Http\Livewire;

use App\Models\Departemen;
use App\Models\Kadep;
use App\Models\ProgramStudi;
use App\Models\User;
use Livewire\Component;

class KadepIndex extends Component
{
    public $kadeps;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'kadepStore' => 'handleStored',
        'kadepUpdate' => 'handleUpdated',
        'kadepUpdateLost' => 'handleUpdateLost',
        'destroy'
    ];

    public function render()
    {
        $this->kadeps = Kadep::all();

        return view('livewire.kadep-index');
    }

    public function getKadep (Kadep $kadep, User $user) {
        $this->statusUpdate = true;
        $this->emit('getKadep', $kadep, $user);
    }

    public function handleStored ()
    {
        $this->statusCreate = false;
    }

    public function confirmation ($id) {
        $this->statusUpdate = false;

        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function destroy (Kadep $kadep) {
        if ($kadep) {
            $kadep->user()->forceDelete();
            $kadep->delete();
        }
    }

    public function handleUpdated () {
        $this->statusUpdate = false;

        session()->flash('message', 'Kepala Departemen berhasil diubah');
    }

    public function handleUpdateLost () {
        session()->flash('gagal', 'Kepala Departemen gagal diubah');
    }
}
