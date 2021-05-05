<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use Livewire\Component;

class JabatanCreate extends Component
{
    public $nama_jabatan;

    protected $rules = [
        'nama_jabatan' => 'required'
    ];

    protected $messages = [
        'nama_jabatan.required' => 'Jabatan harus diisi'
    ];

    public function render()
    {
        return view('livewire.jabatan-create');
    }

    public function store ()
    {
        $this->validate();

        Jabatan::create([
            'jabatan' => $this->nama_jabatan
        ]);

        $this->resetInput();

        session()->flash('message', 'Jabatan berhasil ditambahkan');

        $this->emit('jabatanStore');
    }

    public function updated ($proprtyName)
    {
        $this->validateOnly($proprtyName);
    }

    public function resetInput ()
    {
        $this->nama_jabatan = null;
    }
}
