@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Ubah Kelas</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('kelas.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

                    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tahun_ajaran_id" class="form-label"><strong>Tahun Ajaran</strong></label>
                                    <select disabled name="tahun_ajaran_id" id="tahun_ajaran_id"
                                        class="form-control @error('tahun_ajaran_id') is-invalid @enderror">
                                        @foreach ($tahunAjaran as $row)
                                            <option value="{{ $row->id }}"
                                                {{ isset($kelas) && $kelas->tahun_ajaran_id == $row->id ? 'selected' : '' }}>
                                                {{ $row->ket }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tahun_ajaran_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="wali_kelas_id" class="form-label"><strong>Wali Kelas</strong></label>
                                    <select name="wali_kelas_id" id="wali_kelas_id"
                                        class="form-control @error('wali_kelas_id') is-invalid @enderror">
                                        @foreach ($waliKelas as $row)
                                            <option value="{{ $row->id }}"
                                                {{ isset($kelas) && $kelas->wali_kelas_id == $row->id ? 'selected' : '' }}>
                                                {{ $row->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('wali_kelas_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nama_kelas" class="form-label"><strong>Kelas</strong></label>
                                <input type="text" step="0.01" name="nama_kelas"
                                    class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas"
                                    value="{{ $kelas->nama_kelas }}">
                                @error('nama_kelas')
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
