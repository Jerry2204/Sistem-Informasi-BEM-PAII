<?php

namespace App\Http\Livewire;

use App\Models\Kemahasiswaan;
use Livewire\Component;

class KemahasiswaanIndex extends Component
{
    public $kemahasiswaans;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'kemahasiswaanStore' => 'handleStore'
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
}
