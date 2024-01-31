<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function show(){
       
        return view ('base');
        
    }
    public function prueba(){
       
        
        return redirect()->to('/base');
    }
}