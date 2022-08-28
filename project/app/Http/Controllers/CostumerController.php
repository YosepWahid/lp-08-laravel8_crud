<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CostumerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AllPembeli()
    {
        $pembelis = Customer::all();
        return view('admin.pembeli.index', compact('pembelis'));
    }

    public function TambahBeli(Request $request)
    {
        $validate = $request->validate(
            [
                'nama_customer' => 'required',
                'harga_barang' => 'required',
                'nama_barang' => 'required'
            ]
        );


        Customer::insert([
            'nama_customer' => $request->nama_customer,
            'harga_barang' => $request->harga_barang,
            'nama_barang' => $request->nama_barang,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('berhasil', 'customer berhasil ditambahkan');
    }


    public function HapusPembeli($id)
    {
        Customer::find($id)->delete();

        return redirect()->back()->with('sampah', 'data berhasil dihapus');
    }


    public function TampilUbah($id)
    {
        $pembelis = Customer::latest()->paginate(3);
        $barang2 = Customer::find($id);
        return view('admin.pembeli.index', compact('barang2', 'pembelis'));
    }


    public function UbahPembeli(Request $request, $id)
    {
        $validate = $request->validate(
            [
                'nama_customer' => 'required',
                'harga_barang' => 'required',
                'nama_barang' => 'required'
            ]
        );


        Customer::find($id)->update([
            'nama_customer' => $request->nama_customer,
            'harga_barang' => $request->harga_barang,
            'nama_barang' => $request->nama_barang,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('berhasil', 'customer berhasil diubah');
    }
}
