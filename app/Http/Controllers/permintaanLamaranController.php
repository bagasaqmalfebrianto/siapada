<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;

class permintaanLamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
  // Ambil ID pengguna yang sedang login
  $userId = auth()->id();

  // Ambil semua barang milik pengguna yang sedang login
  $barangs = Barang::where('user_id', $userId)->pluck('id'); // Mengambil hanya ID barang

  // Ambil cart berdasarkan ID barang yang dimiliki pengguna
  $carts = Cart::with(['barang', 'user'])->whereIn('barang_id', $barangs)->get();

  // Kirim data ke view
  return view('dashboard_admin.permintaan_lamaran.index', [
      'carts' => $carts,
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
           // Validasi status dan link WhatsApp yang diterima
    $request->validate([
        'status' => 'required|in:pending,approved,rejected',
        'whatsapp_link' => 'nullable|url', // Validasi link WhatsApp
    ]);

    // Temukan cart berdasarkan ID
    $cart = Cart::findOrFail($id);

    // Perbarui status cart
    $cart->status = $request->status;

    // Perbarui link WhatsApp jika ada
    if ($request->has('whatsapp_link')) {
        $cart->whatsapp_link = $request->whatsapp_link; // Pastikan Anda sudah menambahkan kolom whatsapp_link di migrasi Cart
    }

    $cart->save();

    return redirect()->back()->with('success', 'Status dan link WhatsApp berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
