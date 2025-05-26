<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $name = 'John Doe';
        return view('welcome',compact('name'));
    }

    public function about()
    {
        return view('about');
    }
}
