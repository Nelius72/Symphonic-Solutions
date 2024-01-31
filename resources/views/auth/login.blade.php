<!DOCTYPE html>
<html lang="es">

<head>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="login">
        <h2 class="active"> Symphonic Solutions </h2>
        <form action="/login" id="loginform" method="post">
            @csrf {{-- Para evitar problemas de seguridad --}}
            <input type="text" class="text @error('username') is-invalid @enderror" name="username"
                placeholder="Usuario" required>
            <span>Username/Email</span>
            <br>
            <br>
            <input type="password" class="text" name="password" placeholder="Contraseña" required>
            <span>Password</span>
            <br>
            <div class="captcha">
                <div class="g-recaptcha" data-sitekey="6LcV35cmAAAAADL3ZGu23M0paFrZaIQukeotUhtn">
                </div>
            </div>

            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @error('g-recaptcha-response')
                <div class="invalid-feedback">Por favor rellena el reCaptcha</div>
            @enderror
            <br>
            <button type="submit" class="signin">
                Entrar
            </button>


            <hr>

            <a href="">Has olvidado tu contraseña?</a>
            <br>
            <a href="/registro">Aún no tienes cuenta? Regístrate</a>
        </form>
    </div>
</body>

</html>
