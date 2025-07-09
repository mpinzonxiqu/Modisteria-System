<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelPrincipalController extends Controller
{
    public function showPanel()
    {
        return view('user.panel');
    }
}
