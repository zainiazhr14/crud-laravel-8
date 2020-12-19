<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    //
    public function index()
    {
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $jumlah_buku = Buku::count();
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.index', compact('data_buku','no', 'jumlah_buku'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'halaman' => 'required|integer'
        ]);
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->halaman = $request->halaman;
        $buku->save();

        return redirect('/buku')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('buku.edit', compact('buku'));
    }
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'halaman' => 'required|integer'
        ]);
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->halaman = $request->halaman;
        $buku->update();

        return redirect('/buku')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {   
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data Berhasil Dihapus');
    }
    public function cari(Request $request)
    {
        $batas = 5;
        $cari = $request->cari;
        $data_buku = Buku::where('judul', 'like', '%'.$cari.'%')
                    ->paginate($batas);
        $jumlah_buku = Buku::count();
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.hasil-cari', compact('data_buku','no', 'jumlah_buku', 'cari'));
    }
}
