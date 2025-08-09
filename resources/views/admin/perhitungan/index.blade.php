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
    <div class="col-12 ">
        <div class="card carddar mb-4">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h6>Masukan Nilai untuk Setiap Calon Siswa</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <div class="container">
                        <form action="{{ route('perhitungan.store') }}" method="POST">
                            @csrf
                            <table class="table mt-4" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        <th>Nama Pendaftar</th>
                                        @foreach ($kriterias as $kriteria)
                                            <th>{{ $kriteria->nkriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatifs as $index => $alternatif)
                                        <tr>
                                            <input type="hidden" name="alternatif_id[]" value="{{ $alternatif->id }}">
                                            <td>{{ $alternatif->alternatif }}</td>
                                            <td>{{ $alternatif->pendaftar->nama }}</td>

                                            @foreach ($kriterias as $kriteria)
                                                <td class="kriteria-col">
                                                    @if ($loop->index == 1)
                                                        {{-- Kriteria kedua (prestasi) --}}
                                                        <select name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]"
                                                            class="form-control" required>
                                                            <option value="1"
                                                                {{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai_data[$alternatif->id][$kriteria->id] ?? '') == 1 ? 'selected' : '' }}>
                                                                Tidak ada prestasi</option>
                                                            <option value="2"
                                                                {{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai_data[$alternatif->id][$kriteria->id] ?? '') == 2 ? 'selected' : '' }}>
                                                                Pernah ikut kegiatan saja</option>
                                                            <option value="3"
                                                                {{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai_data[$alternatif->id][$kriteria->id] ?? '') == 3 ? 'selected' : '' }}>
                                                                Juara 3 tingkat sekolah</option>
                                                            <option value="4"
                                                                {{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai_data[$alternatif->id][$kriteria->id] ?? '') == 4 ? 'selected' : '' }}>
                                                                Juara 2/3 tingkat kota</option>
                                                            <option value="5"
                                                                {{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai_data[$alternatif->id][$kriteria->id] ?? '') == 5 ? 'selected' : '' }}>
                                                                Juara 1 tingkat kota/provinsi</option>
                                                        </select>
                                                    @else
                                                        {{-- Kriteria akademik & ujian --}}
                                                        <input type="number" step="0.01"
                                                            name="nilai[{{ $alternatif->id }}][{{ $kriteria->id }}]"
                                                            class="form-control"
                                                            value="{{ old('nilai.' . $alternatif->id . '.' . $kriteria->id, $nilai_data[$alternatif->id][$kriteria->id] ?? '') }}"
                                                            required>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-success">Simpan Semua</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .kriteria-col {
            width: 100px;
        }

        .kriteria-col input {
            width: 80px;
            margin: 0 auto;
        }
    </style>

@endsection
