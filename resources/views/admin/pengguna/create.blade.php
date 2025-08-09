@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                <h4>Tambah Data Pendaftar</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('pendaftar.index') }}">Kembali</a>
=======
                <h4>Tambah Data Pengguna</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('user.index') }}">Kembali</a>
>>>>>>> 89fe746 (50%)
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2 mt-3">
                <div class="container">
<<<<<<< HEAD

                    {{-- list-tab --}}
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="data-pribadi-tab" data-bs-toggle="tab"
                                data-bs-target="#data-pribadi" type="button" role="tab">Data Pribadi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="data-sekolah-asal-tab" data-bs-toggle="tab"
                                data-bs-target="#data-sekolah-asal" type="button" role="tab">Data Sekolah Asal</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="lainnya-tab" data-bs-toggle="tab" data-bs-target="#lainnya"
                                type="button" role="tab">Lainnya</button>
                        </li>
                    </ul>

                    <form action="{{ route('pendaftar.store') }}" method="POST"  enctype="multipart/form-data">
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
                                        <label for="agama" class="form-label"><strong>Agama</strong></label>
                                        <select name="agama" id="agama"
                                            class="form-control @error('agama') is-invalid @enderror">
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tempatLahir" class="form-label"><strong>Tempat Lahir</strong></label>
                                        <input type="text" name="tempatLahir"
                                            class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir"
                                            placeholder="Masukan Tempat Lahir">
                                        @error('tempatLahir')
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

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="jk" class="form-label"><strong>Jenis Kelamin</strong></label>
                                        <select name="jk" id="jk"
                                            class="form-control @error('jk') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                        </select>
                                        @error('jk')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="rt" class="form-label"><strong>RT</strong></label>
                                        <input type="text" name="rt"
                                            class="form-control @error('rt') is-invalid @enderror" id="rt"
                                            placeholder="Masukan RT">
                                        @error('rt')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="rw" class="form-label"><strong>RW</strong></label>
                                        <input type="text" name="rw"
                                            class="form-control @error('rw') is-invalid @enderror" id="rw"
                                            placeholder="Masukan RW">
                                        @error('rw')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="desa" class="form-label"><strong>Desa</strong></label>
                                        <input type="text" name="desa"
                                            class="form-control @error('desa') is-invalid @enderror" id="desa"
                                            placeholder="Masukan Desa">
                                        @error('desa')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="kecamatan" class="form-label"><strong>Kecamatan</strong></label>
                                        <input type="text" name="kecamatan"
                                            class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                                            placeholder="Masukan Kecamatan">
                                        @error('kecamatan')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="kab_kota" class="form-label"><strong>Kabupaten / Kota</strong></label>
                                        <input type="text" name="kab_kota"
                                            class="form-control @error('kab_kota') is-invalid @enderror" id="kab_kota"
                                            placeholder="Masukan Kabupaten/Kota">
                                        @error('kab_kota')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                            style="height:150px" placeholder="Masukan Alamat"></textarea>
                                        @error('alamat')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Data Sekolah Asal -->
                            <div class="tab-pane fade" id="data-sekolah-asal" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nm_sekolah_asal" class="form-label"><strong>Sekolah Asal</strong></label>
                                        <input type="text" name="nm_sekolah_asal"
                                            class="form-control @error('nm_sekolah_asal') is-invalid @enderror" id="nm_sekolah_asal"
                                            placeholder="Masukan Sekolah Asal">
                                        @error('nm_sekolah_asal')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nisn" class="form-label"><strong>Alamat Sekolah Asal</strong></label>
                                        <textarea class="form-control @error('alamat_sekolah_asal') is-invalid @enderror" name="alamat_sekolah_asal" id="alamat_sekolah_asal"
                                            style="height:150px" placeholder="Masukan Alamat Sekolah Asal"></textarea>
                                        @error('alamat_sekolah_asal')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nisn" class="form-label"><strong>No NISN</strong></label>
                                        <input type="text" name="nisn"
                                            class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                            placeholder="Masukan Nomor NISN">
                                        @error('nisn')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="noijazah" class="form-label"><strong>No Ijazah</strong></label>
                                        <input type="text" name="noijazah"
                                            class="form-control @error('noijazah') is-invalid @enderror" id="noijazah"
                                            placeholder="Masukan Nomor Ijazah">
                                        @error('noijazah')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Lainnya -->
                            <div class="tab-pane fade" id="lainnya" role="tabpanel">
                                <div class="mb-3">
                                    <label for="foto" class="form-label"><strong>Upload Foto</strong></label>
                                    <input type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" id="foto">
                                    @error('foto')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

=======
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label"><strong>Nama Lengkap</strong></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Masukan Nama">
                                @error('name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><strong>E-Mail</strong></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="Masukan E-Mail">
                                @error('email')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Masukan Password">
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label"><strong>Konfirmasi Password</strong></label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="role" class="form-label"><strong>Role</strong></label>
                                <select name="role" id="role"  class="form-control @error('role') is-invalid @enderror">
                                    <option value="" readonly>Pilih Role</option>
                                    <option value="2">Kepala Sekolah</option>
                                    <option value="0">Pengguna</option>
                                    <option value="1">Admin</option>
                                </select>
                                @error('role')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
>>>>>>> 89fe746 (50%)
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
