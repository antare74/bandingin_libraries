<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Libraries;
use Illuminate\Http\Request;

class LibrariesController extends Controller
{
    protected $libraries;

    public function __construct(){
        $this->libraries = new Libraries();
    }

    public function storeLibraries(Request $request){
        $storeLibraries = $this->libraries->storeLibraries($request);
        return back()->with([$storeLibraries]);
    }

    public function deleteLibraries($id){
        $deleteLibraries = $this->libraries->deleteLibraries($id);
        return back()->with([$deleteLibraries]);
    }
}
