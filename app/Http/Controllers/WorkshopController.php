<?php

namespace App\Http\Controllers;

class WorkshopController extends Controller
{
    public function index()
    {
        $path = database_path('data/workshops.json');
        $workshops = json_decode(file_get_contents($path), true);

        $categories = collect($workshops)
            ->pluck('categories')
            ->flatten()
            ->unique()
            ->values()
            ->all();

        return view('workshops.index', [
            'workshops' => $workshops,
            'categories' => $categories,
        ]);
    }
}
