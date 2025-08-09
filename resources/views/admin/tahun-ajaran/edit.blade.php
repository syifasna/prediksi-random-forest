@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                <h4>Detail Data Alternatif</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('alternatif.index') }}">Kembali</a>
=======
                <h4>Ubah Tahun Ajaran</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('tahun-ajaran.index') }}">Kembali</a>
>>>>>>> 89fe746 (50%)
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

<<<<<<< HEAD
                    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
=======
                    <form action="{{ route('tahun-ajaran.update', $tahunAjaran->id) }}" method="POST">
>>>>>>> 89fe746 (50%)
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
<<<<<<< HEAD
                                <label for="alternatif" class="form-label"><strong>Alternatif</strong></label>
                                <input type="text" name="alternatif"
                                    class="form-control @error('alternatif') is-invalid @enderror" id="alternatif"
                                    value="{{ $alternatif->alternatif }}">
                                @error('alternatif')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                            <div class="col-md-6 mt-4">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
=======
                                <label for="tahun_awal" class="form-label"><strong>Tahun Awal</strong></label>
                                <input type="text" step="0.01" name="tahun_awal"
                                    class="form-control @error('tahun_awal') is-invalid @enderror" id="tahun_awal"
                                    value="{{ $tahunAjaran->tahun_awal }}">
                                @error('tahun_awal')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tahun_akhir" class="form-label"><strong>Tahun Akhir</strong></label>
                                <input type="text" step="0.01" name="tahun_akhir"
                                    class="form-control @error('tahun_akhir') is-invalid @enderror" id="tahun_akhir"
                                    value="{{ $tahunAjaran->tahun_akhir }}">
                                @error('tahun_akhir')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="ket" class="form-label"><strong>Keterangan</strong></label>
                                <input type="text" step="0.01" name="ket"
                                    class="form-control @error('ket') is-invalid @enderror" id="ket"
                                    value="{{ $tahunAjaran->ket }}">
                                @error('ket')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Ubah</button>
>>>>>>> 89fe746 (50%)
                    </form>

                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

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
>>>>>>> 89fe746 (50%)
@endsection
