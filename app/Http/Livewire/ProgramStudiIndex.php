<?php

namespace App\Http\Livewire;

use App\Models\BPH;
use App\Models\ProgramStudi;
use Livewire\Component;

class ProgramStudiIndex extends Component
{
    public $program_studi;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'programStudiStore' => 'handleStored',
        'programStudiUpdate' => 'handleUpdated',
        'destroy'
    ];

    public function render()
    {
        $this->program_studi = ProgramStudi::all();

        return view('livewire.program-studi-index');
    }

    public function getProgramStudi (ProgramStudi $programStudi) {
        $this->statusUpdate = true;
        $this->emit('getProgramStudi', $programStudi);
    }

    public function handleStored(){
        $this->statusCreate = false;
    }

    public function handleUpdated() {
        $this->statusUpdate = false;
        session()->flash('message', 'Program Studi berhasil diubah');
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

    public function destroy (ProgramStudi $programStudi) {

        if ($programStudi) {
            $programStudi->delete();
        }

    }
}
