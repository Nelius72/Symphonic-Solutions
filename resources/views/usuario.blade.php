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

        <title>Usuario</title>
    </head>

    <body style="background-color:  #e2e7eb">
        <div class="tabla" style="background-color: white">
            <h2 class="text-center" style="text-decoration: underline">Usuarios del Sistema</h2>
            <table id="tabla-usuarios" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th hidden>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Tipo Usuario</th>
                        @if (session('es_director') == 1)
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>

                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td hidden>{{ $usuario->id_usuario }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellidos }}</td>
                            <td>{{ $usuario->username }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if ($usuario->es_director == 0)
                                    Músico
                                @else
                                    Director
                                @endif

                            </td>
                            @if (session('es_director') == 1)
                                <td> <button class="btn btn-warning editar-usuario btn-modificar " data-toggle="modal"
                                        data-target="#myModalMod">
                                        <i class="fas fa-user-edit"></i>
                                        Modificar
                                    </button>
                                    <button class="btn btn-danger btn-eliminar">
                                        <i class="fas fa-user-times"></i> Eliminar</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       


        <!-- Modal Modificar -->
        <div class="modal fade" id="myModalMod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="{{ route('modificar_usuario') }}" method="POST"> {{-- ////////////NAMES SIEMPRE COMO EN LA BD//////////// --}}
                            @csrf {{-- ////////////NO OLVIDAR PONER EL CSRF//////////// --}}
                            <div class="form-group" hidden>
                                <label for="id" class="col-form-label">Id:</label>
                                <input type="text" class="form-control" name="id_usuario" id="id">
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre_mod" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos" class="col-form-label">Apellidos:</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos_mod" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username:</label>
                                <input type="text" class="form-control" name="username" id="username_mod" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="text" class="form-control" name="email" id="email_mod" required>
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

        <!-- Modal de confirmación eliminar -->
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
                        <p>¿Estás seguro de que deseas eliminar este Usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('eliminar_usuario') }}" method="POST">
                            @csrf

                            <div class="form-group" hidden>
                                <label for="id" class="col-form-label">Id:</label>
                                <input type="text" class="form-control" name="id_usuario" id="id_usuario_eliminar">
                            </div>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <!-- Incluir los archivos JS de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>
        <script src="js/usuario.js" type="text/javascript"></script>


    </body>
@endsection
