@extends('layouts.aps')

@section('content')
<<<<<<< HEAD
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Detail Data Pendaftar</h4>
                <div class="d-md-flex justify-content-md-end">
                    <a class="btn btn-dark btn-sm" href="{{ route('pendaftar.index') }}">Kembali</a>
=======
    @php
        $roleValue = $user->getRawOriginal('role'); // angka asli dari DB
    @endphp
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Ubah Data Pengguna</h4>
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

                    <form action="{{ route('pendaftar.update', $pendaftar->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="tab-content" id="myTabContent">
                            <!-- Tab Data Pribadi -->
                            <div class="tab-pane fade show active" id="data-pribadi" role="tabpanel">
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button type="button" id="toggle-data-pribadi" class="btn btn-primary">Edit</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label"><strong>Nama Lengkap</strong></label>
                                        <input disabled type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            value="{{ $pendaftar->nama }}">
                                        @error('nama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="agama" class="form-label"><strong>Agama</strong></label>
                                        <select name="agama" id="agama"
                                            class="form-control @error('agama') is-invalid @enderror" disabled>
                                            <option value="">-- Pilih Agama --</option>
                                            <option value="Islam"
                                                {{ old('agama', $pendaftar->agama ?? '') == 'Islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="Katolik"
                                                {{ old('agama', $pendaftar->agama ?? '') == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Protestan"
                                                {{ old('agama', $pendaftar->agama ?? '') == 'Protestan' ? 'selected' : '' }}>
                                                Protestan</option>
                                            <option value="Hindu"
                                                {{ old('agama', $pendaftar->agama ?? '') == 'Hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                            <option value="Budha"
                                                {{ old('agama', $pendaftar->agama ?? '') == 'Budha' ? 'selected' : '' }}>
                                                Budha</option>
                                            <option value="Konghucu"
                                                {{ old('agama', $pendaftar->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tempatLahir" class="form-label"><strong>Tempat Lahir</strong></label>
                                        <input disabled type="text" name="tempatLahir"
                                            class="form-control @error('tempatLahir') is-invalid @enderror" id="tempatLahir"
                                            value="{{ $pendaftar->tempatLahir }}">
                                        @error('tempatLahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tglLahir" class="form-label"><strong>Tanggal Lahir</strong></label>
                                        <input disabled type="date" name="tglLahir"
                                            class="form-control @error('tglLahir') is-invalid @enderror" id="tglLahir"
                                            value="{{ $pendaftar->tglLahir }}">
                                        @error('tglLahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="jk" class="form-label"><strong>Jenis Kelamin</strong></label>
                                        <select name="jk" id="jk"
                                            class="form-control @error('jk') is-invalid @enderror" disabled>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="Perempuan"
                                                {{ old('jk', $pendaftar->jk ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                            <option value="Laki-laki"
                                                {{ old('jk', $pendaftar->jk ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                        </select>
                                        @error('jk')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="rt" class="form-label"><strong>RT</strong></label>
                                        <input disabled type="text" name="rt"
                                            class="form-control @error('rt') is-invalid @enderror" id="rt"
                                            value="{{ $pendaftar->rt }}">
                                        @error('rt')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="rw" class="form-label"><strong>RW</strong></label>
                                        <input disabled type="text" name="rw"
                                            class="form-control @error('rw') is-invalid @enderror" id="rw"
                                            value="{{ $pendaftar->rw }}">
                                        @error('rw')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="desa" class="form-label"><strong>Desa</strong></label>
                                        <input disabled type="text" name="desa"
                                            class="form-control @error('desa') is-invalid @enderror" id="desa"
                                            value="{{ $pendaftar->desa }}">
                                        @error('desa')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="kecamatan" class="form-label"><strong>Kecamatan</strong></label>
                                        <input disabled type="text" name="kecamatan"
                                            class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                                            value="{{ $pendaftar->kecamatan }}">
                                        @error('kecamatan')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="kab_kota" class="form-label"><strong>Kabupaten / Kota</strong></label>
                                        <input disabled type="text" name="kab_kota"
                                            class="form-control @error('kab_kota') is-invalid @enderror" id="kab_kota"
                                            value="{{ $pendaftar->kab_kota }}">
                                        @error('kab_kota')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="alamat" class="form-label"><strong>Alamat</strong></label>
                                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                                            style="height:150px" disabled>{{ $pendaftar->alamat }}</textarea>
                                        @error('alamat')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Data Sekolah Asal -->
                            <div class="tab-pane fade" id="data-sekolah-asal" role="tabpanel">
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button type="button" id="toggle-data-sekolah-asal" class="btn btn-primary">Edit</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nm_sekolah_asal" class="form-label"><strong>Sekolah
                                                Asal</strong></label>
                                        <input disabled type="text" name="nm_sekolah_asal"
                                            class="form-control @error('nm_sekolah_asal') is-invalid @enderror"
                                            id="nm_sekolah_asal" value="{{ $pendaftar->nm_sekolah_asal }}">
                                        @error('nm_sekolah_asal')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nisn" class="form-label"><strong>Alamat Sekolah
                                                Asal</strong></label>
                                        <textarea class="form-control @error('alamat_sekolah_asal') is-invalid @enderror" name="alamat_sekolah_asal"
                                            id="alamat_sekolah_asal" style="height:150px" disabled>{{ $pendaftar->alamat_sekolah_asal }}</textarea>
                                        @error('alamat_sekolah_asal')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nisn" class="form-label"><strong>No NISN</strong></label>
                                        <input disabled type="text" name="nisn"
                                            class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                                            value="{{ $pendaftar->nisn }}">
                                        @error('nisn')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="noijazah" class="form-label"><strong>No Ijazah</strong></label>
                                        <input disabled type="text" name="noijazah"
                                            class="form-control @error('noijazah') is-invalid @enderror" id="noijazah"
                                            value="{{ $pendaftar->noijazah }}">
                                        @error('noijazah')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Lainnya -->
                            <div class="tab-pane fade" id="lainnya" role="tabpanel">
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button type="button" id="toggle-lainnya" class="btn btn-primary">Edit</button>
                                </div>
                                <div class="mb-3">
                                    <center><img src="/fotoPendaftar/{{ $pendaftar->foto }}" width="300px"><br></center>
                                    <label for="foto" class="form-label"><strong>Upload Foto</strong></label>
                                    <input disabled type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" id="foto">
                                    @error('foto')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </form>

=======
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label"><strong>Nama Lengkap</strong></label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label"><strong>E-Mail</strong></label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ $user->email }}">
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
                                    value="{{ $user->password }}">
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label"><strong>Konfirmasi Password</strong></label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    value="{{ $user->password }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="role" class="form-label"><strong>Role</strong></label>
                                <select name="role" id="role"
                                    class="form-control @error('role') is-invalid @enderror">
                                    <option value="0" @selected((int) old('role', $roleValue) === 0)>Pengguna</option>
                                    <option value="1" @selected((int) old('role', $roleValue) === 1)>Admin</option>
                                    <option value="2" @selected((int) old('role', $roleValue) === 2)>Kepala Sekolah</option>
                                </select>
                                @error('role')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Ubah</button>
                    </form>
>>>>>>> 89fe746 (50%)
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = ['data-pribadi', 'data-sekolah-asal', 'lainnya'];

            sections.forEach(function(section) {
                const toggleBtn = document.getElementById(`toggle-${section}`);
                const sectionContent = document.getElementById(section);

                toggleBtn.dataset.mode = 'edit';

                toggleBtn.addEventListener('click', function() {
                    if (toggleBtn.dataset.mode === 'edit') {
                        sectionContent.querySelectorAll('input, select, textarea').forEach(function(el) {
                            el.removeAttribute('disabled');
                            el.removeAttribute('disabled');
                        });
                        toggleBtn.innerText = 'Submit';
                        toggleBtn.classList.remove('btn-primary');
                        toggleBtn.classList.add('btn-success');
                        toggleBtn.dataset.mode = 'submit';
                    } else if (toggleBtn.dataset.mode === 'submit') {
                        // Submit form manual
                        toggleBtn.closest('form').submit();
                    }
                });
            });
        });
    </script>
=======
>>>>>>> 89fe746 (50%)
@endsection
