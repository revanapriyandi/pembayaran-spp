<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Periode;
use Livewire\Component;

class Create extends Component
{
    public $periode_id;
    public $nama;
    public $kompetensi_keahlian;

    public function store()
    {
        $this->validate([
            'periode_id' => ['required','integer'],
            'nama' => ['required', 'max:15'],
            'kompetensi_keahlian' => ['required', 'max:30'],
        ]);

        $data = Kelas::create([
            'periode_id' => $this->periode_id,
            'nama' => $this->nama,
            'kompetensi_keahlian' => $this->kompetensi_keahlian
        ]);

        if ($data) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

        $this->reset();

    }

    public function render()
    {
        return view('kelas.create')
        ->layout('layouts.app', ['header' => 'Kelas Baru']);
    }
}
