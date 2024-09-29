<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dataPenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data_user = User::where('is_penjual', 1)->get();

    return view('dashboard.tambah_penjual.index', [
        'data_user' => $data_user
        
    ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.tambah_penjual.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'username'=>['required','min:3','max:255','unique:users'],
            'no_telp'=>'required',
            'alamat'=>'required|max:255',
            'image'=>'image|file|max:5024',
            'password'=>'required|min:5|max:255',
            'is_penjual'=>"required"
        ]);

        if($request->file('image')){
            $validatedData['image']=$request->file('image')->store('user-images');
        }

        User::create($validatedData);

        return redirect('/dashboard/tambah_penjual')->with('success','New post has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
