<?php

namespace App\Http\Livewire\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class JurusanUpdate extends Component
{
    public $name;
    public $kode;
    public $dataId;
    public $bidang_keahlian;
    public $bidang_khusus;
    public $bidang_umum;

    protected $listeners = [
        'getDataId' => 'showData',
    ];
    public function render()
    {
        return view('livewire.jurusan.jurusan-update');
    }

    public function showData($jurusan)
    {
        $this->name = $jurusan['name'];
        $this->kode = $jurusan['kode'];
        $this->bidang_keahlian = $jurusan['bidang_keahlian'];
        $this->bidang_khusus = $jurusan['bidang_khusus'];
        $this->bidang_umum = $jurusan['bidang_umum'];
        $this->dataId = $jurusan['id'];
    }


    //update
    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'kode' => 'required|string',
            'bidang_keahlian' => 'required|string',
            'bidang_umum' => 'required|string',
            'bidang_khusus' => 'required|string',
        ]);

        if ($this->dataId) {
            $data = Jurusan::find($this->dataId);
            $data->update([
                'name' => $this->name,
                'kode' => $this->kode,
                'bidang_keahlian' => $this->bidang_keahlian,
                'bidang_umum' => $this->bidang_umum,
                'bidang_khusus' => $this->bidang_khusus,
            ]);

            $this->resetInput();

            $this->emit('update', $data);
        }
    }

    //kosongkan form saat success
    private function resetInput()
    {
        $this->name = null;
        $this->status = null;
        $this->kode = null;
        $this->bidang_keahlian = null;
        $this->bidang_khusus = null;
        $this->bidang_umum = null;
    }
}
