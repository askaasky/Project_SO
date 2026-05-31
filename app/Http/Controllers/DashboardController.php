<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Auth::user()->items()->latest()->get();
        return view('dashboard', compact('items'));
    }
}
