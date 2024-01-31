@extends('base')

@section('base')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
        <link href="fullcalendar/bootstrap/main.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        

        <title>Calendario de Eventos</title>
    </head>

    <body style="background-color:  #e2e7eb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h2 class="text-center" style="margin-top: 5%; margin-bottom: -50px; text-decoration: underline">Calendario de Eventos</h2>
                    <div class="info text-right">
                        <img id="icono-info" src="{{ asset('img/info3.png') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div id='calendar-container'>
                        <div id='calendar' style="background-color: #f5f5f5"></div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('es_director') == 1)
            <!-- Modal Añadir Evento -->
            <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Evento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('insertar_evento') }}" method="POST">{{-- ////////////NAMES SIEMPRE COMO EN LA BD//////////// --}}
                                @csrf {{-- ////////////NO OLVIDAR PONER EL CSRF//////////// --}}
                                <div class="form-group">
                                    <label for="tituloev" class="col-form-label">Título:</label>
                                    <input type="text" class="form-control" name="titulo_evento" id="tituloev" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion" class="col-form-label">Descripción:</label>
                                    <textarea type="text" class="form-control" name="descripcion" id="descripcion" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="fecha" class="col-form-label">Fecha:</label>
                                    <input type="date" class="form-control" name="fecha_evento" id="fecha" required
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="horainicio" class="col-form-label">Hora Incio:</label>
                                    <input type="time" class="form-control" name="hora_inicio" id="horainicio" required>

                                </div>
                                <div class="form-group">
                                    <label for="horafin" class="col-form-label">Hora Fin:</label>
                                    <input type="time" class="form-control" name="hora_fin" id="horafin" required>

                                </div>
                                <div class="form-group">
                                    <label for="tipo_evento" class="col-form-label">Tipo Evento:</label>
                                    <select class="form-control" name="id_tipo_evento" id="tipo_evento" required>
                                        @foreach ($tip_eventos as $tip_evento)
                                            <option value="{{ $tip_evento->id_tipo_evento }}">{{ $tip_evento->tipologia }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id_usuario" value="{{ Auth::id() }}">
                                    {{-- Campo oculto para almacenar el ID del usuario --}}
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success" id="BtnAceptar">Aceptar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <!-- Modal para mostrar la descripción del evento -->
        <div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="eventoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="eventoModalLabel">Descripción del Evento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Aquí se insertará la descripción del evento -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        @if (session('es_director') == 1)
                            <button type="button" class="btn btn-danger btn-eliminar">¿Quieres
                                eliminar el Evento?</button>
                        @endif
                        <div class="form-group"hidden>
                            <label for="id" class="col-form-label">Id:</label>
                            <input type="text" class="form-control" name="id_evento" id="id_evento">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de confirmación -->
        <div class="modal fade" id="modal-confirmacion" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Confirmación</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar este Evento?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('eliminar_evento') }}" method="POST">
                            @csrf

                            <div class="form-group" hidden>
                                <label for="id_conf" class="col-form-label">Id:</label>
                                <input type="text" class="form-control" name="id_evento" id="id_conf">
                            </div>
                            <button type="submit" class="btn btn-danger btn-delete">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal Informacion -->
         <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="eventoModalLabel">Instrucciones</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <!-- Aquí se insertará la descripción del evento -->
                     {{-- <div class="instrucciones">
                        <h3 style="text-decoration: underline">Instrucciones</h3>
                    </div> --}}
                    <div class="ins">
                        <ul>
                            <li>Selecciona el día en el que desees añadir el Evento</li>
                            <li>Completa el modal con los datos relativos al mismo</li>
                            <li>Pulsa Aceptar</li>
                        </ul>
                    </div>
                    <div class="conclusion">
                        <p>Una vez seguidos los pasos, el evento aparecerá en el calendario.</p>
                        <p>Si deseas ver la Descripción del Evento @if (session('es_director') == 1)
                                o Eliminarlo,
                            @endif haz click sobre él</p>
        
                    </div>
                 </div>
             </div>
         </div>
     </div>
        {{-- ////////////////////////////////////////////////////////////////SCRIPTS/////////////////////////////////////////////////////////////////// --}}
        {{-- ///////////FULLCALENDAR///////////// --}}
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js"></script>
        {{-- ///////////JS FULLCALENDAR///////////// --}}
        <script src="fullcalendar/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js"></script>
       <!-- jQuery -->
       <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       <!-- Incluir los archivos JS de Bootstrap -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
           integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
       </script>
        
        <script src="js/calendario.js" type="text/javascript"></script>
       <script>
            //////////////////////////////////////////////////////ELIMINAR/////////////////////////////////////////////////
            $(document).ready(function() {
                var idEvento;

                // Evento click en el botón "Eliminar Evento"
                $(document).on('click', '.btn-eliminar', function() {
                    // Obtener el valor del input id_evento
                    idEvento = $('#id_evento').val();
                    console.log(idEvento);
                    $('#modal-confirmacion').modal('show');
                    $('#eventoModal').modal('hide');

                });


                // Evento click en el botón "Eliminar" del modal de confirmación
                $('#modal-confirmacion').on('click', '.btn-delete', function() {
                    // Enviar una solicitud AJAX para eliminar el evento
                    $.ajax({
                        url: '{{ route('eliminar_evento') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_evento: idEvento
                        },
                        success: function(response) {
                            // Realizar acciones adicionales después de eliminar el evento
                            // ...

                            // Cerrar el modal de confirmación
                            $('#modal-confirmacion').modal('hide');
                        },
                        error: function(xhr) {
                            // Manejar errores de la solicitud AJAX si es necesario
                            // ...
                        }
                    });
                });
            });

        </script>
        <script>
            $(document).ready(function() {
  $('#icono-info').click(function() {
    // var contenidoInformacion = $('.informacion').html();
    // $('#infoModal .modal-body').html(contenidoInformacion);
    $('#infoModal').modal('show');
  });
});

        </script>
    </body>
@endsection