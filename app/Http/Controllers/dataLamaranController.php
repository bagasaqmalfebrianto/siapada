<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class dataLamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          // Mengambil data barang beserta relasi user
          $data_lamaran = Barang::with('user')->get();
        
          return view('dashboard_admin2.data_lamaran.index', [
              'data_lamaran' => $data_lamaran,
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
