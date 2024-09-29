<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $total_price = 0;
    public function index()
    {
        if (!Auth::user()) {
            abort(403);
        }
        return view('pembeli.cart', [
            'title' => "Cart",
            'carts' => Cart::where('user_id', auth()->user()->id)->get(),
            'total_price' => $this->total_price,
            'user_id'=>User::all()
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
    public function store(Request $request, Cart $carts)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->transaction_status ='Dalam Proses';
        $order->total = $request->total_price;

        $order->save();

        // Menyimpan detail item pesanan
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->barang_id = $cart->barang_id;
            $orderItem->jumlah = $cart->jumlah;
            $orderItem->harga = $cart->barang->harga;
            // Hitung total harga untuk item pesanan ini jika diperlukan
            // $orderItem->total_harga = $cart->barang->harga * $cart->jumlah;
            $orderItem->save();
        }

        // Hapus item dari keranjang setelah berhasil membuat pesanan
        Cart::where('user_id', auth()->user()->id)->delete();

        return redirect('/pembeli/order')->with('success', 'Pesanan Anda telah berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
        Cart::destroy($cart->id);

        return redirect('/cart')->with('success','New post has been deleted');
    }
}

