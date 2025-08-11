@extends('layouts.aps')

@section('content')
    <style>
        .styled-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #555;
            border-radius: 4px;
            cursor: pointer;
            position: relative;
        }

        .styled-checkbox:checked {
            background-color: #28a745;
            /* hijau */
            border-color: #28a745;
        }

        .styled-checkbox:checked::after {
            content: '✔';
            color: white;
            position: absolute;
            top: 0;
            left: 4px;
            font-size: 14px;
        }

        .table-indikator th:first-child,
        .table-indikator td:first-child {
            width: 350px;
        }

        .table-indikator th:not(:first-child),
        .table-indikator td:not(:first-child) {
            width: 60px;
        }
    </style>

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

                    {{-- Indikator --}}
                    @php
                        $indikator = [
                            'Kognitif' => [
                                'Memahami arti informasi dari gambar/cerita',
                                'Mengidentifikasi, mengklasifikasikan, membandingkan',
                                'Mengenal konsep bilangan dan pola',
                                'Mengenal sebab-akibat',
                            ],
                            'Motorik' => [
                                'Berjalan maju, mundur, ke samping',
                                'Melompat, menendang, melempar',
                                'Menggunting, melipat, meremas',
                                'Menyusun lego, membuat bentuk',
                            ],
                            'Bahasa' => [
                                'Mengekspresikan kebutuhan/ide',
                                'Menjawab pertanyaan dengan tepat',
                                'Menceritakan ide/gagasan',
                                'Berinteraksi dengan bahasa yang dapat dipahami',
                            ],
                            'Sosial-Emosional' => [
                                'Mau berbagi dan membantu teman',
                                'Mengikuti aturan sederhana',
                                'Menunjukkan sikap sopan santun',
                                'Mengendalikan emosi',
                            ],
                        ];
                    @endphp

                    @foreach ($indikator as $kategori => $list)
                        <div class="mb-3 border p-3 rounded">
                            <h5>{{ $kategori }}</h5>
                            <table class="table table-sm table-indikator">
                                <thead class="text-center">
                                    <tr>
                                        <th>Indikator</th>
                                        <th>BM</th>
                                        <th>KM</th>
                                        <th>SM</th>
                                        <th>K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $i => $item)
                                        <tr>
                                            <td>{{ $item }}</td>
                                            @foreach (['BM' => 0, 'KM' => 1, 'SM' => 2, 'K' => 3] as $label => $nilai)
                                                <td class="text-center">
                                                    <input type="radio"
                                                        @php
$kategoriKey = strtolower(str_replace('-', '_', $kategori)); @endphp
                                                        name="{{ $kategoriKey }}_{{ $i }}"
                                                        data-ranah="{{ $kategoriKey }}" value="{{ $nilai }}"
                                                        class="styled-checkbox">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach

                    {{-- Hidden input untuk nilai akhir --}}
                    <input type="hidden" name="kognitif" id="kognitif">
                    <input type="hidden" name="motorik" id="motorik">
                    <input type="hidden" name="bahasa" id="bahasa">
                    <input type="hidden" name="sosial_emosional" id="sosial_emosional">

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Script perhitungan otomatis --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $('#tahun_ajaran_id').on('change', function() {
                let id = $(this).val();
                $('#semester_id').html('<option>Loading...</option>');
                $.get('/get-semester/' + id, function(data) {
                    $('#semester_id').html('<option value="">-- Pilih Semester --</option>');
                    data.forEach(item => {
                        $('#semester_id').append(
                            `<option value="${item.id}">${item.semester}</option>`);
                    });
                });

                $('#kelas_id').html('<option>Loading...</option>');
                $.get('/get-kelas/' + id, function(data) {
                    $('#kelas_id').html('<option value="">-- Pilih Kelas --</option>');
                    data.forEach(item => {
                        $('#kelas_id').append(
                            `<option value="${item.id}">${item.nama_kelas}</option>`);
                    });
                });
            });

            $('#kelas_id').on('change', function() {
                let id = $(this).val();
                let tahunId = $('#tahun_ajaran_id').val();
                let semesterId = $('#semester_id').val();

                $('#anak_id').html('<option>Loading...</option>');

                $.get('/get-anak/' + id, {
                    tahun_ajaran_id: tahunId,
                    semester_id: semesterId
                }, function(data) {
                    $('#anak_id').html('<option value="">-- Pilih Anak --</option>');
                    data.forEach(item => {
                        $('#anak_id').append(
                            `<option value="${item.id}">${item.nama}</option>`);
                    });
                });
            });

        });

        $(function() {
            $('input[type="radio"]').on('change', function() {
                let ranahList = ['kognitif', 'motorik', 'bahasa', 'sosial_emosional'];

                ranahList.forEach(ranah => {
                    let total = 0;
                    let count = 0;

                    // Hitung total skor indikator yang dipilih
                    $(`input[data-ranah="${ranah}"]:checked`).each(function() {
                        total += parseInt($(this).val());
                        count++;
                    });

                    // Rata-rata -> normalisasi ke 0–1
                    let rata = count > 0 ? parseFloat(((total / count) / 3).toFixed(2)) : 0;
                    $(`#${ranah}`).val(rata);
                });
            });
        });
    </script>
@endsection
