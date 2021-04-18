<?php

namespace App\Http\Livewire;

use App\Models\BPH;
use Livewire\Component;

class BPHIndex extends Component
{

    public $bphs;

    protected $listeners = [
        'bphStore' => 'handleStored'
    ];

    public function render()
    {
        $this->bphs = BPH::all();

        return view('livewire.b-p-h-index');
    }

    public function handleStored($bph) {
        session()->flash('message', 'BPH berhasil ditambahkan');
    }
}
