<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    //
    public function show(){

        if(Auth::check()){
            return redirect('/home');
        }
        return view ('auth.registro');
    }

    public function register(){ //////////////////////METODO PARA INSERTAR//////////////////////////////////
        $datos= request()->validate(
            [
            'nombre'=> 'required',
            'apellidos'=> 'required',
            'sexo'=> 'nullable',
            'username'=> 'required|unique:usuario,username',
            'email'=> 'required|unique:usuario,email',
            'password'=> 'required|min:8',  //Mínimo 8 caracteres
            'password_confirmation'=> 'required|same:password',
            'es_director'=> 'required',
        ]);

        $datos['password']= Hash::make($datos['password']); //Encriptamos password
        Usuario::create($datos);
        return redirect('/login')->with('success','Cuenta creada correctamente');
    }
}
