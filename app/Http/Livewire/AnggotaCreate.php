<?php

namespace App\Http\Livewire;

use App\Models\AnggotaDepartemen;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AnggotaCreate extends Component
{
    public $programStudi;

    public $name;
    public $nim;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;
    public $program_studi_id;

    protected $rules = [
        'name' => 'required',
        'nim' => 'required|unique:kadep,nim|max:10',
        'email' => 'required|unique:users,email',
        'no_hp' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'program_studi_id' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'nim.required' => 'NIM tidak boleh kosong',
        'nim.unique' => 'NIM sudah terdaftar',
        'nim.max' => 'NIM tidak boleh lebih dari 10 karakter',
        'email.required' => 'Email tidak boleh kosong',
        'email.unique' => 'Email telah digunakan',
        'no_hp.required' => 'No. Hp tidak boleh kosong',
        'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
        'program_studi_id.required' => 'Program Studi tidak boleh kosong',
    ];

    public function render()
    {
        $this->programStudi = ProgramStudi::all();

        return view('livewire.anggota-create');
    }

    public function store ()
    {
        $this->validate();

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = "anggota";
        $user->password = Hash::make('anggota123');
        $user->save();

        $anggota = new AnggotaDepartemen;
        $anggota->user_id = $user->id;
        $anggota->nim = $this->nim;
        $anggota->jenis_kelamin = $this->jenis_kelamin;
        $anggota->no_hp = $this->no_hp;
        $anggota->alamat = $this->alamat;
        $anggota->departemen_id = auth()->user()->kadep->departemen->id;
        $anggota->program_studi_id = $this->program_studi_id;
        $anggota->save();

        $this->resetInput();

        session()->flash('message', 'Anggota Departemen berhasil ditambahkan');

        $this->emit('anggotaStore');
    }

    public function updated ($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    private function resetInput() {
        $this->name = null;
        $this->nim = null;
        $this->jenis_kelamin = null;
        $this->alamat = null;
        $this->email = null;
        $this->no_hp = null;
        $this->program_studi_id = null;
    }
}
