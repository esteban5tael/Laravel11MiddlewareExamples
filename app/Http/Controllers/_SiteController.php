<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class _SiteController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function forbiden()
    {
        return view('modules.errors.403');
    }
}
