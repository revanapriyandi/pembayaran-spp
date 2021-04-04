<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Siswa') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-title">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">{{ __('Tambah Data') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" id="table-siswa">
                    <thead align="center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('NISN') }}</th>
                            <th scope="col">{{ __('NIS') }}</th>
                            <th scope="col">{{ __('Nama') }}</th>
                            <th scope="col">{{ __('Kelas') }}</th>
                            <th scope="col">{{ __('Alamat') }}</th>
                            <th scope="col">{{ __('No Telp') }}</th>
                            <th scope="col">{{ __('') }}</th>
                        </tr>
                    </thead>
                    <tbody align="center">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function confirmDelete(id) {
            swal({
                title: "Yakin Menhapus data ini ?",
                text: "Anda tidak dapat mengembalikan data yang telah di hapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(willDelete){
                if (willDelete) {
                    $('#data-'+id).submit();
                } else {
                    swal("Cancelled Successfully");
                }
            });
        }
        var table = $('#table-siswa').DataTable({
                    destroy: true,
                    info: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('siswa') }}",
                    columns: [
                        { data: 'DT_RowIndex', name:'DT_RowIndex'},
                        {data: 'nisn', name: 'nisn'},
                        {data: 'nis', name: 'nis'},
                        {data: 'nama', name: 'nama'},
                        {data: 'kelas_id', name: 'kelas_id'},
                        {data: 'alamat', name: 'alamat'},
                        {data: 'no_telp', name: 'no_telp'},
                        {data: 'aksi', name:'aksi'}
                    ]
                });
    </script>
    @endpush
</x-app-layout>
