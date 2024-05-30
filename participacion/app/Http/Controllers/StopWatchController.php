<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StopWatchController extends Controller
{
    public function index()
    {
        return view('stopwatch.index');
    }
}

