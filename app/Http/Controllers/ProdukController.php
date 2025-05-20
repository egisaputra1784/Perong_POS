<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('produk.index', compact('kategori'));
    }

    public function data()
    {
        $produk = Produk::orderBy('id_produk', 'desc')->get();

        return dataTables()
            ->of($produk)
            ->addIndexColumn()
            ->addColumn('aksi', function ($produk) {
                return '
                    <div class="btn-group">
                        <button onclick="editForm(`' . route('produk.update', $produk->id_produk) . '`)" class="btn xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                        <button onclick="deleteData(`' . route('produk.destroy', $produk->id_produk) . '`)" class="btn xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                    </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
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

        $produk = Produk::latest()->first();
        $request['kode_produk'] = 'P-'. tambah_nol_didepan($produk->id, 6);
        $produk = Produk::create($request->all());


        return response()->json('Data berhasil Ditambahkan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);

        return response()->json($produk);
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
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->update();

        return response()->json('Data berhasil Update', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return response(null, 204);
    }
}
