<style>
<<<<<<< HEAD
    .btn{
        padding: 10px!important;
    }
    td{
=======
    .btn {
        padding: 10px !important;
    }

    td {
>>>>>>> 89fe746 (50%)
        font-size: 14px;
    }
</style>

@extends('layouts.aps')

@section('content')
<<<<<<< HEAD
<div class="col-12">
    <div class="card carddar mb-4">
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
        <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
            <h6>Data Tahun Ajaran</h6>
        </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
            <div class="container">
                <table class="table mt-4" style="text-align: center">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Tahun Awal</th>
                            <th>Tahun Akhir</th>
                            <th>Keterangan</th>
                            <th width="250px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($tahunAjaran as $alt)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $alt->tahun_awal }}</td>
                            <td>{{ $alt->tahun_akhir }}</td>
                            <td>{{ $alt->keterangan }}</td>
                            <td>
                                <form action="{{ route('tahunAjaran.destroy',$alt->id) }}" method="POST">
                                    <a class="btn btn-warning btn-xs" href="{{ route('tahunAjaran.edit',$alt->id) }}"><ion-icon name="create" style="font-size: 15px;"></ion-icon></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-xs"><ion-icon name="trash-bin" style="font-size: 15px;"></ion-icon></button>
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
                    Menampilkan {{ $tahunAjaran->firstItem() }} - {{ $tahunAjaran->lastItem() }} dari {{ $tahunAjaran->total() }} data
                </p>
            </div>
            <div>
                {{ $tahunAjaran->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        </div>
      </div>
    </div>
  </div>
=======
    <div class="col-12">
        <div class="card carddar mb-4">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h6>Data Tahun Ajaran</h6>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-sm" href="{{ route('tahun-ajaran.create') }}">
                        <i class="fa fa-plus"></i> + Tahun Ajaran
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
                                    <th>Tahun Awal</th>
                                    <th>Tahun Akhir</th>
                                    <th>Keterangan</th>
                                    <th width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tahunAjaran as $alt)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $alt->tahun_awal }}</td>
                                        <td>{{ $alt->tahun_akhir }}</td>
                                        <td>{{ $alt->ket }}</td>
                                        <td>
                                            <form action="{{ route('tahun-ajaran.destroy', $alt->id) }}" method="POST">
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('tahun-ajaran.edit', $alt->id) }}"><ion-icon name="create"
                                                        style="font-size: 15px;"></ion-icon></a>
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
                            Menampilkan {{ $tahunAjaran->firstItem() }} - {{ $tahunAjaran->lastItem() }} dari
                            {{ $tahunAjaran->total() }} data
                        </p>
                    </div>
                    <div>
                        {{ $tahunAjaran->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 89fe746 (50%)
@endsection
