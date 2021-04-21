<?php

namespace App\Http\Livewire;

use App\Models\ProgramStudi;
use Livewire\Component;

class ProgramStudiCreate extends Component
{

    public $nama_program_studi;

    protected $rules = [
        'nama_program_studi' => 'required'
    ];

    protected $messages = [
        'nama_program_studi.required' => 'Nama Program Studi tidak boleh kosong'
    ];

    public function render()
    {
        return view('livewire.program-studi-create');
    }

    public function store () {
        $this->validate();

        ProgramStudi::create([
            'nama_program_studi' => $this->nama_program_studi
        ]);

        $this->resetInput();

        session()->flash('message', 'Program Studi berhasil ditambahkan');

        $this->emit('programStudiStore');
    }

    private function resetInput(){
        $this->nama_program_studi = null;
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }
}
