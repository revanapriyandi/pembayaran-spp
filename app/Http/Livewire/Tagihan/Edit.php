<?php

namespace App\Http\Livewire\Tagihan;

use App\Models\Spp;
use Livewire\Component;

class Edit extends Component
{
    public $idData;
    public $periode_id;
    public $jumlah;

    public function mount()
    {
        $this->idData = request()->id;

        $data = Spp::findOrFail($this->idData);
        $this->periode_id = $data->periode_id;
        $this->jumlah = $data->jumlah;
    }

    public function update()
    {
        $this->validate([
            'periode_id' => ['required','integer'],
            'jumlah' => ['required'],
        ]);

        $data = Spp::findOrFail($this->idData)->update([
            'periode_id' => $this->periode_id,
            'jumlah' => $this->jumlah,
        ]);

        if ($data) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

        $this->reset();

    }

    public function render()
    {
        return view('tagihan.edit')
        ->layout('layouts.app', ['header' => 'Tagihan Edit']);
    }
}
