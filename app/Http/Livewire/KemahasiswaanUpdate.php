<?php

namespace App\Http\Livewire;

use App\Models\Kemahasiswaan;
use App\Models\User;
use Livewire\Component;

class KemahasiswaanUpdate extends Component
{
    public $name;
    public $email;
    public $alamat;
    public $jenis_kelamin;
    public $no_hp;

    public $kemahasiswaan_id;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'no_hp' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        'no_hp.required' => 'No. Hp tidak boleh kosong',
        'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
    ];

    protected $listeners = [
        'getKemahasiswaan' => 'showKemahasiswaan'
    ];

    public function render()
    {
        return view('livewire.kemahasiswaan-update');
    }

    public function update ()
    {
        $this->validate();

        if ($this->kemahasiswaan_id)
        {
            $kemahasiswaan = Kemahasiswaan::find($this->kemahasiswaan_id);
            $user = User::find($kemahasiswaan->user_id);

            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);

            $kemahasiswaan->update([
                'jenis_kelamin' => $this->jenis_kelamin,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
            ]);
        }

        $this->resetInput();

        $this->emit('kemahasiswaanUpdate');
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

    public function showKemahasiswaan ($kemahasiswaan, $user)
    {
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->jenis_kelamin = $kemahasiswaan['jenis_kelamin'];
        $this->alamat = $kemahasiswaan['alamat'];
        $this->no_hp = $kemahasiswaan['no_hp'];
        $this->kemahasiswaan_id = $kemahasiswaan['id'];
    }
}
