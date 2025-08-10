@extends('layouts.aps')

@section('content')
    <style>
        .chart-container {
            padding: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        canvas {
            max-height: 300px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-6 col-lg-3">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Anak</h5>
                                        <p class="card-text fs-3">{{ $totalAnak }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card text-white bg-success mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Kelas</h5>
                                        <p class="card-text fs-3">{{ $totalKelas }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

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


                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="chart-container">
                                    <canvas id="chart2"></canvas>
                                </div>
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            const kelasLabels = @json($kelasLabels);

                            // Chart 1
                            new Chart(document.getElementById('chart1').getContext('2d'), {
                                type: 'bar',
                                data: {
                                    labels: kelasLabels,
                                    datasets: @json($chart1Data)
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'top'
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

                            // Chart 2
                            new Chart(document.getElementById('chart2').getContext('2d'), {
                                type: 'bar',
                                data: {
                                    labels: @json(collect($chart2Data)->pluck('label')),
                                    datasets: [{
                                        label: 'Jumlah Siswa',
                                        data: @json(collect($chart2Data)->pluck('value')),
                                        backgroundColor: @json(collect($chart2Data)->pluck('backgroundColor')),
                                        borderColor: @json(collect($chart2Data)->pluck('borderColor')),
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            position: 'top'
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
