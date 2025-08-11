<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PerkembanganAnak;
use App\Models\Evaluasi;
use App\Models\Kelas;
use App\Models\Anak;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
        $berdasarkanLabel = $evaluasi->groupBy('hasil_prediksi');

        return view('home', compact('berdasarkanLabel'));
    }

    public function dashboard(): View
    {
        $totalAnak = Anak::count();
        $totalKelas = Kelas::count();

        // Data untuk chart
        $evaluasi = Evaluasi::with('perkembangan.kelas')->get();

        $labelsPrediksi = ['Sesuai Usia', 'Perlu Pendampingan', 'Sangat Baik'];
        $kelasList = Kelas::pluck('nama_kelas', 'id')->toArray();

        // === CHART 1: Prediksi berdasarkan Label & Kelas ===
        $chart1Data = [];
        $colors = [
            'rgba(255, 99, 132, 0.7)',
            'rgba(144, 238, 144, 0.7)',
            'rgba(0, 206, 209, 0.7)'
        ];
        $borderColors = [
            'rgba(255, 99, 132, 1)',
            'rgba(144, 238, 144, 1)',
            'rgba(0, 206, 209, 1)'
        ];

        foreach ($labelsPrediksi as $i => $label) {
            $dataPerKelas = [];
            foreach ($kelasList as $kelasId => $kelasNama) {
                $jumlah = $evaluasi->filter(function ($item) use ($label, $kelasId) {
                    return $item->hasil_prediksi === $label &&
                        $item->perkembangan->kelas_id == $kelasId;
                })->count();
                $dataPerKelas[] = $jumlah;
            }

            $chart1Data[] = [
                'label' => $label,
                'data' => $dataPerKelas,
                'backgroundColor' => $colors[$i],
                'borderColor' => $borderColors[$i],
                'borderWidth' => 1
            ];
        }

        // === CHART 2: Banyaknya siswa per label ===
        $chart2Data = [];
        foreach ($labelsPrediksi as $i => $label) {
            $jumlah = $evaluasi->where('hasil_prediksi', $label)->count();
            $chart2Data[] = [
                'label' => $label,
                'value' => $jumlah,
                'backgroundColor' => $colors[$i],
                'borderColor' => $borderColors[$i],
                'borderWidth' => 1
            ];
        }

        // Kirim semua data ke view
        return view('dashboard', [
            'totalAnak' => $totalAnak,
            'totalKelas' => $totalKelas,
            'kelasLabels' => array_values($kelasList),
            'chart1Data' => $chart1Data,
            'chart2Data' => $chart2Data
        ]);
    }

    public function kepsekHome(): View
    {
        return view('kepsekHome');
    }
}
