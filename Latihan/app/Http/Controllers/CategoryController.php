<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AllCategory()
    {
        $kategori = Category::all();
        return view('admin.category.index', compact('kategori'));
    }

    public function AllSampah()
    {
        $sampah = Category::onlyTrashed()->latest()->paginate(10);
        return view('admin.category.sampah', compact('sampah'));
    }


    public function TambahKategori(Request $request)
    {
        $validate = $request->validate(
            [
                'nama_category' => 'required',
                'penjelasan_category' => 'min:5',
            ],
            [
                'nama_category.required' => 'nama barang tidak boleh kosong',
                'penjelasan_category.min' => 'minimal 5 char',
            ]
        );

        Category::insert([
            'nama_category' => $request->nama_category,
            'id_barang' => $request->id_barang,
            'penjelasan_category' => $request->penjelasan_category,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('berhasil', 'kategori baru berhasil dibuat');
    }


    public function TampilKategoriUbah($id)
    {
        $kategori = Category::latest()->paginate(1);
        $kategori2 = category::find($id);
        return view('admin.category.index', compact('kategori2', 'kategori'));
    }


    public function UbahKategori(Request $request, $id)
    {
        $validate = $request->validate(
            [
                'nama_category' => 'required',
                'penjelasan_category' => 'min:5',
            ],
            [
                'nama_category.required' => 'nama barang tidak boleh kosong',
                'penjelasan_category.min' => 'minimal 5 char',
            ]
        );


        Category::find($id)->update([
            'nama_category' => $request->nama_category,
            'id_barang' => $request->id_barang,
            'penjelasan_category' => $request->penjelasan_category,
            'crated_at' => Carbon::now()
        ]);


        return redirect()->back()->with('berhasil', 'data telah berhasil diubah');
    }


    public function sampahKategori($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('sampah', 'berhasil dibuang');
    }


    public function pulihSampah($id)
    {
        Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with('pulih', 'berhasil dipulihkan');
    }

    public function HapusSampah($id)
    {
        Category::onlyTrashed()->find($id)->forcedelete();
        return redirect()->back()->with('hapus', 'berhasil diHapus');
    }
}
