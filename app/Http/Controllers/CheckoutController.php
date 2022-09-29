<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function index()
    {



        $orderItems = Cart::instance((auth()->user()->email))->content();





        return view('mainPage.checkout.checkout', [
            'orderItems' => $orderItems,
        ]);
    }

    // update alamat
    public function updateAlamat(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'id' => 'required'
        ]);

        if ($validated) {

            $order = Pesanan::create([
                'user_id' => auth()->user()->id,
                'alamat' => $request->alamat,
                'subtotal' => 0,
            ]);

            return redirect()->route('viewBayar');
        }
    }


    public function viewPembayaran()
    {
        return view('mainPage.checkout.pembayaran');
    }
}
