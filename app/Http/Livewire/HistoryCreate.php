<?php

namespace App\Http\Livewire;

use App\Models\History;
use Livewire\Component;

class HistoryCreate extends Component
{
    public $ketua;
    public $wakil_ketua;
    public $tahun_mulai;
    public $tahun_exp;

    protected $rules = [
        'ketua' => 'required',
        'wakil_ketua' => 'required',
        'tahun_mulai' => 'required',
        'tahun_exp' => 'required'
    ];

    protected $messages = [
        'ketua.required' => 'Ketua tidak boleh kosong',
        'wakil_ketua.required' => 'Wakil Ketua tidak boleh kosong',
        'tahun_mulai.required' => 'Tahun Mulai tidak boleh kosong',
        'tahun_exp.required' => 'Tahun Akhir tidak boleh kosong',
    ];

    public function render()
    {
        return view('livewire.history-create');
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function store() {
        $this->validate();

        $history = new History();
        $history->ketua = $this->ketua;
        $history->wakil_ketua = $this->wakil_ketua;
        $history->tahun_mulai = $this->tahun_mulai;
        $history->tahun_exp = $this->tahun_exp;
        $history->save();

        $this->resetInput();

        session()->flash('message', 'Sejarah berhasil ditambahkan');

        $this->emit('historyStore');
    }

    private function resetInput() {
        $this->ketua = null;
        $this->wakil_ketua = null;
        $this->tahun_mulai = null;
        $this->tahun_exp = null;
    }
}
