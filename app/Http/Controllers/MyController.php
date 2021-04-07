<?php

namespace App\Http\Controllers;

use App\Mail\SendConsult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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

    public function enviarConsulta(Request $request)
    {
        $consulta = $request->only(['name','email','subject','message']);

        $receivers = ['juancruzf017@gmail.com','lucasgil.1804@gmail.com'];
        Mail::to($receivers)->send(new SendConsult($consulta));

        Session::flash('form_enviado', 'Su consula ha sido enviada correctamente.');
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

    public function feedback()
    {
        return view('feedback');
    }

    public function reparacionNotebook()
    {
        return view('reparacionNotebook');
    }

    public function estadoEquipo()
    {
        return view('estadoEquipo');
    }

    //  public function pruebaForm()
    // {
    //     return view('Admin.pruebaform');
    // }

}
