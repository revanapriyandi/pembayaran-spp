<?php

namespace App\Http\Livewire\Periode;

use App\Models\Periode;
use Livewire\Component;

class Edit extends Component
{
    public $idData;
    public $nama;
    public $tgl_mulai;
    public $tgl_selesai;

    public function mount()
    {
        $this->idData = request()->id;

        $data = Periode::findOrFail($this->idData);
        $this->nama = $data->nama;
        $this->tgl_mulai = $data->tgl_mulai;
        $this->tgl_selesai = $data->tgl_selesai;
    }

    public function update()
    {
        $this->validate([
            'nama' => ['required','string','min:2','max:50'],
            'tgl_mulai' => ['required', 'date'],
            'tgl_selesai' => ['required', 'date'],
        ]);

        $data = Periode::findOrFail($this->idData)->update([
            'nama' => $this->nama,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,
        ]);

        if ($data) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

    }

    public function render()
    {
        return view('periode.edit')
        ->layout('layouts.app', ['header' => 'Periode Edit']);
    }
}
