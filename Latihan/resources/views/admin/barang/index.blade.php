@extends('admin.index')

@section('judul')
    Barang
@endsection



@section('content')
    {{-- container --}}
    <div class="container my-3">

        <div class="bg-light border-2">


            <div class="container p-3">

                <div class="row">
                    <div class="col">

                        @if (session('berhasil'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('berhasil') }}</strong>
                            </div>
                        @endif

                        @if (session('hapus'))
                            <div class="alert alert-warning" role="alert">
                                <strong>{{ session('hapus') }}</strong>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">

                        {{-- table barang --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Manipulation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allbarang as $barang)
                                    <tr>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->harga_barang }}</td>
                                        <td>
                                            <a href="{{ url('detail/barang/' . $barang->id) }}"
                                                class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ url('hapus/barang/' . $barang->id) }}"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <div class="mt-1">
                            <h5>Post Barang</h5>
                        </div>
                        {{-- form --}}
                        <form action="{{ route('TambahB') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                @csrf

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">

                                    <small class="text-danger">
                                        @error('nama_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="category_barang"
                                        placeholder="Category Barang" list="browsers" id="browser" autocomplete="off">

                                    <datalist id="browsers">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->nama_category }}"></option>
                                        @endforeach
                                    </datalist>

                                    <small class="text-danger">
                                        @error('category_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="number" class="form-control" name="harga_barang"
                                        placeholder="Harga Barang">

                                    <small class="text-danger">
                                        @error('harga_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="penjelasan_barang"
                                        placeholder="Penjelasan Barang">


                                    <small class="text-danger">
                                        @error('penjelasan_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="file" class="form-control" name="gambar_barang"
                                        placeholder="Gambar Barang">

                                    <small class="text-danger">
                                        @error('gambar_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>


                                <div class="mb-2">
                                    <button class="btn btn-sm btn-primary" type="submit">kirim</button>
                                </div>

                            </div>
                        </form>

                    </div>


                </div>
            </div>




        </div>



    </div>
    {{-- /.container --}}
@endsection
