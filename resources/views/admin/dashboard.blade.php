@extends('layouts.aps')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Beranda') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Selamat Datang, Admin.</h2>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="card text-white bg-primary mb-3">
                                    <div class="card-header">Total Pendaftar</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $totalPendaftar }}</h5>
                                        <p class="card-text">Jumlah semua pendaftar yang terdaftar di sistem.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-header">Total Alternatif</div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $totalAlternatif }}</h5>
                                        <p class="card-text">Jumlah data alternatif yang diproses dalam sistem.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-header">Rangking Tertinggi</div>
                                    <div class="card-body">
                                        @if ($peringkatTertinggi)
                                            <h5 class="card-title">{{ $peringkatTertinggi->nama }}</h5>
                                            <p class="card-text">Nilai: {{ $peringkatTertinggi->saw_result }} <br> Ranking: {{ $peringkatTertinggi->rank }}</p>
                                        @else
                                            <p class="card-text">Belum ada data</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
