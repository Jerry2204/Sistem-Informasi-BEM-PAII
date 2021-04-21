<?php

namespace App\Http\Livewire;

use App\Models\ProgramStudi;
use Livewire\Component;

class ProgramStudiUpdate extends Component
{
    public $nama_program_studi;
    public $program_studi_id;

    protected $rules = [
        'nama_program_studi' => 'required'
    ];

    protected $messages = [
        'nama_program_studi.required' => 'Nama Program Studi tidak boleh kosong'
    ];

    protected $listeners = [
        'getProgramStudi' => 'showProgramStudi'
    ];

    public function render()
    {
        return view('livewire.program-studi-update');
    }

    public function update () {
        $this->validate();

        if ($this->program_studi_id) {
            $programStudi = ProgramStudi::find($this->program_studi_id);
            $programStudi->update([
                'nama_program_studi' => $this->nama_program_studi
            ]);
        }

        $this->resetInput();

        $this->emit('programStudiUpdate');
    }

    public function showProgramStudi ($programStudi) {
        $this->nama_program_studi = $programStudi['nama_program_studi'];
        $this->program_studi_id = $programStudi['id'];
    }

    private function resetInput(){
        $this->nama_program_studi = null;
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }
}
