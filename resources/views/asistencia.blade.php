@extends('base')

@section('base')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



        <title>Asistencias</title>
    </head>

    <body style="background-color:  #e2e7eb">
        <div class="tabla" style="background-color: white">
            <h2 class="text-center" style="text-decoration: underline">Control de Asistencias</h2>
            <table id="tabla-alumnos" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th hidden>ID</th>
                        <th>Nombre del Alumno</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody>

                  @foreach ($usuarios as $usuario)
                  <tr>
                      <td hidden>{{ $usuario->id_usuario }}</td>
                      <td>{{ $usuario->nombre .' '. $usuario->apellidos }}</td>
                      <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="asistencia2">
                            <label class="form-check-label" for="asistencia2">
                                Presente
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="asistencia2-ausente">
                            <label class="form-check-label" for="asistencia2-ausente">
                                Ausente
                            </label>
                        </div>
                    </td>
                  </tr>
              @endforeach 
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
          <button class="btn btn-primary" id="guardar-btn">Guardar Datos</button>
          <button class="btn btn-secondary" id="limpiar-btn">Limpiar Tabla</button>
      </div>
       
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <!-- Incluir los archivos JS de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function() {
                $('#tabla-alumnos').DataTable({

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

                // Manejador de eventos para el botón Guardar Datos
                $('#guardar-btn').click(function() {
                    // Lógica para guardar los datos de la tabla
                    alert('Datos guardados');
                });

                // Manejador de eventos para el botón Limpiar Tabla
                $('#limpiar-btn').click(function() {
                    // Desmarcar todos los checkboxes
                    $('input[type="checkbox"]').prop('checked', false);
                });
            });
        </script>

    </body>
@endsection