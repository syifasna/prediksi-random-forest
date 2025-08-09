<style>
    .btn {
        padding: 10px !important;
    }

    td {
        font-size: 14px;
    }
</style>

@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                <h6>Data Pendaftar</h6>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-sm" href="{{ route('pendaftar.create') }}">
                        <i class="fa fa-plus"></i> + Pendaftar
=======
                <h6>Data Pengguna</h6>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-sm" href="{{ route('user.create') }}">
                        <i class="fa fa-plus"></i> + Pengguna
>>>>>>> 89fe746 (50%)
                    </a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <div class="container">
                        <table class="table mt-4" style="text-align: center">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
<<<<<<< HEAD
                                    <th>Nama Lengkap</th>
                                    <th>Agama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Foto</th>
=======
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
>>>>>>> 89fe746 (50%)
                                    <th width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
<<<<<<< HEAD
                                @forelse ($pendaftar as $kandidat)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $kandidat->nama }}</td>
                                        {{-- <td>{{ strlen($kandidat->alamat) >= 10 ? substr($kandidat->alamat, 0, 10) . '...' : $kandidat->alamat }}</td> --}}
                                        <td>{{ $kandidat->agama }}</td>
                                        <td>{{ $kandidat->tempatLahir }}</td>
                                        <td>{{ $kandidat->tglLahir }}</td>
                                        <td><img src="/fotoPendaftar/{{ $kandidat->foto }}" width="50px"></td>
                                        <td>
                                            <form action="{{ route('pendaftar.destroy', $kandidat->id) }}" method="POST">
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('pendaftar.edit', $kandidat->id) }}"><ion-icon
                                                        name="create" style="font-size: 15px;"></ion-icon></a>
=======
                                @forelse ($user as $pengguna)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $pengguna->name }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>{{ $pengguna->role }}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $pengguna->id) }}" method="POST">
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('user.edit', $pengguna->id) }}"><ion-icon name="create"
                                                        style="font-size: 15px;"></ion-icon></a>
>>>>>>> 89fe746 (50%)
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs"><ion-icon
                                                        name="trash-bin" style="font-size: 15px;"></ion-icon></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Data masih kosong..</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="d-flex justify-content-between align-items-center px-4 mt-3">
                    <div>
                        <p class="mb-0 text-sm text-muted">
<<<<<<< HEAD
                            Menampilkan {{ $pendaftar->firstItem() }} - {{ $pendaftar->lastItem() }} dari
                            {{ $pendaftar->total() }} data
                        </p>
                    </div>
                    <div>
                        {{ $pendaftar->onEachSide(1)->links('pagination::bootstrap-4') }}
=======
                            Menampilkan {{ $user->firstItem() }} - {{ $user->lastItem() }} dari
                            {{ $user->total() }} data
                        </p>
                    </div>
                    <div>
                        {{ $user->onEachSide(1)->links('pagination::bootstrap-4') }}
>>>>>>> 89fe746 (50%)
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
