$(document).ready(function () {
    let table = $('#tabla-usuarios').DataTable({
  
      // Opciones de DataTables
      
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
      columns: [
          { title: "ID", data: "id_usuario" },
          { title: "Título", data: "titulo_partitura", render: function(data, type, row) {
              return data;
          }},
          { title: "Autor", data: "autor" },
          { title: "Fecha de Creación", data: "fecha_creacion" },
          { title: "Tipo", data: "estilo" },
          { title: "Instrumento", data: "instrumento" },
          {/////////////////////////////////
            title: "Acciones",
            data: null,
            render: function(data, type, row) {
              return '<button class="btn btn-danger btn-eliminar" data-id="' + data.id_partitura + '">Eliminar</button>';
            }
          }
      ],
      columnDefs: [
        {
          targets: 0, // Índice de la columna a ocultar (0 en este caso)
          visible: false, // Ocultar la columna
        }
      ]
  });
  $.ajax({
    url: '../consultas/con_partitura.php',
    method: 'POST',
    dataType: 'json',
    success: function (response) {
      // Procesar los datos de la consulta
      console.log(response);
  
      // Agregar los datos a DataTable
      $.each(response, function (index, value) {
        var row = table.row.add({
          "id_partitura": value.id_partitura,
          "titulo_partitura": value.titulo_partitura,
          "autor": value.autor,
          "fecha_creacion": value.fecha_creacion,
          "estilo": value.estilo,
          "instrumento": value.nombre_instrumento
        }).draw().node();
  
        $(row).attr('id', 'partitura_' + value.id_partitura);
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
});