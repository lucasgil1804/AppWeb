<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	return view('Admin.index');
    }

    public function nuevoUsuario()
    {
    	return view('Admin.agregarUsuario');
    }
}
