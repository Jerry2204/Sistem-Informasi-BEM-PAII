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
        'bphUpdate' => 'handleUpdated'
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

    public function handleStored() {
        session()->flash('message', 'BPH berhasil ditambahkan');
        $this->statusCreate = false;
    }

    public function handleUpdated() {
        session()->flash('message', 'BPH berhasil diubah');
        $this->statusUpdate = false;
    }
}
