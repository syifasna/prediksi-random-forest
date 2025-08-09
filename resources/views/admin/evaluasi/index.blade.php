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
                <h6>Evaluasi Prediksi Perkembangan Anak</h6>
                <div class="d-md-flex justify-content-md-end">
                    <form action="{{ route('evaluasi.prediksi') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Jalankan Evaluasi</button>
                    </form>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <div class="container">
                        <table class="table mt-4" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Nama Anak</th>
                                    <th>Kognitif</th>
                                    <th>Motorik</th>
                                    <th>Bahasa</th>
                                    <th>Sosial Emosional</th>
                                    <th>Hasil Prediksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->perkembangan->anak->nama }}</td>
                                        <td>{{ $item->perkembangan->kognitif }}</td>
                                        <td>{{ $item->perkembangan->motorik }}</td>
                                        <td>{{ $item->perkembangan->bahasa }}</td>
                                        <td>{{ $item->perkembangan->sosial_emosional }}</td>
                                        <td>
                                            <span class="badge bg-success">{{ $item->hasil_prediksi }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center px-4 mt-3">
                    <div>
                        <p class="mb-0 text-sm text-muted">
                            Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }} dari
                            {{ $data->total() }} data
                        </p>
                    </div>
                    <div>
                        {{ $data->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection