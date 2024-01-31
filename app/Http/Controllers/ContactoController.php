<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){
      
       

        return view ('contacto');
        
    }
   
}