<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Form Create Periode') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Membuat data Periode.') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="form-group">
                <x-jet-label for="nama" value="{{ __('Nama') }}" />
                <x-jet-input id="nama" type="text" class="{{ $errors->has('nama') ? 'is-invalid' : '' }}"
                    wire:model="nama" autocomplete="nama" required />
                <x-jet-input-error for="nama" />
            </div>

            <div class="form-group">
                <x-jet-label for="tgl_mulai" value="{{ __('Tanggal Mulai') }}" />
                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control {{ $errors->has('tgl_mulai') ? 'is-invalid' : '' }}"  wire:model="tgl_mulai" required />
                <x-jet-input-error for="tgl_mulai" />
            </div>

            <div class="form-group">
                <x-jet-label for="tgl_selesai" value="{{ __('Tanggal Selesai') }}" />
                <input type="date" name="tgl_selesai" class="form-control {{ $errors->has('tgl_selesai') ? 'is-invalid' : '' }}" id="tgl_selesai" wire:model="tgl_selesai" required />
                <x-jet-input-error for="tgl_selesai" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
