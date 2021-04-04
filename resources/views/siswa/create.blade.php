<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Form Create Siswa') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Membuat data Siswa.') }}
    </x-slot>

    <x-slot name="form">
        <div class="w-md-75">
            <div class="form-group">
                <x-jet-label for="nisn" value="{{ __('Nisn') }}" />
                <x-jet-input id="nisn" type="text" class="{{ $errors->has('nisn') ? 'is-invalid' : '' }}"
                    wire:model="nisn" autocomplete="nisn" required />
                <x-jet-input-error for="nisn" />
            </div>

            <div class="form-group">
                <x-jet-label for="nis" value="{{ __('Nis') }}" />
                <x-jet-input id="nis" type="text" class="{{ $errors->has('nis') ? 'is-invalid' : '' }}"
                    wire:model="nis" autocomplete="nis" required />
                <x-jet-input-error for="nis" />
            </div>

            <div class="form-group">
                <x-jet-label for="nama" value="{{ __('Nama Lengkap') }}" />
                <x-jet-input id="nama" type="text" class="{{ $errors->has('nama') ? 'is-invalid' : '' }}"
                    wire:model="nama" autocomplete="nama" required />
                <x-jet-input-error for="nama" />
            </div>

            <div class="form-group">
                <x-jet-label for="kelas_id" value="{{ __('Kelas') }}" />
                <select name="kelas_id" id="kelas_id" class="form-control " required wire:model="kelas_id">
                    @php
                        $datas = App\Models\Kelas::all();
                    @endphp
                    @foreach ($datas as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="kelas_id" />
            </div>

            <div class="form-group">
                <x-jet-label for="spp_id" value="{{ __('SPP') }}" />
                <select name="spp_id" id="spp_id" class="form-control " required wire:model="spp_id">
                    @php
                        $datas = App\Models\Spp::all();
                    @endphp
                    @foreach ($datas as $data)
                        <option value="{{ $data->id }}">{{ $data->jumlah }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="spp_id" />
            </div>

            <div class="form-group">
                <x-jet-label for="no_telp" value="{{ __('No Telp') }}" />
                <x-jet-input id="no_telp" type="telp" class="{{ $errors->has('no_telp') ? 'is-invalid' : '' }}"
                    wire:model="no_telp" autocomplete="no_telp" required />
                <x-jet-input-error for="no_telp" />
            </div>

            <div class="form-group">
                <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
                <textarea name="alamat" id="alamat" cols="15" rows="5" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" wire:model="alamat"></textarea>
                <x-jet-input-error for="alamat" />
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
