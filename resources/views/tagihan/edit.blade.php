<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Form Edit Tagihan') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Membuat Edit Tagihan.') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="form-group">
                <x-jet-label for="periode_id" value="{{ __('Periode') }}" />
                <select name="periode_id" id="periode_id" class="form-control {{ $errors->has('periode_id') ? 'is-invalid' : '' }}" required wire:model="periode_id">
                    @php
                        $datas = App\Models\Periode::all();
                    @endphp
                    @foreach ($datas as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="periode_id" />
            </div>

            <div class="form-group">
                <x-jet-label for="jumlah" value="{{ __('Jumlah Tagihan') }}" />
                <x-jet-input id="jumlah" type="number" class="{{ $errors->has('jumlah') ? 'is-invalid' : '' }}"
                    wire:model="jumlah" autocomplete="jumlah" required />
                <x-jet-input-error for="jumlah" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
