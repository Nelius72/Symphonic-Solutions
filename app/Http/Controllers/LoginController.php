<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Rules\RecaptchaRule;
class LoginController extends Controller
{
    public function show()
    {

        if (Auth::check()) {
            return redirect('/home');
        } //Verificamos si un usuario está auntenticado
        return view('auth.login');
    }

    
    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required'],
        'g-recaptcha-response' => ['required'],
    ]);

    // Intenta autenticar al usuario utilizando el nombre de usuario o el correo electrónico
    if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']]) || Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
        // Si el usuario está autenticado, guarda su ID en la sesión
        $request->session()->put('username', Auth::user()->username);
        $usuario = Usuario::where('username', $credentials['username'])->orWhere('email', $credentials['username'])->firstOrFail();

        if ($usuario->es_director == 1) {
            $request->session()->put('es_director', 1);
        } else {
            $request->session()->put('es_director', 0);
        }
        return redirect('/home');
    }
    // Si la autenticación falla, muestra un mensaje de error
    return back()->withErrors([
        'username' => 'El usuario/email y/o contraseña son incorrectos.',
    ]);
}


    
    public function authenticated(Request $request)
    {
        $user = Auth::user();

        if ($user->es_director == 1) {
            $request->session()->put('es_director', true);
        } else {
            $request->session()->forget('es_director');
        }

        $request->session()->put('id_usuario', Auth::id());

        return redirect('/home');
    }
}
