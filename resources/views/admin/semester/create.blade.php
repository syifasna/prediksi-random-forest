@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                <h4>Tambah Data Kriteria</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('kriteria.index') }}">Kembali</a>
=======
                <h4>Tambah Data Semester</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('semester.index') }}">Kembali</a>
>>>>>>> 89fe746 (50%)
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

<<<<<<< HEAD
                    <form action="{{ route('kriteria.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nkriteria" class="form-label"><strong>Nama Kriteria</strong></label>
                                <input type="text" name="nkriteria" class="form-control @error('nkriteria') is-invalid @enderror" id="nkriteria">
                                @error('nkriteria')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="atribut" class="form-label"><strong>Atribut</strong></label>
                                <select name="atribut" id="atribut" class="form-control @error('atribut') is-invalid @enderror">
                                    <option value="">-- Pilih Atribut --</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                </select>
                                @error('atribut')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="bobot" class="form-label"><strong>Bobot</strong></label>
                                <input type="number" step="0.01" name="bobot" class="form-control @error('bobot') is-invalid @enderror" id="bobot">
                                @error('bobot')
=======
                    <form action="{{ route('semester.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="tahun_ajaran_id" class="form-label"><strong>Tahun Ajaran</strong></label>
                                    <select name="tahun_ajaran_id" id="tahun_ajaran_id"
                                        class="form-control @error('tahun_ajaran_id') is-invalid @enderror">
                                        @foreach ($tahun_ajaran as $row)
                                            <option value="{{ $row->id }}">{{ $row->ket }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun_ajaran_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="semester" class="form-label"><strong>Semester</strong></label>
                                <input type="text" step="0.01" name="semester" class="form-control @error('semester') is-invalid @enderror" id="semester">
                                @error('semester')
>>>>>>> 89fe746 (50%)
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
@endsection
