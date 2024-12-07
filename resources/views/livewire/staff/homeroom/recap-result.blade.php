<div>
    <table id="recapTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>

    <!-- Livewire modal -->
    <livewire:components.report-modal />

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#recapTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.recap') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'nis', name: 'nis' },
                        { data: 'nisn', name: 'nisn' },
                        { data: 'nama', name: 'nama' },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    </x-slot>
</div>
