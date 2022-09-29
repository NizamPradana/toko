<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function alamat()
    {
        return view('mainPage.checkout.alamat');
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
            User::where('id', $request->id)->update(['nama' => $request->nama, 'no_telp' => $request->no_telp, 'alamat' => $request->alamat]);

            

        }
    }


    public function viewPembayaran()
    {
        return view('mainPage.checkout.pembayaran');
    }
}
