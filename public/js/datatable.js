
$(document).ready(function () {
  let table = $('#tabla-ejemplo').DataTable({

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
    scrollX: true,
    autoWidth: false,
    responsive: false,
    columns: [
      { title: "ID", data: "id_partitura" },
      {
        title: "Título", data: "titulo_partitura", render: function (data, type, row) {
          return data;
        }
      },
      { title: "Autor", data: "autor" },
      { title: "Fecha de Creación", data: "fecha_creacion" },
      { title: "Tipo", data: "estilo" },
      { title: "Instrumento", data: "instrumento" },
      { title: "Imagen", data: "img_partitura" },//////////////////////////////////////////////
      {/////////////////////////////////
        title: "Acciones",
        data: null,
        render: function (data, type, row) {
          return '<button class="btn btn-danger btn-eliminar" ' + (esDirector==0 ? 'hidden' : '') + ' data-id="' + data.id_partitura + '">Eliminar</button>' + 
          '<button class="btn btn-primary btn-imprimir" style="background-color: #003560" data-id="' + data.id_partitura + '" data-img="' + data.img_partitura + '"><i class="fas fa-print"></i></button>';
        }
      }
    ],
    columnDefs: [
      {
        targets: 0, // Índice de la columna a ocultar (0 en este caso)
        visible: false, // Ocultar la columna
      },
      {/////////////////////////////////////////////////////////////////////////////////
        targets: 6, // Índice de la segunda columna a ocultar (2 en este caso)
        visible: false, // Ocultar la columna
      }
    ]
  });

  $('#tabla-ejemplo').on('click', '.btn-imprimir', function () {
    // Obtener el ID y la URL de la imagen de la partitura desde los atributos data
    var idPartitura = $(this).data('id');
    var imgPartitura = $(this).data('img');
  
    // Crear un documento HTML para la impresión
    var html = '<html><head><title>Partitura</title>';
    html += '<style>@page { size: A4; margin: 0; }</style>'; // Ajustar al tamaño de folio A4 y quitar los márgenes
    html += '<style>img { width: 100%; height: 100%; object-fit: contain; }</style>'; // Ajustar la imagen al tamaño del documento
    html += '</head><body>';
    html += '<img src="' + imgPartitura + '" alt="Partitura">';
    html += '</body></html>';
  
    // Crear un iframe oculto para cargar el documento HTML
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    document.body.appendChild(iframe);
    var iframeWindow = iframe.contentWindow;
    var iframeDocument = iframeWindow.document;
  
    // Escribir el documento HTML en el iframe
    iframeDocument.open();
    iframeDocument.write(html);
    iframeDocument.close();
  
    // Esperar a que el contenido del iframe se cargue completamente
    iframeWindow.addEventListener('load', function () {
      // Imprimir el contenido del iframe
      iframeWindow.print();
  
      // Eliminar el iframe después de la impresión
      document.body.removeChild(iframe);
    });
  });
  
  

  // Variables para almacenar los datos de la fila seleccionada
  let filaSeleccionada;
  let idPartituraSeleccionada;
  let tituloPartituraSeleccionada;
  let autorSeleccionado;
  let fechaCreacionSeleccionada;
  let tipoSeleccionado;
  let instrumentoSeleccionado;
  // let imgSeleccionada;
 

  // Evento click en las filas de la tabla
  $('#tabla-ejemplo tbody').on('click', 'tr', function () {
    // Obtener los datos de la fila seleccionada
    filaSeleccionada = $(this);
    idPartituraSeleccionada = table.row(this).data().id_partitura;
    tituloPartituraSeleccionada = filaSeleccionada.find('td:eq(0)').text();
    autorSeleccionado = filaSeleccionada.find('td:eq(1)').text();
    fechaCreacionSeleccionada = filaSeleccionada.find('td:eq(2)').text();
    tipoSeleccionado = filaSeleccionada.find('td:eq(3)').text();
    instrumentoSeleccionado = filaSeleccionada.find('td:eq(4)').text();
    // imgSeleccionada = table.row(this).data().img_partitura;
    // console.log(imgSeleccionada);
   
  });
  //////////////////////////////////////////////////////MODIFICAR///////////////////////////////////////////////
  // Evento click en el botón de modificar
  $('#btn-modificar').on('click', function () {
    // Rellenar el formulario del modal con los datos de la fila seleccionada
    $('#id_mod').val(idPartituraSeleccionada);
    $('#titulo_mod').val(tituloPartituraSeleccionada);
    $('#autor_mod').val(autorSeleccionado);
    $('#fecha_mod').val(fechaCreacionSeleccionada);
    $('#tipo_mod').find('option:contains("' + tipoSeleccionado + '")').prop('selected', true);
    $('#instrumento_mod').find('option:contains("' + instrumentoSeleccionado + '")').prop('selected', true);
    // $('#imagenmod').val(imgSeleccionada);
    // Continuar con el resto de campos del formulario

    // Abrir el modal
    $('#myModal2').modal('show');
  });
////////////////////////////////////////////OCULTAR BOTÓN MODIFICAR SI NO HAY FILA SELECCIONADA/////////////////////////////////
  // Evento click en las filas de la tabla
// $('.tabla').on('click', 'tr', function () {
//   $(this).toggleClass('selected'); // Agrega o quita la clase 'selected' a la fila seleccionada

//   // Verificar si hay una fila seleccionada y habilitar o deshabilitar el botón de modificar en consecuencia
//   var filasSeleccionadas = $('.tabla').find('tr.selected').length;
//   $('#btn-modificar').prop('disabled', filasSeleccionadas === 0);
// });
$('#tabla-ejemplo tbody').on('click', 'tr', function () {
  $(this).toggleClass('selected'); // Agrega o quita la clase 'selected' a la fila seleccionada

  // Verificar si hay una fila seleccionada y deshabilitar la selección en otras filas
  var filasSeleccionadas = $('#tabla-ejemplo').find('tr.selected');
  if (filasSeleccionadas.length > 1) {
    filasSeleccionadas.not(this).removeClass('selected'); // Quita la clase 'selected' de otras filas seleccionadas
  }

    // Verificar si hay una fila seleccionada y habilitar o deshabilitar el botón de modificar en consecuencia
  var filasSeleccionadass = $('.tabla').find('tr.selected').length;
  $('#btn-modificar').prop('disabled', filasSeleccionadass === 0);
});



  
////////////////////////////////////////////////////LLENAR DATATABLE CON DATOS DE PARTITURAS/////////////////////////////////
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
          "instrumento": value.nombre_instrumento,
          "img_partitura": value.img_partitura
        }).draw().node();

        $(row).attr('id', 'partitura_' + value.id_partitura);
      });
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
});