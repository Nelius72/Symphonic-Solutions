$(document).ready(function() {
    $('#tabla-usuarios').DataTable({

        "language": {
            "search": "Buscar:",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        scrollX:true,
        autoWidth: false,
        responsive: false

    });

     //////////////////////////////////////////////////////MODIFICAR///////////////////////////////////////////////
            // Evento click en el botón de modificar
            $('.btn-modificar').on('click', function() {
                var fila = $(this).closest('tr');
                var id = fila.find('td:first-child').text(); // Corrección: obtener el valor del primer td
                var nombre = fila.find('td:nth-child(2)').text(); // Corrección: obtener el valor del segundo td
                var apellidos = fila.find('td:nth-child(3)').text(); // Corrección: obtener el valor del tercer td
                var username = fila.find('td:nth-child(4)').text(); // Corrección: obtener el valor del cuarto td
                var email = fila.find('td:nth-child(5)').text(); // Corrección: obtener el valor del quinto td

                // Rellenar el formulario del modal con los datos obtenidos
                $('#id').val(id);
                $('#nombre_mod').val(nombre);
                $('#apellidos_mod').val(apellidos);
                $('#username_mod').val(username);
                $('#email_mod').val(email);

                // Abrir el modal
                $('#myModalMod').modal('show');
            });

            //////////////////////////////////////////////////////ELIMINAR/////////////////////////////////////////////////
            // Evento click en el botón "Eliminar Usuario"
            $(document).on('click', '.btn-eliminar', function() {

                var fila = $(this).closest('tr');
                var idUsuario = fila.find('td:first-child').text();
                console.log(idUsuario);
                $('#id_usuario_eliminar').val(idUsuario);
                $('#modal-confirmacion').modal('show');
            });
});

           
       

        
           