<?php

namespace App\Http\Livewire;

use App\Models\AnggotaDepartemen;
use App\Models\ProgramStudi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AnggotaUpdate extends Component
{
    public $programStudi;

    public $name;
    public $nim;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;
    public $program_studi_id;
    public $anggota_id;

    protected $rules = [
        'name' => 'required',
        'nim' => 'required|unique:kadep,nim|max:10',
        'email' => 'required',
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
        'no_hp.required' => 'No. Hp tidak boleh kosong',
        'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
        'program_studi_id.required' => 'Program Studi tidak boleh kosong',
    ];

    protected $listeners = [
        'getAnggota' => 'showAnggota'
    ];

    public function render()
    {
        $this->programStudi = ProgramStudi::all();

        return view('livewire.anggota-update');
    }

    public function updated ($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update ()
    {
        $this->validate();

        if ($this->anggota_id) {
            $anggota = AnggotaDepartemen::find($this->anggota_id);
            $user = User::find($anggota->user_id);

            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);

            $anggota->update([
                'nim' => $this->nim,
                'jenis_kelamin' => $this->jenis_kelamin,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'program_studi_id' => $this->program_studi_id
            ]);

            $this->resetInput();

            $this->emit('anggotaUpdate');
        }
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

    public function showAnggota ($anggota, $user)
    {
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->nim = $anggota['nim'];
        $this->jenis_kelamin = $anggota['jenis_kelamin'];
        $this->no_hp = $anggota['no_hp'];
        $this->program_studi_id = $anggota['program_studi_id'];
        $this->alamat = $anggota['alamat'];
        $this->anggota_id = $anggota['id'];
    }
}
