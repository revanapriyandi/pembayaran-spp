<?php

namespace App\Http\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class Create extends Component
{
    public $nisn;
    public $nis;
    public $nama;
    public $kelas_id;
    public $alamat;
    public $no_telp;
    public $spp_id;

    public function store()
    {
        $this->validate([
            'nisn' => ['required','string','max:20'],
            'nis' => ['required','string','max:15'],
            'nama' => ['required', 'max:35'],
            'kelas_id' => ['required', 'integer'],
            'spp_id' => ['required', 'integer'],
            'alamat' => ['nullable', 'string'],
            'no_telp' => ['required', 'string','max:15'],
        ]);

        $data = Siswa::create([
            'nisn' => $this->nisn,
            'nis' => $this->nis,
            'nama' => $this->nama,
            'kelas_id' => $this->kelas_id,
            'spp_id' => $this->spp_id,
            'alamat' => $this->alamat,
            'no_telp' => $this->no_telp,
        ]);

        if ($data) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

        $this->reset();

    }

    public function render()
    {
        return view('siswa.create')
        ->layout('layouts.app', ['header' => 'Siswa Baru']);
    }
}
