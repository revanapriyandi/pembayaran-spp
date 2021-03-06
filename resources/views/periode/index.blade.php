<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Periode') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-title">
            <a href="{{ route('periode.create') }}" class="btn btn-primary btn-sm">{{ __('Tambah Data') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless" id="table-periode">
                    <thead align="center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Nama') }}</th>
                            <th scope="col">{{ __('Tanggal Mulai') }}</th>
                            <th scope="col">{{ __('Tanggal Selesai') }}</th>
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
        var table = $('#table-periode').DataTable({
                    destroy: true,
                    info: false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('periode') }}",
                    columns: [
                        { data: 'DT_RowIndex', name:'DT_RowIndex'},
                        {data: 'nama', name: 'nama'},
                        {data: 'tgl_mulai', name: 'tgl_mulai'},
                        {data: 'tgl_selesai', name: 'tgl_selesai'},
                        {data: 'is_active', name: 'is_active'},
                        {data: 'aksi', name:'aksi'}
                    ]
                });
    </script>
    @endpush
</x-app-layout>
