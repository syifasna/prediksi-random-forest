@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-success mb-3">
                    <div class="card-header fw-bold text-success">Sangat Baik</div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Anak mencapai sebagian besar atau seluruh indikator dengan capaian tertinggi (ditandai
                                simbol ✔ pada kolom semester I & II, di seluruh aspek utama).</li>
                            <li>Tercermin dalam konsistensi perkembangan baik dalam aspek nilai agama, motorik, literasi,
                                emosi, sosial, serta kemandirian.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-primary mb-3">
                    <div class="card-header fw-bold text-primary">Sesuai Usia</div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Anak mencapai sebagian besar indikator dengan baik, namun masih memerlukan penguatan di
                                beberapa aspek.</li>
                            <li>Biasanya menunjukkan ✔ di sebagian besar indikator, dengan sedikit variasi yang menunjukkan
                                perkembangan masih berproses.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-warning mb-3">
                    <div class="card-header fw-bold text-warning">Perlu Pendampingan</div>
                    <div class="card-body">
                        <ul class="mb-0">
                            <li>Anak belum menunjukkan kemajuan pada beberapa area penting perkembangan.</li>
                            <li>Ciri khas: banyak indikator kosong atau hanya dicapai sebagian, terutama dalam aspek dasar
                                seperti emosi, motorik, atau komunikasi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Input Perkembangan Anak</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('perkembangan.index') }}">Kembali</a>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

                    <form action="{{ route('perkembangan.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tahun_ajaran_id" class="form-label"><strong>Tahun Ajaran</strong></label>
                                <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control">
                                    <option value="">-- Pilih Tahun Ajaran --</option>
                                    @foreach ($tahunAjaran as $row)
                                        <option value="{{ $row->id }}">{{ $row->ket }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_ajaran_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="semester_id" class="form-label"><strong>Semester</strong></label>
                                <select name="semester_id" id="semester_id" class="form-control">
                                    <option value="">-- Pilih Semester --</option>
                                </select>
                                @error('semester_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kelas_id" class="form-label"><strong>Kelas</strong></label>
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                    <option value="">-- Pilih Kelas --</option>
                                </select>
                                @error('kelas_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="anak_id" class="form-label"><strong>Anak</strong></label>
                                <select name="anak_id" id="anak_id" class="form-control">
                                    <option value="">-- Pilih Anak --</option>
                                </select>
                                @error('anak_id')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label"><strong>Tanggal</strong></label>
                                <input type="date" step="0.01" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @enderror" id="tanggal">
                                @error('tanggal')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kognitif" class="form-label"><strong>Nilai Kognitif</strong></label>
                                <input type="number" step="0.01" name="kognitif"
                                    class="form-control @error('kognitif') is-invalid @enderror" id="kognitif">
                                @error('kognitif')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="motorik" class="form-label"><strong>Nilai Motorik</strong></label>
                                <input type="number" step="0.01" name="motorik"
                                    class="form-control @error('motorik') is-invalid @enderror" id="motorik">
                                @error('motorik')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bahasa" class="form-label"><strong>Nilai Bahasa</strong></label>
                                <input type="number" step="0.01" name="bahasa"
                                    class="form-control @error('bahasa') is-invalid @enderror" id="bahasa">
                                @error('bahasa')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sosial_emosional" class="form-label"><strong>Nilai Sosial
                                        Emosional</strong></label>
                                <input type="number" step="0.01" name="sosial_emosional"
                                    class="form-control @error('sosial_emosional') is-invalid @enderror"
                                    id="sosial_emosional">
                                @error('sosial_emosional')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ket" class="form-label"><strong>Keterangan (Opsioanl)</strong></label>
                                <input type="text" step="0.01" name="ket"
                                    class="form-control @error('ket') is-invalid @enderror" id="ket">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tahun_ajaran_id').on('change', function() {
                let tahunAjaranId = $(this).val();
                $('#semester_id').empty().append('<option value="">Loading...</option>');
                $.get('/get-semester/' + tahunAjaranId, function(data) {
                    $('#semester_id').empty().append(
                        '<option value="">-- Pilih Semester --</option>');
                    data.forEach(function(item) {
                        $('#semester_id').append('<option value="' + item.id + '">' + item
                            .semester + '</option>');
                    });
                });
            });

            $('#tahun_ajaran_id').on('change', function() {
                let tahunAjaranId = $(this).val();
                $('#kelas_id').empty().append('<option value="">Loading...</option>');
                $.get('/get-kelas/' + tahunAjaranId, function(data) {
                    $('#kelas_id').empty().append('<option value="">-- Pilih Kelas --</option>');
                    data.forEach(function(item) {
                        $('#kelas_id').append('<option value="' + item.id + '">' + item
                            .nama_kelas + '</option>');
                    });
                });
            });

            $('#kelas_id').on('change', function() {
                let kelasId = $(this).val();
                $('#anak_id').empty().append('<option value="">Loading...</option>');
                $.get('/get-anak/' + kelasId, function(data) {
                    $('#anak_id').empty().append('<option value="">-- Pilih Anak --</option>');
                    data.forEach(function(item) {
                        $('#anak_id').append('<option value="' + item.id + '">' + item
                            .nama + '</option>');
                    });
                });
            });
        });
    </script>
@endsection
