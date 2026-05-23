<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    public function signUp()
    {
        return view('sign-up');
    }
}
