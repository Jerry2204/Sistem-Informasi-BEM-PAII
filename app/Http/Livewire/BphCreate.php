<?php

namespace App\Http\Livewire;

use App\Models\BPH;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class BphCreate extends Component
{

    public $name;
    public $nim;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;
    public $program_studi_id;

    protected $rules = [
        'name' => 'required',
        'nim' => 'required|unique:bph,nim',
        'email' => 'required|unique:users,email',
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

    public function render()
    {
        $programStudi = ProgramStudi::all();

        return view('livewire.bph-create', compact('programStudi'));
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function store() {

        $this->validate();

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = "bph";
        $user->password = Hash::make('bph123');
        $user->save();

        $bph = new BPH;
        $bph->user_id = $user->id;
        $bph->nim = $this->nim;
        $bph->jenis_kelamin = $this->jenis_kelamin;
        $bph->no_hp = $this->no_hp;
        $bph->alamat = $this->alamat;
        $bph->program_studi_id = $this->program_studi_id;
        $bph->save();

        $this->resetInput();

        $this->emit('bphStore');
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
