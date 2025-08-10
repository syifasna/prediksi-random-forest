@extends('layouts.aps')

@section('content')
    <style>
        .btn {
            padding: 10px !important;
        }

        td {
            font-size: 14px;
        }

        .tabel-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .tabel-container table {
            border-collapse: collapse;
            min-width: 200px;
        }

        .tabel-container th,
        .tabel-container td {
            border: 1px solid #000;
            padding: 5px 10px;
        }
    </style>

    <div class="col-12 d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Evaluasi Prediksi Perkembangan Anak</h2>
        <div class="d-flex gap-2">
            <form action="{{ route('evaluasi.prediksi') }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-primary">Jalankan Evaluasi</button>
            </form>

            <!-- Dropdown Download -->
            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Download
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('evaluasi.download.pdf') }}">PDF</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('evaluasi.download.excel') }}">Excel</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    {{-- Berdasarkan Kelas --}}
    <div class="col-12">
        <div class="card carddar mb-4">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="card-body px-0 pt-0 pb-2">
                <h6 class="px-4 mt-4 mb-3">Evaluasi Perkembangan Anak berdasarkan Kelas</h6>
                <div class="tabel-container px-4">
                    @foreach ($berdasarkanKelas as $kelas => $items)
                        <table>
                            <thead class="text-center">
                                <tr>
                                    <th colspan="2" class="text-center">Kelas {{ $kelas }}</th>
                                </tr>
                                <tr>
                                    <th>Nama Anak</th>
                                    <th>Hasil Prediksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $anak)
                                    <tr>
                                        <td>{{ $anak['nama_anak'] }}</td>
                                        <td>{{ $anak['hasil_prediksi'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>

                <hr>


            </div>
        </div>
    </div>

    {{-- Berdasarkan Label --}}
    <div class="col-12">
        <div class="card carddar mb-4">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="card-body px-0 pt-0 pb-2">
                <h6 class="px-4 mt-5 mb-3">Evaluasi Perkembangan Anak berdasarkan Label</h6>
                <div class="tabel-container px-4">
                    @foreach ($berdasarkanLabel as $label => $items)
                        <table>
                            <thead class="text-center">
                                <tr>
                                    <th colspan="2" class="text-center">{{ $label }}</th>
                                </tr>
                                <tr>
                                    <th>Nama Anak</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $anak)
                                    <tr>
                                        <td>{{ $anak['nama_anak'] }}</td>
                                        <td class="text-center">{{ $anak['nama_kelas'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>

                <hr>


            </div>
        </div>
    </div>

    {{-- Seluruh Riwayat --}}
    <div class="col-12">
        <div class="card carddar mb-4">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="card-body px-0 pt-0 pb-2">
                <h3 class="px-4 mt-5 mb-4 text-center">Riwayat Evaluasi Prediksi Perkembangan Anak</h3>
                <div class="table-responsive p-0">
                    <div class="container">
                        <table class="table mt-4">
                            <thead style="text-align: center">
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
                                        <td class="text-center">{{ $item->perkembangan->kognitif }}</td>
                                        <td class="text-center">{{ $item->perkembangan->motorik }}</td>
                                        <td class="text-center">{{ $item->perkembangan->bahasa }}</td>
                                        <td class="text-center">{{ $item->perkembangan->sosial_emosional }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-success">{{ $item->hasil_prediksi }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Pagination --}}
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
