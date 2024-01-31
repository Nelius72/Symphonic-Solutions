

document.addEventListener('DOMContentLoaded', function() {
    let formulario = document.querySelector("form");

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,info', 

        },
        views: {
            dayGridMonth: {
                buttonText: 'Mes'
            },
            timeGridWeek: {
                buttonText: 'Semana'
            },
            timeGridDay: {
                buttonText: 'Día'
            },
        },

        dateClick: function(info) {
            $('#evento').modal('show');
            document.getElementById('fecha').value = info
                .dateStr; // Establecer la fecha en el input correspondiente del modal
        },
        events: 'obtener-eventos', // Ruta para obtener los eventos del calendario

        eventRender: function(info) {
            // Verificar si la descripción está presente en el evento
            if (info.event.extendedProps.description) {
                // Agregar la descripción como atributo del evento
                info.el.setAttribute('data-description', info.event.extendedProps.description);
            }
        },


        eventClick: function(info) {
            // Obtener el ID del evento
            var eventId = info.event.extendedProps.id_evento;

            // Obtener la descripción del evento
            var description = info.event.extendedProps.description;

            // Construir el contenido del modal
            var modalContent = "<p>" + description + "</p>";

            // Mostrar el modal con la descripción del evento
            $('#eventoModal').find('.modal-body').html(modalContent);
            $('#eventoModal').find('input[name="id_evento"]').val(
            eventId); // Agregar el ID al input
            $('#eventoModal').modal('show');
        },
        eventBackgroundColor: '#67a8de', // Establecer el color de fondo de los eventos
        eventBorderColor: '#0013f4', // Establecer el color del borde de los eventos
        eventTextColor: 'white', // Establecer el color del texto de los eventos

    });

    calendar.render();
});
