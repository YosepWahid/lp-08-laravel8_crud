<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AllBarang()
    {
        $allbarang = barang::all();
        $category = Category::all();
        return view('admin.barang.index',  compact('allbarang', 'category'));
    }

    public function TambahBarang(Request $request)
    {
        $validate = $request->validate(
            [
                'nama_barang' => 'required',
                'category_barang' => 'required',
                'harga_barang' => 'required',
                'penjelasan_barang' => 'min:5',
                'gambar_barang' => 'mimes:png,jpg'
            ],
            [
                'nama_barang.required' => 'nama barang tidak boleh kosong',
                'category_barang.required' => 'category barang tidak boleh kosong',
                'harga_barang.required' => 'harga barang tidak boleh kosong',
                'penjelasan_barang.min' => 'Penjelasan barang minimal 4 char',
                'gamabar_barang.mimes' => 'gambar harus png/jpg',
            ]
        );

        // function insert gambar
        $gambar = $request->file('gambar_barang');

        $namaunik = hexdec(uniqid());
        $ext = strtolower($gambar->getClientOriginalExtension());

        $gambarBaru = $namaunik . '.' . $ext;

        $gambar->move('image/barang/', $gambarBaru);

        barang::insert([
            'nama_barang' => $request->nama_barang,
            'category_barang' => $request->category_barang,
            'harga_barang' => $request->harga_barang,
            'penjelasan_barang' => $request->penjelasan_barang,
            'gambar_barang' => $gambarBaru,
            'created_at' => Carbon::now()
        ]);


        return redirect()->back()->with('berhasil', 'berhasil dibuat');
    }


    public function DetailBarang($id)
    {
        $detailBarang = barang::find($id);
        return view('admin.barang.detail', compact('detailBarang'));
    }


    public function HapusBarang($id)
    {

        $gambarHapus = barang::find($id)->gambar_barang;

        $hapusgmbr = 'image/barang/' . $gambarHapus;

        if (file_exists($hapusgmbr)) {
            unlink($hapusgmbr);
        };

        $hapus = barang::find($id)->delete();
        return redirect()->back()->with('hapus', 'data berhasil dihapus');
    }

    public function UpdateBarang(Request $request, $id)
    {
        $validate = $request->validate(
            [
                'nama_barang' => 'required',
                'category_barang' => 'required',
                'harga_barang' => 'required',
                'penjelasan_barang' => 'min:5',
                'gambar_barang' => 'mimes:png,jpg'
            ],
            [
                'nama_barang.required' => 'nama barang tidak boleh kosong',
                'category_barang.required' => 'category barang tidak boleh kosong',
                'harga_barang.required' => 'harga barang tidak boleh kosong',
                'penjelasan_barang.min' => 'Penjelasan barang minimal 4 char',
                'gamabar_barang.mimes' => 'gambar harus png/jpg',
            ]
        );



        // function update image
        $gambarLama = $request->gambar_lama;
        $gambar = $request->file('gambar_barang');

        if ($gambar) {

            $namaunik = hexdec(uniqid());
            $ext = strtolower($gambar->getClientOriginalExtension());

            $gambarBaru = $namaunik . '.' . $ext;

            $gambar->move('image/barang/', $gambarBaru);

            unlink('image/barang/' . $gambarLama);

            barang::find($id)->update([
                'nama_barang' => $request->nama_barang,
                'category_barang' => $request->category_barang,
                'harga_barang' => $request->harga_barang,
                'penjelasan_barang' => $request->penjelasan_barang,
                'gambar_barang' => $gambarBaru,
                'created_at' => Carbon::now()
            ]);


            return redirect()->back()->with('berhasil', 'berhasil diupdate');
        } else {
            barang::find($id)->update([
                'nama_barang' => $request->nama_barang,
                'category_barang' => $request->category_barang,
                'harga_barang' => $request->harga_barang,
                'penjelasan_barang' => $request->penjelasan_barang,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('berhasil', 'berhasil diupdate');
        }
    }



    public function LogOut()
    {
        Auth::logout();
        return redirect()->route('Utama')->with('berhasil', 'berhasil logout');
    }
}
