<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Cart::instance(auth()->user()->email)->content();


        return view('mainPage.keranjang', [
            'title' => 'Keranjang',
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'barang_id' => 'required',
            'kuantitas' => 'required',
            'harga' => 'required',
            'nama_barang' => 'required',
            'email' => 'required',
        ]);

        $add = Cart::instance($validated['email'])->add($validated['barang_id'], $validated['nama_barang'], $validated['kuantitas'], $validated['harga']);


        if($add)
        {
            return redirect()->route('keranjang.index')->with(['success' => 'Berhasil Menambahkan Barang ke Keranjang!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cart::instance(auth()->user()->email)->update($id, $request->kuantitas);

        return redirect()->route('keranjang.index')->with(['success' => 'Berhasil Mengedit QTY Barang dari Keranjang!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        // Cart::destroy($id);

        return redirect()->route('keranjang.index')->with(['success' => 'Berhasil Menghapus Barang dari Keranjang!']);

    }

    // public function hapusSemua(Request $request)
    // {
        
    // }

}
