<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\Genre;
use Illuminate\Http\Request;

class Catalog2Controller extends Controller
{

    public function index()
    {
        $catalogs = Catalog::paginate(3);
        return view('home', compact('catalogs'));


    }

    public function show($slug)
    {
        $catalog = Catalog::where('slug', $slug)->firstOrFail();

        return view('detail', compact('catalog'));

/*
        $catalog=Catalog::find($id);

        $genres = Genre::pluck ('title', 'id')->all();
        $authors = Author::pluck('title', 'id')->all();
        return view('admin.catalogs.edit', compact('genres', 'authors', 'catalog'));
*/


    }

}
