<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{


    public function index()
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-quXkYZhi7nrIzVJrlCwvgsDj';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $orderItems = Cart::instance((auth()->user()->email))->content();
        $subtotal = Cart::subtotal(0, 1, '');
        // return $subtotal;

        $item_detail = [];

        foreach ($orderItems as $item) {
            array_push($item_detail, [
                'id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'name' => $item->name,
            ]);
        }

        // return $item_detail;

        $orderId = date('dmY') . auth()->user()->id . rand(0, 100); //order id

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => $subtotal
            ),

            'item_details' => $item_detail,

            'customer_details' => array(
                'first_name' => auth()->user()->nama,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->no_telp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // return $params;




        return view('mainPage.checkout.checkout', [
            'orderItems' => $orderItems,
            'snap_token' => $snapToken,
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
