<x-layout.student :title="$title">
    <x-slot name="style">
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="header">
        <x-student.navigation.page-header page-pretitle="overview" :page-title="$title" />
    </x-slot>

    <div id="calendar"></div>

    <x-slot name="script">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: [{
                            title: 'Meeting',
                            start: '2024-11-20',
                            end: '2024-11-22'
                        },
                        {
                            title: 'Workshop',
                            start: '2024-11-25',
                            allDay: true
                        },
                        {
                            title: 'Webinar',
                            start: '2024-11-28T10:00:00',
                            end: '2024-11-28T12:00:00'
                        }
                    ],
                    eventContent: function(info) {
                        let eventColor = '';
                        if (info.event.extendedProps.type === 'Kuning') {
                            eventColor = '#ffd859';
                        } else if (info.event.extendedProps.type === 'Merah') {
                            eventColor = '#db1919';
                        } else if (info.event.extendedProps.type === 'Hijau') {
                            eventColor = '#28a745';
                        }

                        return {
                            html: `<div title="${info.event.title}" class="overflow-hidden" style="background-color: ${eventColor};">${info.event.title}</div>`
                        };
                    }
                });

                calendar.render();
            });
        </script>
    </x-slot>
</x-layout.student>
