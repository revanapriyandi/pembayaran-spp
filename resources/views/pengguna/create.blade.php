<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Form Create Pengguna') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Membuat data pengguna.') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                             wire:model="name" autocomplete="name" required/>
                <x-jet-input-error for="name" />
            </div>

            <div class="form-group">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
                             wire:model="username" autocomplete="email" required/>
                <x-jet-input-error for="username" />
            </div>

            <div class="form-group">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                             wire:model="email" autocomplete="email" required/>
                <x-jet-input-error for="email" />
            </div>

            <div class="form-group">
                <x-jet-label value="{{ __('Password') }}" />

                <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                             name="password" wire:model="password" required autocomplete="new-password" />
                <x-jet-input-error for="password"></x-jet-input-error>
            </div>

            <div class="form-group">
                <x-jet-label value="{{ __('Confirm Password') }}" />

                <x-jet-input class="form-control" wire:model="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>


            <div class="form-group">
                <x-jet-label for="level" value="{{ __('Level') }}" />
                <select name="level" id="level" required class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" wire:model="level">
                    <option value="admin">{{ __('Admin') }}</option>
                    <option value="petugas">{{ __('Petugas') }}</option>
                </select>
                <x-jet-input-error for="level" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
