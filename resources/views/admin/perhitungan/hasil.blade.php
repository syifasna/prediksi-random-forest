@extends('layouts.aps')

@section('content')
    <div class="container card mt-4 py-4">
        <h4>Data Hasil dan Rangking Akhir</h4>
        <table class="table table mt-4" style="text-align: center">
            <thead>
                <tr>
                    <th>Rangking</th>
                    <th>Alternatif</th>
                    <th>Nilai Akhir (Vi)</th>
                </tr>
            </thead>
            <tbody>
                @php $rank = 1; @endphp
                @foreach ($skor as $alternatif_id => $total)
                    <tr>
                        <td>{{ $rank++ }}</td>
                        <td>{{ $alternatifs->firstWhere('id', $alternatif_id)->alternatif }}</td>
                        <td>{{ number_format($total, 3) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button id="toggle-btn" class="btn btn-success mb-4" onclick="toggleHasil()">Tampilkan Hasil Perhitungan</button>

        <div id="hasil-perhitungan" style="display: none;">
            <h4>Konversi Nilai Alternatif</h4>
            <table class="table table mt-4" style="text-align: center">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nkriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                        <tr>
                            <td>{{ $alternatif->alternatif }}</td>
                            @foreach ($kriterias as $kriteria)
                                <td>{{ $konversi_data[$alternatif->id][$kriteria->id] }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="mt-5">Matriks Normalisasi</h4>
            <table class="table table mt-4" style="text-align: center">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nkriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                        <tr>
                            <td>{{ $alternatif->alternatif }}</td>
                            @foreach ($kriterias as $kriteria)
                                <td>{{ number_format($normalisasi[$alternatif->id][$kriteria->id], 3) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="mt-5">Tabel Preferensi (Normalisasi x Bobot)</h4>
            <table class="table table mt-4" style="text-align: center">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->nkriteria }} (r x w)</th>
                        @endforeach
                        <th>Nilai Akhir (Vi)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatifs as $alternatif)
                        <tr>
                            <td>{{ $alternatif->alternatif }}</td>
                            @foreach ($kriterias as $kriteria)
                                <td>{{ number_format($preferensi_data[$alternatif->id][$kriteria->id], 3) }}</td>
                            @endforeach
                            <td><b>{{ number_format($preferensi_data[$alternatif->id]['total'], 3) }}</b></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleHasil() {
            const hasilDiv = document.getElementById('hasil-perhitungan');
            const toggleBtn = document.getElementById('toggle-btn');

            if (hasilDiv.style.display === 'none') {
                hasilDiv.style.display = 'block';
                toggleBtn.innerText = 'Sembunyikan Hasil Perhitungan';
            } else {
                hasilDiv.style.display = 'none';
                toggleBtn.innerText = 'Tampilkan Hasil Perhitungan';
            }
        }
    </script>
@endsection
