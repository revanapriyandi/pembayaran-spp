<?php

namespace App\Http\Livewire\Tagihan;

use App\Models\Spp;
use Livewire\Component;

class Create extends Component
{
    public $periode_id;
    public $jumlah;

    public function store()
    {
        $this->validate([
            'periode_id' => ['required','integer'],
            'jumlah' => ['required'],
        ]);

        $data = Spp::create([
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
        return view('tagihan.create')
        ->layout('layouts.app', ['header' => 'Tagihan Baru']);
    }
}
