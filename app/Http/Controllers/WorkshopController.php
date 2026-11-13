<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $lang = $request->query('lang', 'th');
        app()->setLocale(in_array($lang, ['th', 'en'], true) ? $lang : 'th');

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
