<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
        $authors = EBook::all();
        return view('home', compact('authors'));
    }
}
