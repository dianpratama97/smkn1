<?php

namespace App\Http\Livewire\Agama;

use App\Models\Agama;
use Livewire\Component;

class AgamaUpdate extends Component
{
    public $name;
    public $agamaId;

    protected $listeners = [
        'getAgama' => 'showAgama',
    ];

    public function render()
    {
        return view('livewire.agama.agama-update');
    }

    public function showAgama($agama)
    {
        $this->name = $agama['name'];
        $this->agamaId = $agama['id'];
    }


    //update
    public function update()
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        if ($this->agamaId) {
            $data = Agama::find($this->agamaId);
            $data->update([
                'name' => $this->name
            ]);

            $this->resetInput();

            $this->emit('update', $data);
        }
    }

    //kosongkan form saat success
    private function resetInput()
    {
        $this->name = null;
    }
}
