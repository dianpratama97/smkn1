<?php

namespace App\Http\Livewire\Jurusan;

use App\Models\Jurusan;
use Livewire\Component;

class JurusanCreate extends Component
{
    public $kode;
    public $name;
    public $bidang_keahlian;
    public $bidang_umum;
    public $bidang_khusus;
    public function render()
    {
        return view('livewire.jurusan.jurusan-create');
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'kode' => 'required|string',
            'bidang_keahlian' => 'required|string',
            'bidang_umum' => 'required|string',
            'bidang_khusus' => 'required|string',
        ]);
        $data = Jurusan::create([
            'name' => $this->name,
            'kode' => $this->kode,
            'bidang_keahlian' => $this->bidang_keahlian,
            'bidang_umum' => $this->bidang_umum,
            'bidang_khusus' => $this->bidang_khusus,
        ]);

        $this->resetInput();
        $this->emit('stored', $data);
    }

    private function resetInput()
    {
        $this->name = null;
        $this->kode = null;
        $this->bidang_keahlian = null;
        $this->bidang_umum = null;
        $this->bidang_khusus = null;
    }
}
