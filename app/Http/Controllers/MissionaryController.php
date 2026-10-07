<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MissionaryController extends Controller
{
    //
    public function index()
    {
        return 'funcionou';
    }

    public function show($missionary)
    {
        return 'Mostrando missionário com ID: ' . $missionary;
    }
}
