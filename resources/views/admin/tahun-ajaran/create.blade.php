@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Tambah Data Tahun Ajaran</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('tahun-ajaran.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

                    <form action="{{ route('tahun-ajaran.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tahun_awal" class="form-label"><strong>Tahun Awal</strong></label>
                                <input type="text" step="0.01" name="tahun_awal"
                                    class="form-control @error('tahun_awal') is-invalid @enderror" id="tahun_awal">
                                @error('tahun_awal')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tahun_akhir" class="form-label"><strong>Tahun Akhir</strong></label>
                                <input type="text" step="0.01" name="tahun_akhir"
                                    class="form-control @error('tahun_akhir') is-invalid @enderror" id="tahun_akhir">
                                @error('tahun_akhir')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="ket" class="form-label"><strong>Keterangan</strong></label>
                                <input type="text" step="0.01" name="ket"
                                    class="form-control @error('ket') is-invalid @enderror" id="ket" readonly>
                                @error('ket')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tahunAwal = document.getElementById('tahun_awal');
            const tahunAkhir = document.getElementById('tahun_akhir');
            const ket = document.getElementById('ket');

            function updateKet() {
                const awal = tahunAwal.value;
                const akhir = tahunAkhir.value;

                if (awal && akhir) {
                    ket.value = `${awal}/${akhir}`;
                } else {
                    ket.value = '';
                }
            }

            tahunAwal.addEventListener('input', updateKet);
            tahunAkhir.addEventListener('input', updateKet);
        });
    </script>
@endsection
