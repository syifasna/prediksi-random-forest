<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganAnak;
use App\Models\Evaluasi;
use App\Models\Kelas;
use App\Models\Anak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Exports\EvaluasiGroupedExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class EvaluasiController extends Controller
{
    public function index()
    {
        $data = Evaluasi::with('perkembangan.anak')->paginate(10);

        $evaluasi = Evaluasi::with([
            'perkembangan.anak',
            'perkembangan.kelas'
        ])->get()->map(function ($item) {
            return [
                'nama_anak'      => $item->perkembangan->anak->nama ?? '-',
                'nama_kelas'     => $item->perkembangan->kelas->nama_kelas ?? '-',
                'hasil_prediksi' => $item->hasil_prediksi ?? '-',
            ];
        });

        // Group untuk tabel pertama (per kelas)
        $berdasarkanKelas = $evaluasi->groupBy('nama_kelas');

        // Group untuk tabel kedua (per label)
        $berdasarkanLabel = $evaluasi->groupBy('hasil_prediksi');

        return view('admin.evaluasi.index', compact('berdasarkanKelas', 'berdasarkanLabel', 'data'));
    }

    public function prediksiSemua()
    {
        // Ambil semua data perkembangan anak
        $perkembangan = PerkembanganAnak::all(['id', 'kognitif', 'motorik', 'bahasa', 'sosial_emosional']);

        foreach ($perkembangan as $item) {
            // Kirim ke API Python
            $response = Http::post('http://127.0.0.1:5000/predict', [
                'kognitif' => $item->kognitif,
                'motorik' => $item->motorik,
                'bahasa' => $item->bahasa,
                'sosial_emosional' => $item->sosial_emosional,
            ]);

            $hasil = $response->json(); // ubah ke array

            if (isset($hasil['prediksi'])) {
                Evaluasi::updateOrCreate(
                    ['perkembangan_id' => $item->id],
                    ['hasil_prediksi' => $hasil['prediksi']]
                );
            } else {
                // handle error jika API tidak balikin 'prediksi'
                logger()->error('API tidak mengembalikan prediksi', ['response' => $hasil]);
            }
        }

        return redirect()->route('evaluasi.index')->with('success', 'Prediksi berhasil dilakukan.');
    }

    public function downloadExcelGrouped()
    {
        $berdasarkanKelas = Evaluasi::with(['perkembangan.anak', 'perkembangan.kelas'])
            ->get()
            ->groupBy(fn($item) => $item->perkembangan->kelas->nama_kelas ?? 'Tidak Ada Kelas')
            ->map(function ($group) {
                return $group->map(function ($item) {
                    return [
                        'nama_anak' => $item->perkembangan->anak->nama ?? '-',
                        'hasil_prediksi' => $item->hasil_prediksi ?? '-'
                    ];
                });
            });

        $berdasarkanLabel = Evaluasi::with(['perkembangan.anak', 'perkembangan.kelas'])
            ->get()
            ->groupBy('hasil_prediksi')
            ->map(function ($group) {
                return $group->map(function ($item) {
                    return [
                        'nama_anak' => $item->perkembangan->anak->nama ?? '-',
                        'nama_kelas' => $item->perkembangan->kelas->nama_kelas ?? '-'
                    ];
                });
            });

        return Excel::download(new EvaluasiGroupedExport($berdasarkanKelas, $berdasarkanLabel), 'Evaluasi Prediksi Perkembangan Anak.xlsx');
    }

    public function downloadPDFGrouped()
    {
        $berdasarkanKelas = Evaluasi::with(['perkembangan.anak', 'perkembangan.kelas'])
            ->get()
            ->groupBy(fn($item) => $item->perkembangan->kelas->nama_kelas ?? 'Tidak Ada Kelas')
            ->map(function ($group) {
                return $group->map(function ($item) {
                    return [
                        'nama_anak' => $item->perkembangan->anak->nama ?? '-',
                        'hasil_prediksi' => $item->hasil_prediksi ?? '-'
                    ];
                });
            });

        $berdasarkanLabel = Evaluasi::with(['perkembangan.anak', 'perkembangan.kelas'])
            ->get()
            ->groupBy('hasil_prediksi')
            ->map(function ($group) {
                return $group->map(function ($item) {
                    return [
                        'nama_anak' => $item->perkembangan->anak->nama ?? '-',
                        'nama_kelas' => $item->perkembangan->kelas->nama_kelas ?? '-'
                    ];
                });
            });

        $pdf = Pdf::loadView('admin.evaluasi.grouped-pdf', compact('berdasarkanKelas', 'berdasarkanLabel'));
        return $pdf->download('Evaluasi Prediksi Perkembangan Anak.pdf');
    }
}
