<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $value = Cache::remember('users', now()->addHour(), function () {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => 'Tallinn',
                'appid' => config('services.weather.key'),
                'units' => 'metric',
            ]);
            return $response->json();
        });
        return Inertia::render('Dashboard',[
            'weather' => $value,
        ]);
    }
}
