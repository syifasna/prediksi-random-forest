<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    //
=======
use App\Models\PerkembanganAnak;
use App\Models\Evaluasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EvaluasiController extends Controller
{
    public function index()
    {
        $data = Evaluasi::with('perkembangan.anak')->paginate(10);
        return view('admin.evaluasi.index', compact('data'));
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
>>>>>>> 89fe746 (50%)
}
