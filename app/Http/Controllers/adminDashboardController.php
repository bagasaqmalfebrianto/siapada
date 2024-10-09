<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class adminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dashboard_admin2.data_user.index',[
            'data_user'=>User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard_admin2.data_user.create');
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
            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);
        
            // Perbarui is_locked jika ada input untuk membuka akun
            if ($request->has('is_locked')) {
                $user->is_locked = $request->input('is_locked');
            }
        
            // Jika ada input reset_attempts, set login_attempts ke 0
            if ($request->has('reset_attempts') && $request->input('reset_attempts') === 'true') {
                $user->login_attempts = 0;
            }
        
            // Simpan perubahan
            $user->save();
        
            // Redirect dengan pesan sukses
            return redirect()->route('data_user.index')->with('success', 'Akun berhasil diperbarui.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('data_user.index')->with('success', 'Pengguna berhasil dihapus.');
}
}
