document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        themeSystem: 'bootstrap',
        initialDate: Date.now(),
        navLinks: true,
        businessHours: true,
        dayMaxEventRows: true,
        views: {
            timeGrid: {
                dayMaxEventRows: 6
            }
        },
        selectable: true,
        timeZone: 'UTC',
        dateClick: function (info) {

        },
        eventClick: function (event, jsEvent, view) {
            const {
                title
            } = event.event._def;
            const {
                description
            } = event.event._def.extendedProps;
            $('#modal-title').html(title);
            $('#modal-body').html(description);
            $('#modal').modal();
        },
        events: '/activity/data',
    });

    calendar.render();

});
