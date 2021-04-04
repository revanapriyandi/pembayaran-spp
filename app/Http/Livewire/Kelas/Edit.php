<?php

namespace App\Http\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Edit extends Component
{

    public $idData;
    public $nama;
    public $periode_id;
    public $kompetensi_keahlian;

    public function mount()
    {
        $this->idData = request()->id;

        $data = Kelas::findOrFail($this->idData);
        $this->nama = $data->nama;
        $this->periode_id = $data->periode_id;
        $this->kompetensi_keahlian = $data->kompetensi_keahlian;
    }

    public function update()
    {
        $this->validate([
            'nama' => ['required','string','min:2','max:50'],
            'periode_id' => ['required', 'integer'],
            'kompetensi_keahlian' => ['required', 'string','max:30'],
        ]);

        $data = Kelas::findOrFail($this->idData)->update([
            'nama' => $this->nama,
            'periode_id' => $this->periode_id,
            'kompetensi_keahlian' => $this->kompetensi_keahlian,
        ]);

        if ($data) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

    }

    public function render()
    {
        return view('kelas.edit')
        ->layout('layouts.app', ['header' => 'Kelas Edit']);
    }
}
