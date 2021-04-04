<?php

namespace App\Http\Livewire\Periode;

use App\Models\Periode;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $tgl_mulai;
    public $tgl_selesai;

    public function store()
    {
        $this->validate([
            'nama' => ['required','string','min:2','max:50'],
            'tgl_mulai' => ['required', 'date'],
            'tgl_selesai' => ['required', 'date'],
        ]);

        $data = Periode::create([
            'nama' => $this->nama,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
            'is_active' => true
        ]);

        if ($data) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

        $this->reset();

    }

    public function render()
    {
        return view('periode.create')
        ->layout('layouts.app', ['header' => 'Periode Baru']);
    }
}
