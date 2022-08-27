<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return view('dashboard.barang.index',[
            'title' => 'Barang',
            'barang' => $barang
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
            'nama_barang' => 'required',
            'merek' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required',
            'harga_satuan' => 'required',
        ]);

        $store = Barang::create($validated);

        if(!$store)
        {
            return back()->with(['error' => 'failed to add new Barang']);
        }
        return back()->with(['success' => 'Berhasil Menambahkan Barang Baru!']);
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $update = Barang::where('id' , $request->id)->update(['status_dipajang' => $request->status_dipajang]);
        
        if(!$update) return back()->with(['error' => 'Gagal mengganti status dipajang!']);

        return redirect()->to(route('barang.index'))->with(['success' => 'Berhasil mengubah status diapajang']);

    }
}
