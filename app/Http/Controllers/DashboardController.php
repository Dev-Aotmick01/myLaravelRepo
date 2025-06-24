<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request): array|string|null
    {
        return view('page/dashboard');
        return $request->query("id");
    }


    public function show(): array|string|null
    {
        return view('page/dashboard');
        return view("welcome");
    }
}
