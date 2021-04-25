<?php

namespace App\Http\Livewire;

use App\Models\Kemahasiswaan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class KemahasiswaanCreate extends Component
{
    public $name;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'no_hp' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        'email.unique' => 'Email telah digunakan',
        'no_hp.required' => 'No. Hp tidak boleh kosong',
        'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
    ];

    public function render()
    {
        return view('livewire.kemahasiswaan-create');
    }

    public function store ()
    {
        $this->validate();

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = "kemahasiswaan";
        $user->password = Hash::make('kemahasiswaan123');
        $user->save();

        $bph = new Kemahasiswaan;
        $bph->user_id = $user->id;
        $bph->jenis_kelamin = $this->jenis_kelamin;
        $bph->no_hp = $this->no_hp;
        $bph->alamat = $this->alamat;
        $bph->save();

        $this->resetInput();

        session()->flash('message', 'Kemahasiswaan berhasil ditambahkan');

        $this->emit('kemahasiswaanStore');
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }

    private function resetInput() {
        $this->name = null;
        $this->jenis_kelamin = null;
        $this->alamat = null;
        $this->email = null;
        $this->no_hp = null;
    }
}
