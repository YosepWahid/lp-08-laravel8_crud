@extends('admin.index')


@section('judul')
    Sampah
@endsection


@section('content')
    {{-- container --}}
    <div class="container-fluid my-3">

        <div class="bg-light border-2">


            <div class="container-fluid p-3">

                <div class="row">
                    @if (session('pulih'))
                        <div class="alert alert-info" role="alert">
                            <strong>{{ session('pulih') }}</strong>
                        </div>
                    @endif

                    @if (session('hapus'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('hapus') }}</strong>
                        </div>
                    @endif
                </div>


                <div class="row">

                    <div class="col">
                        <div class="table-responsive">
                            <table class="table table-striped table-inverse">
                                <thead class="thead">
                                    <tr>
                                        <th>Name Category</th>
                                        <th>Penjelasan Category</th>
                                        <th>id Barang</th>
                                        <th>Delated At</th>
                                        <th>Manipulation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sampah as $sampahs)
                                        <tr>
                                            <td>{{ $sampahs->nama_category }}</td>
                                            <td>{{ $sampahs->penjelasan_category }}</td>
                                            <td>{{ $sampahs->id_barang }}</td>
                                            <td>{{ $sampahs->deleted_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ url('pulih/sampah/' . $sampahs->id) }}"
                                                    class="btn btn-sm btn-success">Restore</a>
                                                <a href="{{ url('hapus/sampah/' . $sampahs->id) }}"
                                                    class="btn btn-sm btn-danger">Delate</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{ $sampah->links() }}
                    </div>





                </div>
            </div>
        </div>

    </div>
    {{-- /.container --}}
@endsection
