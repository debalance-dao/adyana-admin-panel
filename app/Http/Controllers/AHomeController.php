<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AHomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }
}
