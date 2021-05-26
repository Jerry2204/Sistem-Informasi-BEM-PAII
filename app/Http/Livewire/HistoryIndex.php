<?php

namespace App\Http\Livewire;

use App\Models\History;
use Livewire\Component;

class HistoryIndex extends Component
{

    public $histories;

    public $statusUpdate = false;
    public $statusCreate = true;

    protected $listeners = [
        'historyStore' => 'handleStored',
        'historyUpdate' => 'handleUpdated',
        'destroy'
    ];

    public function render()
    {
        $this->histories = History::all();

        return view('livewire.history-index');
    }

    public function getHistory (History $history) {
        $this->statusUpdate = true;
        $this->emit('getHistory', $history);
    }

    public function confirmation($id) {
        $this->statusUpdate = false;

        $this->dispatchBrowserEvent('swal:confirm', [
            'icon' => 'warning',
            'title' => 'Apakah anda yakin?',
            'text' => '',
            'id' => $id
        ]);
    }

    public function destroy (History $history) {

        if ($history) {
            $history->delete();
        }

    }

    public function handleStored() {
        $this->statusCreate = false;
    }

    public function handleUpdated() {
        session()->flash('message', 'Sejarah berhasil diubah');

        $this->statusUpdate = false;
    }
}
