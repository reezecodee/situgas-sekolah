<div>
    <x-slot name="style">
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    </x-slot>

    <div class="mb-4 d-flex justify-content-end gap-2">
        <a href="{{ route('calendar.index') }}">
            <button class="btn btn-success">Tampilkan kalender</button>
        </a>
        <a href="{{ route('calendar.create') }}" wire:navigate>
            <button class="btn btn-primary">Buat Jadwal</button>
        </a>
    </div>

    <div id="calendar" class="mb-5"></div>

    <table id="calendarTable" class="table table-bordered table-striped">
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

    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
        <script>
            var calendarEl = document.getElementById('calendar');

                            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/kalender-akademik', // Endpoint untuk data event
                eventContent: function(info) {
                    let bootstrapClass = '';

                    // Atur warna berdasarkan tipe event
                    if (info.event.extendedProps.description === 'Libur') {
                        bootstrapClass = 'bg-danger'; // Merah
                    } else if (info.event.extendedProps.description === 'Kegiatan') {
                        bootstrapClass = 'bg-success'; // Hijau
                    } else {
                        bootstrapClass = 'bg-warning'; // Kuning
                    }

                    // Kembalikan elemen HTML dengan kelas Bootstrap
                    return {
                        html: `<div title="${info.event.title}" class="overflow-hidden text-white p-1 ${bootstrapClass}">${info.event.title}</div>`
                    };
                }
            });

            calendar.render();
        </script>
        <script>
            $(document).ready(function() {
                $('#calendarTable').DataTable({
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
    </x-slot>
</div>
