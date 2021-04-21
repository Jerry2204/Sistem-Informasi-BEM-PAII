<?php

namespace App\Http\Livewire;

use App\Models\Departemen;
use App\Models\Kadep;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class KadepCreate extends Component
{
    public $programStudi;
    public $departemen;

    public $name;
    public $nim;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;
    public $program_studi_id;
    public $departemen_id;

    protected $rules = [
        'name' => 'required',
        'nim' => 'required|unique:kadep,nim|max:10',
        'email' => 'required|unique:users,email',
        'no_hp' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'program_studi_id' => 'required',
        'departemen_id' => 'required|unique:kadep,departemen_id'
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
        'departemen_id.required' => 'Departemen tidak boleh kosong',
        'departemen_id.unique' => 'Kepala Departemen sudah ada',
    ];

    public function render()
    {
        $this->programStudi = ProgramStudi::all();
        $this->departemen = Departemen::all();

        return view('livewire.kadep-create');
    }

    public function store ()
    {
        $this->validate();

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = "kadep";
        $user->password = Hash::make('kadep123');
        $user->save();

        $kadep = new Kadep;
        $kadep->user_id = $user->id;
        $kadep->nim = $this->nim;
        $kadep->jenis_kelamin = $this->jenis_kelamin;
        $kadep->no_hp = $this->no_hp;
        $kadep->alamat = $this->alamat;
        $kadep->program_studi_id = $this->program_studi_id;
        $kadep->departemen_id = $this->departemen_id;
        $kadep->save();

        $this->resetInput();

        session()->flash('message', 'Kepala Departemen berhasil ditambahkan');

        $this->emit('kadepStore');
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
        $this->departemen_id = null;
    }

}
