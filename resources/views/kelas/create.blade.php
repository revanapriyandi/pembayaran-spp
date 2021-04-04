<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Form Create Kelas') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Membuat data Kelas.') }}
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
                <x-jet-label for="kompetensi_keahlian" value="{{ __('Kompetensi Keahlian') }}" />
                <x-jet-input id="kompetensi_keahlian" type="text" class="{{ $errors->has('kompetensi_keahlian') ? 'is-invalid' : '' }}"
                    wire:model="kompetensi_keahlian" autocomplete="kompetensi_keahlian" required />
                <x-jet-input-error for="kompetensi_keahlian" />
            </div>

            <div class="form-group">
                <x-jet-label for="periode_id" value="{{ __('Periode') }}" />
                <select name="periode_id" id="periode_id" class="form-control " required wire:model="periode_id">
                    @php
                        $datas = App\Models\Periode::all();
                    @endphp
                    @foreach ($datas as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="periode_id" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
