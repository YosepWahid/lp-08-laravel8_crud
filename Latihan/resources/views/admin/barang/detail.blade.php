@extends('admin.index')


@section('judul')
    Detail Barang
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

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('image/barang/' . $detailBarang->gambar_barang) }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $detailBarang->nama_barang }}</h4>

                                <p class="card-text">
                                    {{ $detailBarang->penjelasan_barang }}
                                </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Harga : {{ $detailBarang->harga_barang }}</li>
                                <li class="list-group-item">Kategori : {{ $detailBarang->category_barang }}</li>
                            </ul>
                        </div>

                    </div>


                    <div class="col-md-8">
                        <div class="mt-1">
                            <h5>Update Barang</h5>
                        </div>
                        {{-- form --}}
                        <form action="{{ url('/ubah/barang/' . $detailBarang->id) }}" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">

                                @csrf

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"
                                        value="{{ $detailBarang->nama_barang }}">

                                    <small class="text-danger">
                                        @error('nama_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="category_barang"
                                        placeholder="Category Barang" value="{{ $detailBarang->category_barang }}">

                                    <small class="  text-danger">
                                        @error('category_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="number" class="form-control" name="harga_barang"
                                        placeholder="Harga Barang" value="{{ $detailBarang->harga_barang }}">

                                    <small class="text-danger">
                                        @error('harga_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="penjelasan_barang"
                                        placeholder="Penjelasan Barang" value="{{ $detailBarang->penjelasan_barang }}">


                                    <small class="text-danger">
                                        @error('penjelasan_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="file" class="form-control" name="gambar_barang"
                                        placeholder="Gambar Barang">


                                    <input type="hidden" class="form-control" name="gambar_lama"
                                        value="{{ $detailBarang->gambar_barang }}">

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
