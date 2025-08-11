@extends('layouts.aps')

@section('content')
    <style>
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard Monitoring Siswa') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card border-success mb-3">
                                    <div class="card-header fw-bold text-success">Sangat Baik</div>
                                    <div class="card-body">
                                        <ul class="mb-0">
                                            <li>Anak mencapai sebagian besar atau seluruh indikator dengan capaian tertinggi
                                                (ditandai simbol ✔ pada kolom semester I & II, di seluruh aspek utama).</li>
                                            <li>Tercermin dalam konsistensi perkembangan baik dalam aspek nilai agama,
                                                motorik, literasi, emosi, sosial, serta kemandirian.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card border-primary mb-3">
                                    <div class="card-header fw-bold text-primary">Sesuai Usia</div>
                                    <div class="card-body">
                                        <ul class="mb-0">
                                            <li>Anak mencapai sebagian besar indikator dengan baik, namun masih memerlukan
                                                penguatan di beberapa aspek.</li>
                                            <li>Biasanya menunjukkan ✔ di sebagian besar indikator, dengan sedikit variasi
                                                yang menunjukkan perkembangan masih berproses.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card border-warning mb-3">
                                    <div class="card-header fw-bold text-warning">Perlu Pendampingan</div>
                                    <div class="card-body">
                                        <ul class="mb-0">
                                            <li>Anak belum menunjukkan kemajuan pada beberapa area penting perkembangan.
                                            </li>
                                            <li>Ciri khas: banyak indikator kosong atau hanya dicapai sebagian, terutama
                                                dalam aspek dasar seperti emosi, motorik, atau komunikasi.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
