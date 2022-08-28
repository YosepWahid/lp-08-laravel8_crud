@extends('admin.index')

@section('judul')
    Customer
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

                        @if (session('sampah'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ session('sampah') }}</strong>
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
                                    <th>Nama Pembeli</th>
                                    <th>Harga Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Created</th>
                                    <th>Manipulation</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pembelis as $pembeli)
                                    <tr>
                                        <td>{{ $pembeli->nama_customer }}</td>
                                        <td>{{ $pembeli->harga_barang }}</td>
                                        <td>{{ $pembeli->nama_barang }}</td>
                                        <td>{{ $pembeli->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('pembeli/' . $pembeli->id) }}"
                                                class="btn btn-sm btn-info">ubah</a>
                                            <a href="{{ url('hapus/pembeli/' . $pembeli->id) }}"
                                                class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>



                        @isset($barang2)
                            {{ $pembelis->links() }}
                        @endisset
                    </div>



                    <div class="col-md-4">
                        <div class="mt-1">
                            <h5>Post Pembeli</h5>
                        </div>
                        {{-- form --}}
                        <form action="{{ route('TambahP') }}" method="post">
                            <div class="form-group">

                                @csrf

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="nama_customer"
                                        placeholder="Nama pembeli">

                                    <small class="text-danger">
                                        @error('nama_customer')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>


                                <div class="mb-2">
                                    <input type="number" class="form-control" name="harga_barang"
                                        placeholder="Harga barang yang dibeli">

                                    <small class="text-danger">
                                        @error('harga_barang')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="mb-2">
                                    <input type="text" class="form-control" name="nama_barang"
                                        placeholder="Nama barang yang Dibeli">


                                    <small class="text-danger">
                                        @error('nama_barang')
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


    @if (isset($barang2))
        <div class="container my-3">
            <div class="bg-light border-1">
                <div class="container p-3">

                    <div class="row">


                        <div class="col-md-8">
                            <div class="mt-1">
                                <h5>Ubah Pembeli</h5>
                            </div>
                            {{-- form --}}
                            <form action="{{ url('ubah/pembeli/' . $barang2->id) }}" method="post">
                                <div class="form-group">

                                    @csrf

                                    <div class="mb-2">
                                        <input type="text" class="form-control" name="nama_customer"
                                            placeholder="Nama pembeli" value="{{ $barang2->nama_customer }}">

                                        <small class="text-danger">
                                            @error('nama_customer')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>


                                    <div class="mb-2">
                                        <input type="number" class="form-control" name="harga_barang"
                                            placeholder="Harga barang yang dibeli" value="{{ $barang2->harga_barang }}">

                                        <small class="text-danger">
                                            @error('harga_barang')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="mb-2">
                                        <input type="text" class="form-control" name="nama_barang"
                                            placeholder="Nama barang yang Dibeli" value="{{ $barang2->nama_barang }}">


                                        <small class="text-danger">
                                            @error('nama_barang')
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
    @endif
@endsection
