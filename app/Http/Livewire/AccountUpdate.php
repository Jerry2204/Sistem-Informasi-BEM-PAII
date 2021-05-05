<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountUpdate extends Component
{
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'password' => 'confirmed|min:8'
    ];

    public function render()
    {
        return view('livewire.account-update');
    }

    public function store ()
    {
        $this->validate();
    }

    public function updated ($PropertyName) {
        $this->validateOnly($PropertyName);
    }

    public function initiate ()
    {
        $this->email = auth()->user()->email;
    }
}
