<?php

namespace App\Http\Livewire;

use App\Models\BPH;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class BphUpdate extends Component
{
    public $name;
    public $nim;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;
    public $program_studi_id;
    public $BPHId;

    protected $rules = [
        'name' => 'required',
        'nim' => 'required',
        'email' => 'required',
        'no_hp' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'program_studi_id' => 'required'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'nim.required' => 'NIM tidak boleh kosong',
        'nim.unique' => 'NIM sudah terdaftar',
        'email.required' => 'Email tidak boleh kosong',
        'email.unique' => 'Email telah digunakan',
        'no_hp.required' => 'No. Hp tidak boleh kosong',
        'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
        'program_studi_id.required' => 'Program Studi tidak boleh kosong',
    ];

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }

    protected $listeners = [
        'getBPH' => 'showBPH'
    ];

    public function update () {
        $this->validate();

        if ($this->BPHId) {
            $bph = BPH::find($this->BPHId);
            $user = User::find($bph->user_id);

            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);

            $bph->update([
                'nim' => $this->nim,
                'jenis_kelamin' => $this->jenis_kelamin,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'program_studi_id' => $this->program_studi_id
            ]);
        }


        $this->resetInput();

        $this->emit('bphUpdate');
    }

    public function render()
    {
        $programStudi = ProgramStudi::all();

        return view('livewire.bph-update', compact('programStudi'));
    }

    public function showBPH ($bph, $user) {
        $this->name = $user['name'];
        $this->nim = $bph['nim'];
        $this->email = $user['email'];
        $this->alamat = $bph['alamat'];
        $this->jenis_kelamin = $bph['jenis_kelamin'];
        $this->no_hp = $bph['no_hp'];
        $this->program_studi_id = $bph['program_studi_id'];
        $this->BPHId = $bph['id'];
    }

    private function resetInput() {
        $this->name = null;
        $this->nim = null;
        $this->jenis_kelamin = null;
        $this->alamat = null;
        $this->email = null;
        $this->no_hp = null;
    }
}
