@extends('layouts.aps')

@section('content')
    <div class="col-12">
        <div class="card carddar mb-4">
            <div class="card-header carddar pb-0 d-flex justify-content-between align-items-center">
                <h4>Detail Data Anak</h4>
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

                    <form action="{{ route('anak.update', $anak->id) }}" method="POST" enctype="multipart/form-data">
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
                                            value="{{ $anak->nama }}">
                                        @error('nama')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nik" class="form-label"><strong>NIK</strong></label>
                                        <input disabled type="text" name="nik"
                                            class="form-control @error('nik') is-invalid @enderror" id="nik"
                                            value="{{ $anak->nik }}">
                                        @error('nik')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tglLahir" class="form-label"><strong>Tanggal Lahir</strong></label>
                                        <input disabled type="date" name="tglLahir"
                                            class="form-control @error('tglLahir') is-invalid @enderror" id="tglLahir"
                                            value="{{ $anak->tglLahir }}">
                                        @error('tglLahir')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="jk" class="form-label"><strong>Jenis Kelamin</strong></label>
                                        <select name="jk" id="jk"
                                            class="form-control @error('jk') is-invalid @enderror" disabled>
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="P"
                                                {{ old('jk', $anak->jk ?? '') == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                            <option value="L"
                                                {{ old('jk', $anak->jk ?? '') == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                        </select>
                                        @error('jk')
                                            <div class="form-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Data Sekolah Asal -->
                            <div class="tab-pane fade" id="data-ortu" role="tabpanel">
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button type="button" id="toggle-data-ortu" class="btn btn-primary">Edit</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="namaOrtuWali" class="form-label"><strong>Orang Tua/Wali</strong></label>
                                        <input disabled type="text" name="namaOrtuWali"
                                            class="form-control @error('namaOrtuWali') is-invalid @enderror"
                                            id="namaOrtuWali" value="{{ $anak->namaOrtuWali }}">
                                        @error('namaOrtuWali')
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
                                    <center><img src="/fotoAnak/{{ $anak->foto }}" width="300px"><br></center>
                                    <label for="foto" class="form-label"><strong>Upload Foto</strong></label>
                                    <input disabled type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" id="foto">
                                    @error('foto')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kelas_id" class="form-label"><strong>Kelas</strong></label>
                                    <select disabled name="kelas_id" id="kelas_id"
                                        class="form-control @error('kelas_id') is-invalid @enderror">
                                        @foreach ($kelas as $row)
                                            <option value="{{ $row->id }}"
                                                {{ isset($anak) && $anak->kelas_id == $row->id ? 'selected' : '' }}>
                                                {{ $row->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id')
                                        <div class="form-text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = ['data-pribadi', 'data-ortu', 'lainnya'];

            sections.forEach(function(section) {
                const toggleBtn = document.getElementById(`toggle-${section}`);
                const sectionContent = document.getElementById(section);

                toggleBtn.dataset.mode = 'edit';

                toggleBtn.addEventListener('click', function() {
                    if (toggleBtn.dataset.mode === 'edit') {
                        sectionContent.querySelectorAll('input, select, textarea').forEach(function(
                            el) {
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
@endsection
