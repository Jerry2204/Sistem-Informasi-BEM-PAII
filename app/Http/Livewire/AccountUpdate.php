<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountUpdate extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'confirmed'
    ];

    public function render()
    {
        $this->email = auth()->user()->email;

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
        // $this->email
    }
}
