<?php

namespace App\Http\Livewire\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class JurusanIndex extends Component
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
        Jurusan::destroy($id);
        $this->dispatchBrowserEvent('modal-delete');
        session()->flash('pesan', 'Data Berhasil di Hapus.');
    }
    public function render()
    {
        return view('livewire.jurusan.jurusan-index',[
            'data' => Jurusan::orderBy('id', 'asc')->get(),
        ]);
    }

    public function getDataId($id)
    {
        $this->statusUpdate = true;
        $data = Jurusan::find($id);
        $this->emit('getDataId', $data);
    }

    public function handleStore($data)
    {
        session()->flash('pesan', 'Data ' . $data['name'] . ' Berhasil di Buat.');
    }

    public function handleUpdate($data)
    {
        session()->flash('pesan', 'Data ' . $data['name'] . ' Berhasil di Edit.');
    }
}
