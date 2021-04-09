document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '2021-09-12',
        navLinks: true,
        businessHours: true,
        editable: true,
        selectable: true,
        timeZone: 'UTC',
        dateClick: function (info) {
            
        },
        eventClick: function(event, jsEvent, view) {
            const { title } = event.event._def;
            const { description } = event.event._def.extendedProps;
            $('#modal-title').html(title);
            $('#modal-body').html(description);
            $('#modal').modal();

            console.log(event.event._def)
        },
        events: [{
                title: 'Business Lunch',
                start: '2021-09-03T13:00:00',
                constraint: 'businessHours',
                description: 'Makan enak'
            },
            {
                title: 'Meeting',
                start: '2021-09-13T11:00:00',
                constraint: 'availableForMeeting',
                color: '#257e4a',
                description: 'Rapat paripurna'
            },
            {
                title: 'Conference',
                start: '2021-09-18',
                end: '2021-09-20'
            },
            {
                title: 'Party',
                start: '2021-09-29T20:00:00'
            },
            {
                groupId: 'availableForMeeting',
                start: '2021-09-11T10:00:00',
                end: '2021-09-11T16:00:00',
                display: 'background'
            },
            {
                groupId: 'availableForMeeting',
                start: '2021-09-13T10:00:00',
                end: '2021-09-13T16:00:00',
                display: 'background'
            },
            {
                start: '2021-09-24',
                end: '2021-09-28',
                overlap: false,
                display: 'background',
                color: '#ff9f89'
            },
            {
                start: '2021-09-06',
                end: '2021-09-08',
                overlap: false,
                display: 'background',
                color: '#ff9f89'
            }
        ]
    });

    calendar.render();

});
