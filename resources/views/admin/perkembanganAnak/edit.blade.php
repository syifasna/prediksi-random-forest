@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Ubah Perkembangan Anak</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('perkembangan.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

                    <form action="{{ route('perkembangan.update', $perkembangan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tahun_ajaran_id" class="form-label"><strong>Tahun Ajaran</strong></label>
                                <select disabled name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control">
                                    @foreach ($tahunAjaran as $row)
                                        <option value="{{ $row->id }}" {{ $perkembangan->tahun_ajaran_id == $row->id ? 'selected' : '' }}>
                                            {{ $row->ket }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="semester_id" class="form-label"><strong>Semester</strong></label>
                                <select disabled name="semester_id" id="semester_id" class="form-control">
                                    @foreach ($semester as $row)
                                        <option value="{{ $row->id }}" {{ $perkembangan->semester_id == $row->id ? 'selected' : '' }}>
                                            {{ $row->semester }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kelas_id" class="form-label"><strong>Kelas</strong></label>
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                    @foreach ($kelas as $row)
                                        <option value="{{ $row->id }}" {{ $perkembangan->kelas_id == $row->id ? 'selected' : '' }}>
                                            {{ $row->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="anak_id" class="form-label"><strong>Anak</strong></label>
                                <select disabled name="anak_id" id="anak_id" class="form-control">
                                    @foreach ($anak as $row)
                                        <option value="{{ $row->id }}" {{ $perkembangan->anak_id == $row->id ? 'selected' : '' }}>
                                            {{ $row->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal" class="form-label"><strong>Tanggal</strong></label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                                    value="{{ $perkembangan->tanggal }}">
                                @error('tanggal')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kognitif" class="form-label"><strong>Nilai Kognitif</strong></label>
                                <input type="number" step="0.01" name="kognitif" id="kognitif"
                                    class="form-control @error('kognitif') is-invalid @enderror"
                                    value="{{ $perkembangan->kognitif }}">
                                @error('kognitif')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="motorik" class="form-label"><strong>Nilai Motorik</strong></label>
                                <input type="number" step="0.01" name="motorik" id="motorik"
                                    class="form-control @error('motorik') is-invalid @enderror"
                                    value="{{ $perkembangan->motorik }}">
                                @error('motorik')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bahasa" class="form-label"><strong>Nilai Bahasa</strong></label>
                                <input type="number" step="0.01" name="bahasa" id="bahasa"
                                    class="form-control @error('bahasa') is-invalid @enderror"
                                    value="{{ $perkembangan->bahasa }}">
                                @error('bahasa')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="sosial_emosional" class="form-label"><strong>Nilai Sosial Emosional</strong></label>
                                <input type="number" step="0.01" name="sosial_emosional" id="sosial_emosional"
                                    class="form-control @error('sosial_emosional') is-invalid @enderror"
                                    value="{{ $perkembangan->sosial_emosional }}">
                                @error('sosial_emosional')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ket" class="form-label"><strong>Keterangan (Opsional)</strong></label>
                                <input type="text" name="ket" id="ket"
                                    class="form-control @error('ket') is-invalid @enderror"
                                    value="{{ $perkembangan->ket }}">
                                @error('ket')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Ubah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
