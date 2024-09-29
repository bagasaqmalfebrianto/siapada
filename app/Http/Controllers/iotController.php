<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class iotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = User::all();
        return response()->json([
            'status'=>true,
            'message'=>'Data Ditemukan',
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = User::find($id);
        if($data){
        return response()->json([
            'status'=>true,
            'message'=>'Data Ditemukan',
            'data'=> $data
        ],200);
    }else{
        return response()->json([
            'status'=>False,
            'message'=>'Data Tidak Ditemukan',

        ]);
    }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $dataUser = User::find($id);
        if(empty($dataUser)){
            return response()->json([
                'status'=>False,
                'message'=>'Data Tidak Ditemukan',

            ],404);
        };

        $dataUser->saldo = $request->saldo;

        $post = $dataUser->save();

        return response()->json([
            'status'=>True,
            'message'=>'Transaksi Sukses',

        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
