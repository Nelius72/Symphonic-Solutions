<!DOCTYPE html>
<html lang="es">

<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>

<body>
    <div class="registro">
        <h2 class="active"> Registro <br> de <br> Usuario </h2>
        <form action="{{ route('registro') }}" method="POST" id="registroform">
            <div class="gh">
                @csrf
                <span>Nombre</span>
                <input type="text" class="text" name="nombre" id="nombre" required>
                <span>Apellidos</span>
                <input type="text" class="text" name="apellidos" id="apellidos" required>
                <span>Username</span>
                <input type="text" class="text" name="username" id="username" required>
                <span>Email</span>
                <input type="email" class="text" name="email" required>
                <span>Contraseña</span>
                <input type="password" class="text" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
                <span>Confirma Contraseña</span>
                <input type="password" class="text" id="password_confirmation" name="password_confirmation" required>
                <span id="password-error" class="error"></span>
                
                <div class="form-group">
                    <label for="es_director" class="col-form-label">Tipo de Usuario:</label>
                    <div>
                        <label>
                            <input type="radio" name="es_director" value="0" checked> Músico
                        </label>
                        <label>
                            <input type="radio" name="es_director" value="1"> Director
                        </label>
                    </div>
                </div>
            </div>
            <br><br>
            <button type="submit" class="signin">
                Registrarse
            </button>
            <a href="/login"><b>Volver al Login</b></a>
        </form>
    </div>

    <script>
        document.getElementById("registroform").addEventListener("submit", function(event) {
            var passwordInput = document.getElementById("password");
            var passwordConfirmationInput = document.getElementById("password_confirmation");
            var passwordError = document.getElementById("password-error");

            if (passwordInput.value.length < 8) {
                passwordError.innerText = "La contraseña debe tener al menos 8 caracteres.";
                event.preventDefault(); // Evita enviar el formulario si la contraseña no cumple con el mínimo.
            } else if (passwordInput.value !== passwordConfirmationInput.value) {
                passwordError.innerText = "La contraseña de confirmación no coincide.";
                event.preventDefault(); // Evita enviar el formulario si la contraseña de confirmación no coincide.
            } else {
                passwordError.innerText = ""; // Borra el mensaje de error si la contraseña y la confirmación de contraseña son válidas.
            }
        });
    </script>
   
</body>

</html>
