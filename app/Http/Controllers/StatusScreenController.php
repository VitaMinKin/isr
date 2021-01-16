<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusScreenController extends Controller
{
    public function show()
    {
        return view("index");
    } 
}
