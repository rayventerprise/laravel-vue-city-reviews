<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $cities = City::where('is_featured', true)->get([
            'name',
            'slug',
        ]);

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'cities' => $cities,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
