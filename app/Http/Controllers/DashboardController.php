<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        return 'test';
        return view('admin.home.home');

    }
}
