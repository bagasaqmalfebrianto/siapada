<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('dashboard.berita.index',[
            'berita'=>Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('dashboard.berita.create',[
            'berita'=>Berita::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:beritas',
            'image'=>'image|file|max:5024',
            'body'=>'required'
        ]);
        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('berita-images');
        }

        Berita::create($validatedData);

        return redirect('/dashboard/berita')->with('success','New post has been added');

    }


    /**
     * Display the specified resource.
     */
    public function show(Berita $beritum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        //
        return view('dashboard.berita.edit',[
            'berita'=>$beritum
        ]);
        // dd($beritum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        //
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:beritas',
            'image'=>'image|file|max:1024',
            'body'=>'required'
        ]);

        if($request->slug != $beritum->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            // kalo gambar lama ada maka dihapus
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('berita-images');
        }

        Berita::where('id', $beritum->id)
                    ->update($validatedData);

        return redirect('/dashboard/berita')->with('success','New post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        //
    }


}
