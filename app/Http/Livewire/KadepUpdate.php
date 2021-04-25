<?php

namespace App\Http\Livewire;

use App\Models\Departemen;
use App\Models\Kadep;
use App\Models\ProgramStudi;
use App\Models\User;
use Livewire\Component;

class KadepUpdate extends Component
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
    public $kadep_id;

    protected  $listeners = [
        'getKadep' => 'showKadep'
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong',
        'nim.required' => 'NIM tidak boleh kosong',
        'nim.max' => 'NIM tidak boleh lebih dari 10 karakter',
        'email.required' => 'Email tidak boleh kosong',
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

        return view('livewire.kadep-update');
    }

    public function update () {
        $kadep_id = Kadep::find($this->kadep_id);
        $this->validate([
            'name' => 'required',
            'nim' => 'required|max:10',
            'email' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'program_studi_id' => 'required',
            'departemen_id' => 'unique:kadep,departemen_id,' . $kadep_id->id
        ]);

        if ($this->kadep_id) {
            $kadep = Kadep::find($this->kadep_id);
            $user = User::find($kadep->user_id);

            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);

            $kadep->update([
                'nim' => $this->nim,
                'jenis_kelamin' => $this->jenis_kelamin,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'program_studi_id' => $this->program_studi_id,
                'departemen_id' => $this->departemen_id
            ]);

            $this->resetInput();

            $this->emit('kadepUpdate');
        }
    }

    public function showKadep ($kadep, $user) {
        $this->name = $user['name'];
        $this->nim = $kadep['nim'];
        $this->jenis_kelamin = $kadep['jenis_kelamin'];
        $this->alamat = $kadep['alamat'];
        $this->email = $user['email'];
        $this->no_hp = $kadep['no_hp'];
        $this->program_studi_id = $kadep['program_studi_id'];
        $this->departemen_id = $kadep['departemen_id'];
        $this->kadep_id = $kadep['id'];
    }

    // public function rules(){
    //     return [

    //         // 'departemen_id' => 'required|unique:kadep,departemen_id'
    //     ];
    // }

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
