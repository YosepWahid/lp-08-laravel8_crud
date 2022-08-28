<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function AllTransaksi()
    {
        $trans = Transaksi::all();
        return view('admin.transaksi.index', compact('trans'));
    }

    public function TambahTransaksi(Request $request)
    {
        $validate = $request->validate(
            [
                'nama_pembeli' => 'required',
                'nama_penerima' => 'required',
                'harga_barang' => 'required',
                'uang_terima' => 'required',
                'uang_kembali' => 'required'
            ]
        );


        Transaksi::insert([
            'nama_pembeli' => $request->nama_pembeli,
            'nama_penerima' => $request->nama_penerima,
            'harga_barang' => $request->harga_barang,
            'uang_terima' => $request->uang_terima,
            'uang_kembali' => $request->uang_kembali,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('berhasil', 'customer berhasil ditambahkan');
    }


    public function HapusTransaksi($id)
    {
        Transaksi::find($id)->delete();

        return redirect()->back()->with('sampah', 'data berhasil dihapus');
    }


    public function TampilUbah($id)
    {
        $trans = Transaksi::latest()->paginate(3);
        $trans2 = Transaksi::find($id);
        return view('admin.transaksi.index', compact('trans', 'trans2'));
    }


    public function UbahTransaksi(Request $request, $id)
    {

        $validate = $request->validate(
            [
                'nama_pembeli' => 'required',
                'nama_penerima' => 'required',
                'harga_barang' => 'required',
                'uang_terima' => 'required',
                'uang_kembali' => 'required'
            ]
        );


        Transaksi::find($id)->update([
            'nama_pembeli' => $request->nama_pembeli,
            'nama_penerima' => $request->nama_penerima,
            'harga_barang' => $request->harga_barang,
            'uang_terima' => $request->uang_terima,
            'uang_kembali' => $request->uang_kembali,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('berhasil', 'berhasil diubah');
    }
}
