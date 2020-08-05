<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    function showDashboard(){
        return view('dashboard');
    }
}
