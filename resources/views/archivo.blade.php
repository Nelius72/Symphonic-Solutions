@extends('base')

@section('base')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/archivo.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        {{-- ////////////BOOTSTRAP/////////// --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        {{-- ////////////DATATABLE/////////// --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <script></script>
        <title>Archivo</title>
    </head>

    <body style="background-color:  #e2e7eb">


        @if (session('es_director') == 1)
            <!-- Botón que abre el modal -->
            <div class="botoneria mt-5  justify-content-center">
                <div class="row">
                    <div class="col-md-4 col-sm-12"></div>
                    <div class="col-md-2 col-6 text-right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Añadir Partitura
                        </button>
                    </div>
                    <div class="col-md-2 col-6">
                        <button id="btn-modificar" type="button" class="btn btn-warning editar-partitura"
                            data-toggle="modal" data-target="#myModal2" disabled>
                            Modificar Partitura
                        </button>
                    </div>
                    <div class="col-md-4 col-sm-12"></div>
                </div>
            </div>
        @endif

        <div class="tabla">
            <h2 class="text-center" style="text-decoration: underline">Tabla de Partituras</h2>
            <table id="tabla-ejemplo" class="table table-striped table-bordered table-hover">

            </table>
        </div>

        <div class="container">
            <h2 class="text-center" style="text-decoration: underline">Galería de Partituras</h2>
            <div class="search-container">
            <form class="search-form" action="{{ route('buscar_partituras') }}" method="GET">
                <input type="text" name="search" placeholder="Buscar Partitura">
                <button type="submit" style="background-color: #003560"><i class="fas fa-search" style="color: #ffffff;"></i></button>
            </form>
            </div>
            <div class="lightbox-gallery">
                @if ($partituras->count() > 0)
                    @foreach ($partituras as $partitura)
                        <div style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.839);">
                            <img src="{{ $partitura->img_partitura }}" data-image-hd="{{ $partitura->img_partitura }}"
                                alt="Título: {{ $partitura->titulo_partitura }} - Autor: {{ $partitura->autor }}">
                        </div>
                    @endforeach
                @else
                    <p>No se encontraron partituras.</p>
                @endif
            </div>
        </div>




        <!-- Modal de confirmación -->
        <div class="modal fade" id="modal-confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas eliminar esta partitura?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('eliminar_partitura') }}" method="POST">
                            @csrf

                            <div class="form-group" hidden>
                                <label for="id" class="col-form-label">Id:</label>
                                <input type="text" class="form-control" name="id_partitura" id="id">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Añadir -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Añadir Partitura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('insertar_partitura') }}" method="POST">{{-- ////////////NAMES SIEMPRE COMO EN LA BD//////////// --}}
                            @csrf {{-- ////////////NO OLVIDAR PONER EL CSRF//////////// --}}
                            <div class="form-group">
                                <label for="titulo" class="col-form-label">Título:</label>
                                <input type="text" class="form-control" name="titulo_partitura" id="titulo"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="autor" class="col-form-label">Autor:</label>
                                <input type="text" class="form-control" name="autor" id="autor" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" name="fecha_creacion" id="fecha"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="tipo" class="col-form-label">Tipo:</label>
                                <select class="form-control" name="id_tipo_partitura" id="tipo">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="instrumento" class="col-form-label">Instrumento:</label>
                                <select class="form-control" name="id_instrumento" id="instrumento">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen" class="col-form-label">Imagen:</label>
                                <input type="file" class="form-control-file" name="img_partitura2" id="imagen"
                                    required>
                            </div>
                            <div class="form-group" style="display: none">{{-- //////////////////////////////IMAGEN BASE 64///////////////////// --}}
                                <label for="base64_imagen" class="col-form-label">Imagen en Base64:</label>
                                <input type="text" class="form-control" name="img_partitura" id="base64_imagen">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal Modificar -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Partitura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('modificar_partitura') }}" method="POST">
                            @csrf {{-- ////////////NO OLVIDAR PONER EL CSRF//////////// --}}
                            <div class="form-group" hidden>
                                <label for="id" class="col-form-label">Id:</label>
                                <input type="text" class="form-control" name="id_partitura" id="id_mod">
                            </div>
                            <div class="form-group">
                                <label for="titulo" class="col-form-label">Título:</label>
                                <input type="text" class="form-control" name="titulo_partitura" id="titulo_mod"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="autor" class="col-form-label">Autor:</label>
                                <input type="text" class="form-control" name="autor" id="autor_mod" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha" class="col-form-label">Fecha:</label>
                                <input type="date" class="form-control" name="fecha_creacion" id="fecha_mod"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="tipo" class="col-form-label">Tipo:</label>
                                <select class="form-control" name="id_tipo_partitura" id="tipo_mod">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="instrumento" class="col-form-label">Instrumento:</label>
                                <select class="form-control" name="id_instrumento" id="instrumento_mod">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen" class="col-form-label">Imagen:</label required>
                                <input type="file" class="form-control-file" name="img_partitura_mod2"
                                    id="imagenmod">
                            </div>
                            <div class="form-group" style="display: none">{{-- //////////////////////////////IMAGEN BASE 64///////////////////// --}}
                                <label for="base64_imagenmod" class="col-form-label">Imagen en Base64:</label>
                                <input type="text" class="form-control" name="img_partitura" id="base64_imagenmod">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- /////////////////////////////////////////////////////////SCRIPTS/////////////////////////////////////////////////////// --}}
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!--Datatable -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="text/javascript"></script>

        <!-- Incluir los archivos JS de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

        <script src="js/consulta_tipopart.js" type="text/javascript"></script>
        <script src="js/consulta_instrumentos.js" type="text/javascript"></script>

        <script>
            var esDirector = 0;
            if (<?php echo session('es_director'); ?> == 1) {
                esDirector = <?php echo session('es_director'); ?>;
            }
            console.log('A' + esDirector);
        </script>
        <script src="js/datatable.js" type="text/javascript"></script>
        <script src="js/validacion.js" type="text/javascript"></script>


        <script>
            // Obtener referencia al elemento de entrada de archivo
            const inputImagen = document.getElementById('imagen');

            // Escuchar el evento 'change' en el elemento de entrada de archivo
            inputImagen.addEventListener('change', () => {
                // Obtener el archivo seleccionado
                const file = inputImagen.files[0];

                // Crear un objeto FileReader
                const reader = new FileReader();

                // Escuchar el evento 'load' cuando se complete la lectura del archivo
                reader.addEventListener('load', () => {
                    // Obtener la imagen en base64
                    const base64Image = reader.result;

                    // Asignar el valor base64 a un campo oculto en el formulario
                    const base64Input = document.getElementById('base64_imagen');
                    base64Input.value = base64Image;
                });

                // Leer el contenido del archivo como URL de datos
                reader.readAsDataURL(file);
            });
        </script>

        <script>
            // Obtener referencia al elemento de entrada de archivo
            const inputImagen2 = document.getElementById('imagenmod');

            // Escuchar el evento 'change' en el elemento de entrada de archivo
            inputImagen2.addEventListener('change', () => {
                // Obtener el archivo seleccionado
                const file2 = inputImagen2.files[0];

                // Crear un objeto FileReader
                const reader2 = new FileReader();

                // Escuchar el evento 'load' cuando se complete la lectura del archivo
                reader2.addEventListener('load', () => {
                    // Obtener la imagen en base64
                    const base64Image2 = reader2.result;

                    // Asignar el valor base64 a un campo oculto en el formulario
                    const base64Input2 = document.getElementById('base64_imagenmod');
                    base64Input2.value = base64Image2;
                });

                // Leer el contenido del archivo como URL de datos
                reader2.readAsDataURL(file2);
            });
        </script>

        <script>
            ////////////////////////////////////////////////ELIMINAR/////////////////////////////////////////////////
            $(document).ready(function() {
                var idPartitura;

                // Evento click en el botón "Eliminar Partitura"
                $(document).on('click', '.btn-eliminar', function() {
                    idPartitura = $(this).data('id');
                    $('#id').val(idPartitura);
                    $('#modal-confirmacion').modal('show');
                });
            });
        </script>

        <script>
            // Create a lightbox
            (function() {
                var $lightbox = $("<div class='lightbox'></div>");
                var $img = $("<img>");
                var $caption = $("<p class='caption'></p>");

                // Add image and caption to lightbox

                $lightbox
                    .append($img)
                    .append($caption);

                // Add lighbox to document

                $('body').append($lightbox);

                $('.lightbox-gallery img').click(function(e) {
                    e.preventDefault();

                    // Get image link and description
                    var src = $(this).attr("data-image-hd");
                    var cap = $(this).attr("alt");

                    // Add data to lighbox

                    $img.attr('src', src);
                    $caption.text(cap);

                    // Show lightbox

                    $lightbox.fadeIn('fast');

                    $lightbox.click(function() {
                        $lightbox.fadeOut('fast');
                    });
                });

            }());
        </script>


    </body>
@endsection
