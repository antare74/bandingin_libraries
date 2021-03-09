<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    use HasFactory;
    protected $table = 'libraries';
    protected $guarded = [];
    public function books(){
        return $this->belongsToMany('App\Models\Books','libraries_books');
    }
}
