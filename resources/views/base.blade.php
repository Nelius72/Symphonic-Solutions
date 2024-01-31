<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Engagement&display=swap');
      </style>
    <link rel="stylesheet" href="{{ asset('css/prueba.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    {{-- <title>Posible HOME</title> --}}
</head>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <div class="reloj">
                <img src="{{ asset('img/reloj.png') }}">
                <span id="clock"></span>
            </div>
            <div class="header_img">
                <img src="{{ asset('img/cbimage.png') }}">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="/home" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                            class="nav_logo-name">Menú</span> </a>
                    <div class="nav_list">
                        <a href="/usuario" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span
                                class="nav_name">Usuario</span> </a>
                        <a href="/calendario" class="nav_link active"> <i class='bx bx-calendar nav_icon'></i> <span
                                class="nav_name">Eventos/Calendario</span> </a>
                        <a href="/archivo" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                                class="nav_name">Archivo</span> </a>
                        <a href="/contacto" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span
                                class="nav_name">Contacto</span></a>
                        <a href="/asistencia" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                                class="nav_name">Asistencias</span> </a>
                        <a href="/evaluacion" class="nav_link" style="pointer-events: none;"> <i class='bx bx-trophy nav_icon' ></i> <span
                                class="nav_name">Evaluación</span> </a>
                        <a href="/presupuesto" class="nav_link" style="pointer-events: none;"> <i class='bx bx-clipboard nav_icon'></i> <span
                                class="nav_name">Presupuestos</span> </a>


                    </div>
                </div> <a href="/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">Cerrar Sesión</span> </a>
            </nav>
        </div>
        <div class="titulo">
            <br>
            <p>Symphonic Solutions</p>

            <div class="newtons-cradle">
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
                <div class="newtons-cradle__dot"></div>
            </div>
        </div>


        <!--Container Main start-->
        <div>
            {{-- <h4>Main Components</h4>
            <p>Symphonic Solutions</p> --}}
        </div>
        <!--Container Main end-->
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {

                const showNavbar = (toggleId, navId, bodyId, headerId) => {
                    const toggle = document.getElementById(toggleId),
                        nav = document.getElementById(navId),
                        bodypd = document.getElementById(bodyId),
                        headerpd = document.getElementById(headerId)

                    // Validate that all variables exist
                    if (toggle && nav && bodypd && headerpd) {
                        toggle.addEventListener('click', () => {
                            // show navbar
                            nav.classList.toggle('show')
                            // change icon
                            toggle.classList.toggle('bx-x')
                            // add padding to body
                            bodypd.classList.toggle('body-pd')
                            // add padding to header
                            headerpd.classList.toggle('body-pd')
                        })
                    }
                }

                showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

                /*===== LINK ACTIVE =====*/
                const linkColor = document.querySelectorAll('.nav_link')

                function colorLink() {
                    if (linkColor) {
                        linkColor.forEach(l => l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l => l.addEventListener('click', colorLink))

                // Your code to run since DOM is loaded and ready
            });
        </script>
        <script>
            function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();
                var timeString = hours + ':' + minutes + ':' + seconds;
                document.getElementById('clock').textContent = timeString;
                setTimeout(updateClock, 1000); // Actualiza el reloj cada segundo
            }
        
            updateClock(); // Inicia la actualización del reloj
        </script>
    </body>
    @yield('base') {{-- /////////////////CEDEMOS EL CONTENIDO PARA OTRAS PAGINAS --}}

</html>
