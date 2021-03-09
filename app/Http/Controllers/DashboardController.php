<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Books;
use App\Http\Repositories\Libraries;

class DashboardController extends Controller
{
    protected $libraries, $books;
    public function __construct(){
        $this->libraries = new Libraries();
        $this->books     = new Books();
    }

    public function index(){
        return view('dashboard', [
            'books'     => $this->books->getAllBooks(),
            'libraries' => $this->libraries->getLibraries()
        ]);
    }

    public function welcome(){
        return view('welcome',[
            'libraries' => $this->libraries->getLibraries()
        ]);
    }
}
