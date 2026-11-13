<?php

use App\Http\Controllers\WorkshopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $css = asset('css/workshops.css');
    $url = url('/workshops');

    return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshops</title>
    <link rel="stylesheet" href="{$css}">
</head>
<body class="workshop-list-page">
    <main class="workshop-list-home">
        <a class="workshop-list-home__button" href="{$url}">Go to workshops</a>
    </main>
</body>
</html>
HTML;
});

Route::get('/workshops', [WorkshopController::class, 'index']);
