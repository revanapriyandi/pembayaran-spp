<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Pengguna') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-title">
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary btn-sm">{{ __('Tambah Data') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" id="table-pengguna">
                    <thead align="center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Nama') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Akses') }}</th>
                            <th scope="col">{{ __('isActive') }}</th>
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
        var table = $('#table-pengguna').DataTable({
                    destroy: true,
                    info: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('pengguna') }}",
                    columns: [
                        { data: 'DT_RowIndex', name:'DT_RowIndex'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'level', name: 'level'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'aksi', name:'aksi'}
                    ]
                });
    </script>
    @endpush
</x-app-layout>
