<?php

namespace App\Http\Livewire;

use App\Models\BPH;
use App\Models\User;
use Livewire\Component;

class BPHIndex extends Component
{

    public $bphs;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'bphStore' => 'handleStored',
        'bphUpdate' => 'handleUpdated',
        'destroy'
    ];

    public function render()
    {
        $this->bphs = BPH::all();
        return view('livewire.b-p-h-index');
    }

    public function getBPH (BPH $bph, User $user) {
        $this->statusUpdate = true;
        $this->emit('getBPH', $bph, $user);
    }

    public function confirmation($id) {
        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function destroy (BPH $bph) {

        if ($bph) {
            $bph->delete();
        }

    }

    public function handleStored() {
        $this->statusCreate = false;
    }

    public function handleUpdated() {
        session()->flash('message', 'BPH berhasil diubah');
        $this->statusUpdate = false;
    }
}
