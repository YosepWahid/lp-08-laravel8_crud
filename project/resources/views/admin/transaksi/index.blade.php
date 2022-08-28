@extends('admin.index')

@section('judul')
    Transaksi
@endsection


@section('content')
    {{-- container --}}
    <div class="container-fluid my-3">

        <div class="bg-light border-2">


            <div class="container-fluid p-3">

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





                    <div class="col-md-3">
                        @if (isset($trans2))
                            <div class="mt-1">
                                <h5>Ubah Transaksi</h5>
                            </div>
                            {{-- form --}}
                            <form action="{{ url('ubah/transaksi/' . $trans2->id) }}" method="post">
                                <div class="form-group">

                                    @csrf

                                    <div class="mb-2">
                                        <input type="text" class="form-control" name="nama_pembeli"
                                            placeholder="Nama pembeli" value="{{ $trans2->nama_pembeli }}">

                                        <small class="text-danger">
                                            @error('nama_pembeli')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>


                                    <div class="mb-2">
                                        <input type="text" class="form-control" name="nama_penerima"
                                            placeholder="Nama penerima" value="{{ $trans2->nama_penerima }}">

                                        <small class="text-danger">
                                            @error('nama_penerima')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>


                                    <div class="mb-2">
                                        <input type="number" class="form-control" name="harga_barang"
                                            placeholder="Harga barang yang dibeli" value="{{ $trans2->harga_barang }}">

                                        <small class="text-danger">
                                            @error('harga_barang')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="mb-2">
                                        <input type="number" class="form-control" name="uang_terima"
                                            placeholder="uang yang dibayarkan" value="{{ $trans2->uang_terima }}">


                                        <small class="text-danger">
                                            @error('uang_terima')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="mb-2">
                                        <input type="number" class="form-control" name="uang_kembali"
                                            placeholder="uang yang dikembalikan" value="{{ $trans2->uang_kembali }}">


                                        <small class="text-danger">
                                            @error('uang_kembali')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="mb-2">
                                        <button class="btn btn-sm btn-primary" type="submit">kirim</button>
                                    </div>

                                </div>
                            </form>
                        @else
                            <div class="mt-1">
                                <h5>Post Transaksi</h5>
                            </div>
                            {{-- form --}}
                            <form action="{{ route('TambahTk') }}" method="post">
                                <div class="form-group">

                                    @csrf

                                    <div class="mb-2">
                                        <input type="text" class="form-control" name="nama_pembeli"
                                            placeholder="Nama pembeli">

                                        <small class="text-danger">
                                            @error('nama_pembeli')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>


                                    <div class="mb-2">
                                        <input type="text" class="form-control" name="nama_penerima"
                                            placeholder="Nama penerima">

                                        <small class="text-danger">
                                            @error('nama_penerima')
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
                                        <input type="number" class="form-control" name="uang_terima"
                                            placeholder="uang yang dibayarkan">


                                        <small class="text-danger">
                                            @error('uang_terima')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="mb-2">
                                        <input type="number" class="form-control" name="uang_kembali"
                                            placeholder="uang yang dikembalikan">


                                        <small class="text-danger">
                                            @error('uang_kembali')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="mb-2">
                                        <button class="btn btn-sm btn-primary" type="submit">kirim</button>
                                    </div>

                                </div>
                            </form>
                        @endif

                    </div>






                    <div class="col-md-9">

                        {{-- table barang --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Penerima</th>
                                        <th>Harga Barang</th>
                                        <th>uang terima</th>
                                        <th>uang kembali</th>
                                        <th>Created</th>
                                        <th>Manipulation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $transaksi)
                                        <tr>
                                            <td>{{ $transaksi->nama_pembeli }}</td>
                                            <td>{{ $transaksi->nama_penerima }}</td>
                                            <td>{{ $transaksi->harga_barang }}</td>
                                            <td>{{ $transaksi->uang_terima }}</td>
                                            <td>{{ $transaksi->uang_kembali }}</td>
                                            <td>{{ $transaksi->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ url('hapus/transaksi/' . $transaksi->id) }}"
                                                    class="btn btn-sm btn-danger">Hapus</a>

                                                <a href="{{ url('transaksi/' . $transaksi->id) }}"
                                                    class="
                                                    btn btn-sm btn-info">
                                                    ubah
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>




                    </div>





                </div>



            </div>




        </div>



    </div>
    {{-- /.container --}}
@endsection
