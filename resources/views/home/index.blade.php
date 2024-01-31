@extends('base')

@section('base')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        {{-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'> --}}
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
        <title>Home</title>
    </head>

    <body style="background-color:  #e2e7eb">
       
        <div class="bienvenida" style="background-color:  #e2e7eb">
            <div class="mb-5"><h1 ><strong>"Convierte el Caos en Armonía"</strong></h1></div>
            <div class="contenedor1">
                <h2>¡Bienvenido/a a Symphonic Solutions!</h2>
                <div class="presentacion" style="background-color:  white">
                    <p style="font-size: 16px;"> <br><br> Nos complace presentarte nuestra aplicación web que está diseñada
                        específicamente para grupos y asociaciones musicales, como bandas de música, orquestas y escuelas de
                        música.
                        <br><br>
                        En Symphonic Solutions, podrás gestionar y planificar todos los aspectos relacionados con tu grupo
                        musical.
                        Desde la planificación de eventos, ensayos y conciertos, hasta la gestión del presupuesto y la
                        biblioteca
                        musical, nuestra aplicación te brindará las herramientas necesarias para llevar a cabo tus tareas
                        con éxito.
                        <br><br>
                        Además, para los profesores y directores de orquesta, nuestra aplicación cuenta con una función de
                        evaluación y seguimiento del progreso, que te permitirá llevar un registro de las calificaciones,
                        asistencias y logros de tus estudiantes.
                        <br><br>
                        En definitiva, Symphonic Solutions es la solución ideal para gestionar todos los aspectos de tu
                        grupo
                        musical en un solo lugar. Esperamos que disfrutes de la aplicación y te ayudemos a llevar la música
                        a nuevas
                        alturas.
                        <br><br>

                    </p>
                </div>
            </div>
        </div>
        <div class="contenedor2">
            <div class="comunidad" style="background-color:  #e2e7eb">
                <h2>¡Bienvenido/a a nuestra comunidad!</h2>
            </div>
            <section class="hero-section">
                <br><br><br>
                <div class="card-grid">

                    <a class="card" href="/usuario">
                        <div class="card__background"
                            style="background-image: url(https://www.bizneo.com/blog/wp-content/uploads/2020/03/ejemplo-gestion-recursos-humanos-810x455.webp)">
                        </div>
                        <div class="card__content">
                            <p class="card__category">Usuarios</p>
                            <h3 class="card__heading">Administración de Usuarios</h3>
                        </div>
                    </a>
                    <a class="card" href="/archivo">
                        <div class="card__background"
                            style="background-image: url(https://images.pexels.com/photos/164873/pexels-photo-164873.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500)">
                        </div>
                        <div class="card__content">
                            <p class="card__category">Archivo</p>
                            <h3 class="card__heading">Gestiona tus Partituras</h3>
                        </div>
                    </a>
                    <a class="card" href="/calendario">
                        <div class="card__background"
                            style="background-image: url(https://e0.pxfuel.com/wallpapers/1000/1010/desktop-wallpaper-of-agenda-book-calendar-daily-daily-planner-from.jpg)">
                        </div>
                        <div class="card__content">
                            <p class="card__category">Eventos</p>
                            <h3 class="card__heading">Calendario de Eventos</h3>
                        </div>
                    </a>
                    <a class="card" href="/contacto">
                        <div class="card__background"
                            style="background-image: url(https://img.freepik.com/premium-photo/contact-us-hand-businessman-holding-mobile-smartphone-with-mail-phone-email-icon_52701-38.jpg)">
                        </div>
                        <div class="card__content">
                            <p class="card__category">Contacto</p>
                            <h3 class="card__heading">Esperamos tus Sugerencias</h3>
                        </div>
                    </a>
                    <a class="card" href="/asistencia">
                        <div class="card__background"
                            style="background-image: url(https://www.nueva-iso-9001-2015.com/wp-content/uploads/2019/06/Checklist.jpg)">
                        </div>
                        <div class="card__content">
                            <p class="card__category">Futura Mejora</p>
                            <h3 class="card__heading">Control de Asistencia</h3>
                        </div>
                    <a class="card" href="/evaluacion">
                            <div class="card__background"
                                style="background-image: url(https://hslda.org/images/librariesprovider2/images/lp/testing-and-evaluation-istock-495639272-compressor.jpg?sfvrsn=d82ef5d1_2)">
                            </div>
                            <div class="card__content">
                            <p class="card__category">Futura Mejora</p>
                            <h3 class="card__heading">Evaluaciones</h3>
                        </div>
                        <a class="card" href="/presupuesto">
                            <div class="card__background"
                                style="background-image: url(https://humanidades.com/wp-content/uploads/2018/10/presupuesto-1-e1581473862542-800x400.jpg)">
                            </div>
                            <div class="card__content">
                                <p class="card__category">Futura Mejora</p>
                                <h3 class="card__heading">Gestión Presupuestaria</h3>
                        </div>
                    </a>
                <div>
            </section>
        </div>
    </body>
@endsection
