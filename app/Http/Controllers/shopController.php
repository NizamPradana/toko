<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        $barang = Barang::where('status_dipajang', 1)->orderByDesc('id')->paginate(9);
        return view('mainPage.shop', [
            'barang' => $barang,
        ]);
    }

    public function singleBarang($id)
    {
        $barang = Barang::find($id);
        if(!$barang){
            return abort(404);
        }
        return view('mainPage.single-barang', [
            'barang' => $barang,
        ]);
    }

}
