<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPerPage = 2;
        $data = Produk::orderBy('id')->simplePaginate($dataPerPage);
        $no = 1;
        $total = Produk::all()->count();
        return view('index', compact('data', 'no', 'total', 'dataPerPage'));
        // ->with(i,);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required', 'unique:produks,nama_produk'],
            'harga' => ['required', 'integer'],
            'jumlah' => ['required', 'integer'],
            'keterangan' => ['required'],
        ]);
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('produk.index')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('update', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => ['required', ($request->nama_produk == $produk->nama_produk) ? '' :  'unique:produks,nama_produk'],
            'harga' => ['required', 'integer'],
            'jumlah' => ['required', 'integer'],
            'keterangan' => ['required'],
        ]);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('produk.index')->with('success', 'Produk ' . $request->nama_produk . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk ' . $produk->nama_produk . ' berhasil dihapus!');
    }
}
