<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Evaluasi Grouped</title>
    <style>
        body { font-family: sans-serif; }
        .tabel-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        table {
            border-collapse: collapse;
            min-width: 200px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px 10px;
            font-size: 12px;
        }
        th {
            background-color: #eee;
        }
    </style>
</head>
<body>

<h3>Evaluasi Perkembangan Anak berdasarkan Kelas</h3>
<div class="tabel-container">
    @foreach($berdasarkanKelas as $kelas => $items)
        <table>
            <thead>
                <tr>
                    <th colspan="2">Kelas {{ $kelas }}</th>
                </tr>
                <tr>
                    <th>Nama Anak</th>
                    <th>Hasil Prediksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $anak)
                    <tr>
                        <td>{{ $anak['nama_anak'] }}</td>
                        <td>{{ $anak['hasil_prediksi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>

<h3>Evaluasi Perkembangan Anak berdasarkan Label</h3>
<div class="tabel-container">
    @foreach($berdasarkanLabel as $label => $items)
        <table>
            <thead>
                <tr>
                    <th colspan="2">{{ $label }}</th>
                </tr>
                <tr>
                    <th>Nama Anak</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $anak)
                    <tr>
                        <td>{{ $anak['nama_anak'] }}</td>
                        <td>{{ $anak['nama_kelas'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>

</body>
</html>
