<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view('Inicio');
    }

    public function login()
    {
        return view('login');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function quienessomos()
    {
        return view('quienessomos');
    }

    public function reparacionPC()
    {
        return view('reparacionPC');
    }
}
