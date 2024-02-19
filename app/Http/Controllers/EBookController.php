<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use Illuminate\Http\Request;

class EBookController extends Controller
{
    public function getBook(Request $request, $id)
    {
        $book = EBook::where('id', $id)->first();
        return view('book-detail', compact('book'));
    }
}
