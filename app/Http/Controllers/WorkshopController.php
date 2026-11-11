<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $path = database_path('data/workshops.json');
        $workshops = json_decode(file_get_contents($path), true);

        return view('workshops.index', ['workshops' => $workshops]);
    }
}
