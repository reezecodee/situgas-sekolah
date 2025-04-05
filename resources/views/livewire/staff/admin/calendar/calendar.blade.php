<div>
    <x-slot name="style">

    </x-slot>

    @role('Admin')
    <div class="mb-4 d-flex justify-content-end">
        <a href="{{ route('calendar.create') }}" wire:navigate>
            <button class="btn btn-primary">Buat Jadwal</button>
        </a>
    </div>
    @endrole

    <div id="calendar" class="mb-5"></div>

    @role('Admin')
    <table id="datatable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal mulai</th>
                <th>Tanggal selesai</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    @endrole

    <x-slot name="script">
        <script>
            var calendarEl = document.getElementById('calendar');

                            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/kalender-akademik', // Endpoint untuk data event
                eventContent: function(info) {
                    let bootstrapClass = '';

                    if (info.event.extendedProps.description === 'Libur') {
                        bootstrapClass = 'bg-danger'; 
                    } else if (info.event.extendedProps.description === 'Kegiatan') {
                        bootstrapClass = 'bg-success'; 
                    } else {
                        bootstrapClass = 'bg-warning'; 
                    }

                    return {
                        html: `<div title="${info.event.title}" class="overflow-hidden text-white p-1 ${bootstrapClass}">${info.event.title}</div>`
                    };
                }
            });

            calendar.render();
        </script>
        @role('Admin')
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dt.calendar') }}',
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'judul', name: 'judul' },
                { data: 'tgl_mulai', name: 'tgl_mulai' },
                { data: 'tgl_selesai', name: 'tgl_selesai' },
                { data: 'keterangan', name: 'keterangan', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
        @endrole
    </x-slot>
</div>