@extends('layouts.aps')

@section('content')
<div class="col-12">
    <div class="card carddar mb-4">
        <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
            <h4>Input Capaian Perkembangan Anak</h4>
            <a class="btn btn-dark btn-sm" href="{{ route('perkembangan.index') }}">Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ route('perkembangan.store') }}" method="POST">
                @csrf

                {{-- Pilihan Data Utama --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><strong>Tahun Ajaran</strong></label>
                        <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                            @foreach ($tahunAjaran as $row)
                                <option value="{{ $row->id }}">{{ $row->ket }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><strong>Semester</strong></label>
                        <select name="semester_id" id="semester_id" class="form-control">
                            <option value="">-- Pilih Semester --</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><strong>Kelas</strong></label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option value="">-- Pilih Kelas --</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label><strong>Anak</strong></label>
                        <select name="anak_id" id="anak_id" class="form-control">
                            <option value="">-- Pilih Anak --</option>
                        </select>
                    </div>
                </div>

                {{-- Input Tanggal --}}
                <div class="mb-3">
                    <label><strong>Tanggal</strong></label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <hr>

                {{-- Input Nilai --}}
                <div class="mb-3">
                    <label><strong>Nilai Kognitif</strong></label>
                    <input type="number" step="0.01" name="kognitif" class="form-control" required>
                    <small class="text-muted">
                        Rata-rata skor dari indikator sub elemen <strong>Kognitif</strong>.
                    </small>
                </div>

                <div class="mb-3">
                    <label><strong>Nilai Motorik</strong></label>
                    <input type="number" step="0.01" name="motorik" class="form-control" required>
                    <small class="text-muted">
                        Rata-rata skor dari indikator sub elemen <strong>Motorik Kasar</strong> dan <strong>Halus</strong>.
                    </small>
                </div>

                <div class="mb-3">
                    <label><strong>Nilai Bahasa</strong></label>
                    <input type="number" step="0.01" name="bahasa" class="form-control" required>
                    <small class="text-muted">
                        Rata-rata skor dari indikator sub elemen <strong>Literasi Bahasa</strong> dan <strong>Komunikasi</strong>.
                    </small>
                </div>

                <div class="mb-3">
                    <label><strong>Nilai Sosial-Emosional</strong></label>
                    <input type="number" step="0.01" name="sosial_emosional" class="form-control" required>
                    <small class="text-muted">
                        Rata-rata skor dari indikator sub elemen <strong>Sosial</strong>, <strong>Budi Pekerti</strong>, dan <strong>Jati Diri</strong>.
                    </small>
                </div>

                <div class="mb-3">
                    <label><strong>Keterangan (Opsional)</strong></label>
                    <input type="text" name="ket" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>

{{-- Script Ajax untuk select dinamis --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
        $('#tahun_ajaran_id').on('change', function () {
            let id = $(this).val();
            $('#semester_id').html('<option>Loading...</option>');
            $.get('/get-semester/' + id, function (data) {
                $('#semester_id').html('<option value="">-- Pilih Semester --</option>');
                data.forEach(item => {
                    $('#semester_id').append(`<option value="${item.id}">${item.semester}</option>`);
                });
            });

            $('#kelas_id').html('<option>Loading...</option>');
            $.get('/get-kelas/' + id, function (data) {
                $('#kelas_id').html('<option value="">-- Pilih Kelas --</option>');
                data.forEach(item => {
                    $('#kelas_id').append(`<option value="${item.id}">${item.nama_kelas}</option>`);
                });
            });
        });

        $('#kelas_id').on('change', function () {
            let id = $(this).val();
            $('#anak_id').html('<option>Loading...</option>');
            $.get('/get-anak/' + id, function (data) {
                $('#anak_id').html('<option value="">-- Pilih Anak --</option>');
                data.forEach(item => {
                    $('#anak_id').append(`<option value="${item.id}">${item.nama}</option>`);
                });
            });
        });
    });
</script>
@endsection
