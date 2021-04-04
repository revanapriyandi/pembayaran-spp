<?php

namespace App\Http\Livewire\Pengguna;

use Exception;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class Create extends Component
{
    public $name;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $level;
    public $keterangan;

    public function store()
    {
        $this->validate([
            'name' => ['required','string','min:2','max:50'],
            'username' => ['required', 'max:25','unique:users,username'],
            'email' => ['required', 'max:25', 'unique:users,email'],
            'password' => ['required', 'string', new Password, 'confirmed'],
            'level' => ['required','string'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'level' => $this->level,
        ]);

        if ($user) {
            $this->emit('alert', ['type' => 'success', 'message' => 'Data Berhasil ditambahkan ']);
        }

        $this->reset();

    }

    public function render()
    {
        return view('pengguna.create')
            ->layout('layouts.app', ['header' => 'Pengguna Baru']);
    }
}
