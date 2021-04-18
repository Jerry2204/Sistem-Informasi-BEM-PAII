<?php

namespace App\Http\Livewire;

use App\Models\BPH;
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

    protected $rules = [
        'name' => 'required',
            'nim' => 'required',
            'email' => 'required|unique:users,email|email',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required'
    ];

    public function render()
    {
        return view('livewire.bph-create');
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
        $bph->save();

        $this->resetInput();

        $this->emit('bphStore', $bph);
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
