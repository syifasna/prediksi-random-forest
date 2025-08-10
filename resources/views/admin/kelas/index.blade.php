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
                <h6>Data Kelas</h6>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-success btn-sm" href="{{ route('kelas.create') }}">
                        <i class="fa fa-plus"></i> + Kelas
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
                                    <th>Tahun Ajaran</th>
                                    <th>Wali Kelas</th>
                                    <th>Kelas</th>
                                    <th>Ket</th>
                                    <th width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelas as $kt)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $kt->TahunAjaran->ket }}</td>
                                        <td>{{ $kt->User->name }}</td>
                                        <td>{{ $kt->nama_kelas }}</td>
                                        <td>{{ $kt->ket }}</td>
                                        <td>
                                            <form action="{{ route('kelas.destroy', $kt->id) }}" method="POST">
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('kelas.edit', $kt->id) }}"><ion-icon name="create"
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
                            Menampilkan {{ $kelas->firstItem() }} - {{ $kelas->lastItem() }} dari
                            {{ $kelas->total() }} data
                        </p>
                    </div>
                    <div>
                        {{ $kelas->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
