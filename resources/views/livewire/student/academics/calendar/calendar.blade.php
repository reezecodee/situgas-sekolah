<div>
    <x-slot name="style">

    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/kalender-akademik',
                eventContent: function(info) {
                    let bootstrapClass = '';

                    if (info.event.extendedProps.description === 'Libur') {
                        bootstrapClass = 'bg-danger'; // Merah
                    } else if (info.event.extendedProps.description === 'Kegiatan') {
                        bootstrapClass = 'bg-success'; // Hijau
                    } else {
                        bootstrapClass = 'bg-warning'; // Kuning
                    }

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