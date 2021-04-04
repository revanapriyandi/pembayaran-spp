<?php

namespace App\Http\Livewire\Pengguna;

use Exception;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use WithFileUploads;

    public $idUser;
    public $name;
    public $username;
    public $email;
    public $level;
    public $keterangan;

    public function mount()
    {
        $this->idUser = request()->id;

        $user = User::findOrFail($this->idUser);
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->level = $user->level;
        $this->keterangan = $user->keterangan;
    }

    public function updatePengguna()
    {
        $this->validate([
            'name' => ['required','string','min:2','max:50'],
            'username' => ['required', 'max:25', Rule::unique('users', 'username')->ignore($this->idUser)],
            'email' => ['required', 'max:25', Rule::unique('users', 'email')->ignore($this->idUser)],
            'level' => ['required','string'],
        ]);

        User::findOrFail($this->idUser)->update([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'level' => $this->level ?? $this->user->level,
        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
    }

    public function render()
    {
        return view('pengguna.edit')
            ->layout('layouts.app', ['header' => 'Pengguna Edit']);
    }
}
