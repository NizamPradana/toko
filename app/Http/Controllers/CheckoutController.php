<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use App\Models\Pesanan;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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

        $orderItems = Cart::instance((auth()->user()->email))->content();
        $subtotal = Cart::subtotal(0, 1, '');

        if ($validated) {

            $response = $this->reqPayment($request);

            //if request payment is failed
            if (empty($response)) {
                return response()->json([
                    'msg' => 'Failed to request payment!',
                ]);
            }

            //create order
            $order = Pesanan::create([
                'user_id' => auth()->user()->id,
                'transaction_id_mt' => $response->transaction_id,
                'alamat' => $request->alamat,
                'subtotal' => $response->gross_amount,
                'status_pesanan' => 'created',
                'status_pembayaran' => $response->transaction_status,
                'qr_code_mt' => $response->actions[0]->url,
                'redirect_link' => $response->actions[1]->url,
                'url_check_status' => $response->actions[2]->url,
                'url_cancel_payment' => $response->actions[3]->url,
            ]);

            if ($order) {
                foreach ($orderItems as $item) {
                    order_items::create([
                        'pesanan_id' => $order->id,
                        'barang_id' => $item->id,
                        'kuantitas' => $item->qty,
                        'total_harga' => $item->subtotal(0, 1, ''),
                    ]);
                }
            }

            return redirect()->route('viewBayar', ['id' => $response->transaction_id]);
        } //if validated
    }


    // REQUEST PAYMENT TO MIDTRANS
    public function reqPayment($data)
    {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-quXkYZhi7nrIzVJrlCwvgsDj';

        $orderItems = Cart::instance((auth()->user()->email))->content();
        $subtotal = Cart::subtotal(0, 1, '');
        $item_detail = [];
        $orderId = date('dmY') . auth()->user()->id . rand(0, 100); //order id

        foreach ($orderItems as $item) {
            array_push($item_detail, [
                'id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'name' => $item->name,
            ]);
        }


        $params = [
            'payment_type' => 'gopay',
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $subtotal
            ],
            'item_details' => $item_detail,
            'customer_details' => [
                'first_name' => $data->nama,
                'phone' => $data->no_hp
            ],
            'shipping_address' => [
                'first_name' => $data->nama,
                'phone' => $data->no_hp,
                'address' => $data->alamat,
            ]
        ];

        $response = \Midtrans\CoreApi::charge($params);

        return $response;
    }

    public function viewPembayaran()
    {
        $transaction_id = $_GET['id'];

        $data = Pesanan::where('transaction_id_mt', $transaction_id)->get();

        if (empty($data)) {
            return response()->json([
                'msg' => 'Id not found',
                'status' => 404
            ], 404);
        }



        return view('mainPage.checkout.pembayaran', [
            'data' => $data[0]
        ]);
    }
}
