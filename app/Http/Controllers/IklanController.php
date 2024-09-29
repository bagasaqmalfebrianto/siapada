<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class IklanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard.iklan.index',[
            'iklan'=>Iklan::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.iklan.create',[
            'categories'=>Iklan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'image'=>'image|file|max:5024',
        ]);

        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('iklan-images');
        }

        Iklan::create($validatedData);

        return redirect('/dashboard/iklan')->with('success','New post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Iklan $iklan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iklan $iklan)
    {
        //
        // return view('dashboard.iklan.edit',[
        //     'iklan'=>$iklan
        // ]);
            dd($iklan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iklan $iklan)
    {
        //

        $rules = [
            'nama'=>'required|max:255',
            'image'=>'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);


        if($request->file('image')){
            // kalo gambar lama ada maka dihapus
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image']=$request->file('image')->store('iklan-images');
        }

        Iklan::where('id', $iklan->id)
                    ->update($validatedData);

        return redirect('/dashboard/iklan')->with('success','New post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iklan $iklan)
    {
        //
        Iklan::destroy($iklan->id);

        return redirect('/dashboard/iklan')->with('success','New post has been deleted');
    }
}
