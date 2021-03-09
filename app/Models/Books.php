<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $guarded = [];
    public function libraries(){
        return $this->belongsToMany('App\Models\Libraries','libraries_books');
    }
}
