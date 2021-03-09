<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    protected $books;

    public function __construct(){
        $this->books = new Books();
    }

    public function storeBooks(Request $request){
        $storeBooks = $this->books->storeBooks($request);
        return back()->with([$storeBooks]);
    }

    public function deleteBooks($id){
        $deleteBooks = $this->books->deleteBooks($id);
        return back()->with([$deleteBooks]);
    }
}
