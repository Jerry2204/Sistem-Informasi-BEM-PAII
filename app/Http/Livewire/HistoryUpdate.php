<?php

namespace App\Http\Livewire;

use App\Models\History;
use Livewire\Component;

class HistoryUpdate extends Component
{
    public $ketua;
    public $wakil_ketua;
    public $tahun_mulai;
    public $tahun_exp;
    public $history_id;

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

    protected $listeners = [
        'getHistory' => 'showHistory'
    ];

    public function render()
    {
        return view('livewire.history-update');
    }

    public function update ()
    {
        $this->validate();

        if ($this->history_id) {
            $history = History::find($this->history_id);

            $history->update([
                'ketua' => $this->ketua,
                'wakil' => $this->wakil_ketua,
                'tahun_mulai' => $this->tahun_mulai,
                'tahun_exp' => $this->tahun_exp,
            ]);
        }

        $this->resetInput();

        $this->emit('historyUpdate');
    }

    public function updated ($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function showHistory ($history)
    {
        $this->ketua = $history['ketua'];
        $this->wakil_ketua = $history['wakil_ketua'];
        $this->tahun_mulai = date('Y-m', strtotime($history['tahun_mulai']));
        $this->tahun_exp = date('Y-m', strtotime($history['tahun_exp']));
        $this->history_id = $history['id'];
    }

    private function resetInput() {
        $this->ketua = null;
        $this->wakil_ketua = null;
        $this->tahun_mulai = null;
        $this->tahun_exp = null;
    }
}
