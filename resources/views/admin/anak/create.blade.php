@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Tambah Data Anak</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('anak.index') }}">Kembali</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">

                    {{-- list-tab --}}
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="data-pribadi-tab" data-bs-toggle="tab"
                                data-bs-target="#data-pribadi" type="button" role="tab">Data Pribadi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="data-ortu-tab" data-bs-toggle="tab" data-bs-target="#data-ortu"
                                type="button" role="tab">Data Orang Tua / Wali</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="lainnya-tab" data-bs-toggle="tab" data-bs-target="#lainnya"
                                type="button" role="tab">Lainnya</button>
                        </li>
                    </ul>

                    <form action="{{ route('anak.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="myTabContent">
                            <!-- Tab Data Pribadi -->
                            <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label"><strong>Nama Lengkap</strong></label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            placeholder="Masukan Nama">
                                        @error('nama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="nik" class="form-label"><strong>NIK</strong></label>
                                        <input type="text" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror" id="nik"
                                            placeholder="Masukan NIK">
                                        @error('nik')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tempatLhr" class="form-label"><strong>Tempat Lahir</strong></label>
                                        <input type="text" name="tempatLhr"
                                            class="form-control @error('tempatLhr') is-invalid @enderror" id="tempatLhr"
                                            placeholder="Masukan Tempat Lahir">
                                        @error('tempatLhr')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tglLahir" class="form-label"><strong>Tanggal Lahir</strong></label>
                                        <input type="date" name="tglLahir"
                                            class="form-control @error('tglLahir') is-invalid @enderror" id="tglLahir">
                                        @error('tglLahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="jk" class="form-label"><strong>Jenis Kelamin</strong></label>
                                    <select name="jk" id="jk"
                                        class="form-control @error('jk') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    </select>
                                    @error('jk')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" style="height:150px"
                                        placeholder="Masukan Alamat"></textarea>
                                    @error('alamat')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Tab Data Orang Tua / Wali -->
                <div class="tab-pane fade" id="data-ortu" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="namaOrtuWali" class="form-label"><strong>Orang Tua/Wali</strong></label>
                            <input type="text" name="namaOrtuWali"
                                class="form-control @error('namaOrtuWali') is-invalid @enderror" id="namaOrtuWali"
                                placeholder="Masukan Nama Orang Tua Wali">
                            @error('namaOrtuWali')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Tab Lainnya -->
                <div class="tab-pane fade" id="lainnya" role="tabpanel">
                    <div class="mb-3">
                        <label for="foto" class="form-label"><strong>Upload Foto</strong></label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                            id="foto">
                        @error('foto')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kelas_id" class="form-label"><strong>Kelas</strong></label>
                        <select name="kelas_id" id="kelas_id"
                            class="form-control @error('kelas_id') is-invalid @enderror">
                            @foreach ($kelas as $row)
                                <option value="{{ $row->id }}">{{ $row->nama_kelas }}</option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success mt-3">Tambah</button>
            </form>

        </div>
    </div>
    </div>
    </div>
@endsection
