<?php

namespace App\Http\Livewire\Agama;

use App\Models\Agama;
use Livewire\Component;

class AgamaIndex extends Component
{
    public $statusUpdate = false;
    public $idHapus;

    protected $listeners = [
        'stored' => 'handleStore',
        'update' => 'handleUpdate',
    ];

    public function hapusKonfirmasi($idHapus)
    {
        $this->idHapus = $idHapus;
        $this->dispatchBrowserEvent('modal-deleteConfirm');
    }

    public function hapus($id)
    {
        Agama::destroy($id);
        $this->dispatchBrowserEvent('modal-delete');
        session()->flash('pesan', 'Data Agama Berhasil di Hapus.');
    }

    public function render()
    {
        return view('livewire.agama.agama-index', [
            'data' => Agama::orderBy('id', 'asc')->get(),
        ]);
    }

    public function getAgama($id)
    {
        $this->statusUpdate = true;
        $agama = Agama::find($id);
        $this->emit('getAgama', $agama);
    }

    public function handleStore($data)
    {
        session()->flash('pesan', 'Data Agama ' . $data['name'] . ' Berhasil di Buat.');
    }

    public function handleUpdate($data)
    {
        session()->flash('pesan', 'Data Agama ' . $data['name'] . ' Berhasil di Edit.');
    }
}
