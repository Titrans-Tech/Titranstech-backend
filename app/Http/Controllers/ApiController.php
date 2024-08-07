<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiController extends Controller
{

    public function index()
    {
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            return strpos($route->uri(), 'api/') === 0;
        })->map(function ($route) {
            return [
                'uri' => $route->uri(),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
                'method' => implode('|', $route->methods()),
            ];
        });

        return response()->json($routes);
    }
}