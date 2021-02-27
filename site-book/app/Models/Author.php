<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable=['title', 'slug'];

    public function catalogs(){

    return $this->belongsToMany(Catalog::class);

}

}
