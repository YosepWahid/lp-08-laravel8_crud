@extends('admin.index')


@section('judul')
    Category
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

                        @if (session('sampah'))
                            <div class="alert alert-warning" role="alert">
                                <strong>{{ session('sampah') }}</strong>
                            </div>
                        @endif

                    </div>
                </div>

                <div class="row">

                    <div class="col">
                        <div class="mt-1">
                            <h5>Post Category</h5>
                        </div>
                        {{-- form --}}
                        <form action="{{ url('/ktambah') }}" method="post">
                            <div class="form-group">

                                @csrf

                                <div class="mb-2">

                                    <input type="text" class="form-control" name="nama_category"
                                        placeholder="Nama Category">

                                    <small class="text-danger">
                                        @error('nama_category')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="id_barang" placeholder="id category">

                                    <small class="text-danger">
                                        @error('id_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="penjelasan_category"
                                        placeholder="penjelasan Category">

                                    <small class="text-danger">
                                        @error('penjelasan_category')
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

    <div class="container">
        <div class="row">







            @if (isset($kategori2))
                <div class="col-md-6">

                    @foreach ($kategori as $kategoris)
                        <div class="card mb-1">
                            <div class="card-body">
                                <h3 class="card-title">{{ $kategoris->nama_category }}</h3>
                                <p class="card-text">{{ $kategoris->penjelasan_category }}</p>
                                <a href="{{ url('category/' . $kategoris->id) }}" class="btn btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-info" viewBox="0 0 16 16">
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    {{ $kategori->links() }}
                </div>
            @else
                @foreach ($kategori as $kategoris)
                    <div class="col-md-4">

                        <div class="card mb-1">
                            <div class="card-body">
                                <h3 class="card-title">{{ $kategoris->nama_category }}</h3>
                                <p class="card-text">id : {{ $kategoris->id_barang }}</p>
                                <p class="card-text">{{ $kategoris->penjelasan_category }}</p>
                                <a href="{{ url('category/' . $kategoris->id) }}" class="btn btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-info" viewBox="0 0 16 16">
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </a>
                                <a href="{{ url('sampah/kategori/' . $kategoris->id) }}" class="btn btn-sm btn-warning">
                                    Sampah
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


            @if (isset($kategori2))
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <div class="mt-1">
                                    <h5>Ubah Category</h5>
                                </div>
                                {{-- form --}}
                                <form action="{{ url('ubah/category/' . $kategori2->id) }}" method="post">
                                    <div class="form-group">
                                        @csrf

                                        <div class="mb-2">
                                            <input type="text" class="form-control" name="nama_category"
                                                placeholder="Nama Category" value="{{ $kategori2->nama_category }}">

                                            <small class="text-danger">
                                                @error('nama_category')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="mb-2">
                                            <input type="text" class="form-control" name="id_barang"
                                                placeholder="id category" value="{{ $kategori2->id_barang }}">

                                            <small class="  text-danger">
                                                @error('id_barang')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>

                                        <div class="mb-2">
                                            <input type="text" class="form-control" name="penjelasan_category"
                                                placeholder="penjelasan Category"
                                                value="{{ $kategori2->penjelasan_category }}">

                                            <small class="   text-danger">
                                                @error('penjelasan_category')
                                                    {{ $message }}
                                                @enderror
                                            </small>
                                        </div>


                                        <div class="mb-2">
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        </div>

    @endsection
