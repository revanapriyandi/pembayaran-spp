<x-jet-form-section submit="updatePengguna">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Perbarui informasi profil, email dan username akun Anda.') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                             wire:model="name" autocomplete="name" />
                <x-jet-input-error for="name" />
            </div>

            <div class="form-group">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
                             wire:model="username" autocomplete="email" />
                <x-jet-input-error for="username" />
            </div>

            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                             wire:model="email" autocomplete="email" />
                <x-jet-input-error for="email" />
            </div>

            @if (auth()->user()->level == 'admin')
            <div class="form-group">
                <x-jet-label for="level" value="{{ __('Level') }}" />
                <select name="level" id="level" class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" wire:model="level">
                    <option value="admin">{{ __('Admin') }}</option>
                    <option value="petugas">{{ __('Petugas') }}</option>
                </select>
                <x-jet-input-error for="level" />
            </div>
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
