<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {

        $usuarios = Usuario::all();
        return view('usuario')->with('usuarios', $usuarios);
    }

    // public function modificar(Request $request)
    // {
    //     $id = $request->input('id_usuario');
    //     // dd($id);     
    //     $seleccionada = Usuario::where('id_usuario', $id)->firstorFail();

    //     $seleccionada->nombre = $request->input('nombre');
    //     $seleccionada->apellidos = $request->input('apellidos');
    //     $seleccionada->username = $request->input('username');
    //     $seleccionada->email = $request->input('email');
       

    //     $seleccionada->save();
    //     $usuarios = Usuario::all();
    //     return redirect('/usuario')
    //     ->with('success', 'Usuario Modificado Correctamente')
    //     ->with('usuarios', $usuarios);
    // }

    public function modificar(Request $request)
{
    $id = $request->input('id_usuario');
    $seleccionada = Usuario::where('id_usuario', $id)->firstOrFail();

    $seleccionada->nombre = $request->input('nombre');
    $seleccionada->apellidos = $request->input('apellidos');
    $seleccionada->username = $request->input('username');
    $seleccionada->email = $request->input('email');

    // Validar si el nuevo username o email ya existen
    $existingUser = Usuario::where(function ($query) use ($seleccionada) {
        $query->where('username', $seleccionada->username)
            ->orWhere('email', $seleccionada->email);
    })->whereNotIn('id_usuario', [$seleccionada->id_usuario])->first();

    if ($existingUser) {
        $usuarios = Usuario::all();
        return redirect('/usuario')
        ->withErrors([
            'username' => 'El nombre de usuario ya está en uso.',
            'email' => 'El correo electrónico ya está en uso.'
        ])
            ->with('usuarios', $usuarios);
    }

    $seleccionada->save();
    $usuarios = Usuario::all();

    return redirect('/usuario')
        ->with('success', 'Usuario modificado correctamente')
        ->with('usuarios', $usuarios);
}


    public function eliminar(Request $request)
    {
        $id = $request->input('id_usuario');
        // dd($id);
        $usuario = Usuario::where('id_usuario',$id)->firstorFail();
        
        if (!$usuario) {
            return redirect('/usuario')->with('error', 'Usuario no encontrado');
        }

        $usuario->delete();

        return redirect('/usuario')->with('success', 'Usuario eliminado correctamente');
    }
}
