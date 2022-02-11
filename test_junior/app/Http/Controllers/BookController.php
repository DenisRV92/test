<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
//        $author = Author::find(2);
////        dd($author->books);
        return view('books', compact('books'));
    }
}
//'label' => 'name author',
//            'type' => 'select2_multiple',
//            'name' => 'authors',
//            'entity' => 'authors',
//            'attribute' => 'name',
//            'pivot' => true,
//
//            'model' => 'App\Models\Author',
