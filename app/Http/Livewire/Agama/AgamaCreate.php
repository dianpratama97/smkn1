<?php

namespace App\Http\Livewire\Agama;

use App\Models\Agama;
use Livewire\Component;

class AgamaCreate extends Component
{

    // ambil data name dari form
    public $name;
    public function render()
    {
        return view('livewire.agama.agama-create');
    }

    //simpan
    public function store()
    {
        $this->validate([
            'name' => 'required|string'
        ]);
        $data = Agama::create([
            'name' => $this->name
        ]);

        $this->resetInput();
        $this->emit('stored', $data);
    }

    //kosongkan form saat success
    private function resetInput()
    {
        $this->name = null;
    }

}
