// $(document).ready(function () {
//     $("#add-event").submit(function () {
//         alert("Submitted");
//         var values = {};
//         $.each($('#add-event').serializeArray(), function (i, field) {
//             values[field.name] = field.value;
//         });
//     });
// });

(function () {
    "use strict";
    $(function () {
        var calendarEl = document.getElementById("calendar");
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: "bootstrap4",
            businessHours: false,
            initialDate: Date.now(),
            navLinks: true,
            selectable: true,
            businessHours: true,
            dayMaxEventRows: true,
            droppable: true,
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
            },
            events: "/activity/data",
            dateClick: function (info) {
                $("#modal-view-event-add").modal();
                $(".title-form-event").html("Add Event");
                $("#add-event").attr("action", "/calendar/add");
                $("#name").val("");
                $("#date-start").val(info.dateStr);
                $("#date-end").val("");
                $("#description").val("");
                $("#icon").val("");
            },
            eventClick: function (event, jsEvent, view) {
                const { startStr, endStr, id } = event.event;
                const { title, url, publicId } = event.event._def;
                const { description, icon } = event.event._def.extendedProps;

                $(".event-icon").html(
                    "<i class='fa fa-" + event.icon + "'></i>"
                );
                $(".idCalendarEvent").val(publicId);
                $(".event-title").html(title);
                $(".event-body").html(description);
                $(".eventUrl").attr("href", url);
                $("#modal-view-event").modal();

                $(".edit-button").on("click", function () {
                    $("#modal-view-event-add").modal();
                    $("#add-event").attr("action", `/calendar/update/${id}`);
                    $("#name").val(title);
                    $(".title-form-event").html("Edit Event");
                    $("#date-start").val(startStr);
                    $("#date-end").val(endStr);
                    $("#description").val(description);
                    $("#icon").val(icon);
                });
                console.log(event);
            },
        });
        calendar.render();
    });
})(jQuery);
