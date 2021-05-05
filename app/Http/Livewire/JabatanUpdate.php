<?php

namespace App\Http\Livewire;

use App\Models\Jabatan;
use Livewire\Component;

class JabatanUpdate extends Component
{
    public $nama_jabatan;
    public $jabatan_id;

    protected $rules = [
        'nama_jabatan' => 'required'
    ];

    protected $messages = [
        'nama_jabatan.required' => 'Jabatan harus diisi'
    ];

    protected $listeners = [
        'getPosition' => 'showPosition'
    ];

    public function render()
    {
        return view('livewire.jabatan-update');
    }

    public function update ()
    {
        $this->validate();

        if ($this->jabatan_id) {
            $jabatan = Jabatan::find($this->jabatan_id);
            $jabatan->update([
                'jabatan' => $this->nama_jabatan
            ]);
        }

        $this->resetInput();

        $this->emit('jabatanUpdate');
    }

    public function updated ($proprtyName)
    {
        $this->validateOnly($proprtyName);
    }

    public function resetInput ()
    {
        $this->nama_jabatan = null;
    }

    public function showPosition (Jabatan $jabatan)
    {
        $this->nama_jabatan = $jabatan['jabatan'];
        $this->jabatan_id = $jabatan['id'];
    }
}
