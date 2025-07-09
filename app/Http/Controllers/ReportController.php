<?php


// app/Http/Controllers/UserReporteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserReporteController extends Controller
{ 
    public function showReportes()
    {
        // Obtenemos el usuario autenticado
        $user = auth()->user();

        // Obtenemos los reportes asignados al usuario
        $reportes = $user->reportes;

        // Retornamos la vista con los reportes
        return view('user.reportes', compact('reportes'));
    }
}


