<div>
    <div class="mb-4 d-flex justify-content-end">
        <a wire:navigate href="{{ route('year.create') }}">
            <button class="btn btn-primary">Buat Tahun Ajaran Baru</button>
        </a>
    </div>

    <table id="schoolYear" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tahun ajaran</th>
                <th>Semester</th>
                <th>Tanggal dimulai</th>
                <th>Tanggal berakhir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                $('#schoolYear').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.schoolYear') }}',
                    columns: [
                        { data: 'periode', name: 'periode' },
                        { data: 'semester', name: 'semester' },
                        { data: 'tgl_mulai', name: 'tgl_mulai' },
                        { data: 'tgl_selesai', name: 'tgl_selesai' },
                        { data: 'status', name: 'status', orderable: false },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    </x-slot>
</div>