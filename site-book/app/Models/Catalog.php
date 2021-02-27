<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;


   protected $fillable=['title', 'slug','img','text'];

    public function authors(){

        return $this->belongsToMany(Author::class);

    }


    public function genres(){

        return $this->belongsToMany(Genre::class);

    }


}
