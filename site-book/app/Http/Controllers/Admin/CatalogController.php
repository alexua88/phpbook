<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $catalogs=Catalog::paginate(3);
        return view('admin.catalogs.index', compact('catalogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $genres = Genre::pluck ('title', 'id')->all();
        $authors = Author::pluck('title', 'id')->all();
        return view('admin.catalogs.create', compact('genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      //  Catalog::create($request->all());
      //  $request->session()->flash('success', 'Жанр добавлен');
        //  dd($request->all());

        $data=$request->all();


        if ($request->hasFile('img')){

            $folder =date('Y-m-d');
            $data['img'] =$request->file('img')->store("/uploads/images/{$folder}",'public');

        }

       // dd($data);

        $catalog =Catalog::create($data);
        $catalog->genres()->sync($request->genres);
        $catalog->authors()->sync($request->authors);


        return redirect()->route('catalogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
      $catalog=Catalog::find($id);

        $genres = Genre::pluck ('title', 'id')->all();
        $authors = Author::pluck('title', 'id')->all();
        return view('admin.catalogs.edit', compact('genres', 'authors', 'catalog'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {




        $catalog = Catalog::find($id);
        $data = $request->all();


        if ($request->hasFile('img'))
        {
            Storage::delete($catalog->img);
            $folder =date('Y-m-d');
            $data['img'] =$request->file('img')->store("/uploads/images/{$folder}",'public');

        }

    //    if ($file = Post::uploadImage($request, $catalog->img)) {
    //        $data['img'] = $file;
    //    }

        $catalog->update($data);


        $catalog->genres()->sync($request->genres);
        $catalog->authors()->sync($request->authors);


        return redirect()->route('catalogs.index')->with('success', 'Изменения сохранены');









    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {


        $catalog = Catalog::find($id);
        $catalog->genres()->sync([]);
        $catalog->authors()->sync([]);
        Storage::delete($catalog->img);
        $catalog->delete();


        return redirect()->route('catalogs.index')->with('success', 'Книга удалена');


    }





}
