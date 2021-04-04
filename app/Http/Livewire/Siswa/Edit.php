<?php

namespace App\Http\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;

class Edit extends Component
{
    public $idData;
    public $nisn;
    public $nis;
    public $nama;
    public $kelas_id;
    public $alamat;
    public $no_telp;
    public $spp_id;

    public function mount()
    {
        $this->idData = request()->id;

        $data = Siswa::findOrFail($this->idData);
        $this->nisn = $data->nisn;
        $this->nis = $data->nis;
        $this->nama = $data->nama;
        $this->kelas_id = $data->kelas_id;
        $this->alamat = $data->alamat;
        $this->no_telp = $data->no_telp;
        $this->spp_id = $data->spp_id;
    }

    public function update()
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

        $data = Siswa::findOrFail($this->idData)->update([
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
        return view('siswa.edit')
        ->layout('layouts.app', ['header' => 'Siswa Edit']);
    }
}
