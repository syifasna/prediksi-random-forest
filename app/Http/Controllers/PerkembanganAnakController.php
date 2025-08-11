<?php

namespace App\Http\Controllers;

use App\Models\PerkembanganAnak;
use App\Models\TahunAjaran;
use App\Models\Semester;
use App\Models\Kelas;
use App\Models\Anak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerkembanganAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $perkembangan = PerkembanganAnak::with('TahunAjaran', 'Semester', 'Kelas', 'Anak')->paginate(5);

        return view('admin.perkembanganAnak.index', compact('perkembangan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tahunAjaran = TahunAjaran::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $anak = Anak::all();
        return view('admin.perkembanganAnak.create', compact('tahunAjaran', 'semester', 'kelas', 'anak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $ratarata = ($request->kognitif + $request->motorik + $request->bahasa + $request->sosial_emosional) / 4;

        $data = $request->all();
        $data['ratarata'] = $ratarata;

        $indikatorData = [
            'kognitif' => [],
            'motorik' => [],
            'bahasa' => [],
            'sosial_emosional' => [],
        ];

        foreach ($indikatorData as $ranah => &$list) {
            $ranahKey = strtolower(str_replace('-', '_', $ranah)); // konsisten underscore
            for ($i = 0; $i < 4; $i++) {
                $list[$i] = $request->input("{$ranahKey}_{$i}", null);
            }
        }


        $data['detail_indikator'] = json_encode($indikatorData);

        PerkembanganAnak::create($data);

        return redirect()->route('perkembangan.index')
            ->with('success', 'Data Perkembangan Anak Berhasil Ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(PerkembanganAnak $perkembangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerkembanganAnak $perkembangan): View
    {
        $tahunAjaran = TahunAjaran::all();
        $semester = Semester::all();
        $kelas = Kelas::all();
        $anak = Anak::all();
        $detail = json_decode($perkembangan->detail_indikator, true);
        return view('admin.perkembanganAnak.edit', compact('perkembangan', 'tahunAjaran', 'semester', 'kelas', 'anak', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerkembanganAnak $perkembangan): RedirectResponse
    {
        // Hitung rata-rata
        $ratarata = ($request->kognitif + $request->motorik + $request->bahasa + $request->sosial_emosional) / 4;

        $data = $request->all();
        $data['ratarata'] = $ratarata;

        // Ambil detail indikator (sama seperti store)
        $indikatorData = [
            'kognitif' => [],
            'motorik' => [],
            'bahasa' => [],
            'sosial_emosional' => [],
        ];

        foreach ($indikatorData as $ranah => &$list) {
            $ranahKey = strtolower(str_replace('-', '_', $ranah)); // konsisten underscore
            for ($i = 0; $i < 4; $i++) {
                $list[$i] = $request->input("{$ranahKey}_{$i}", null);
            }
        }


        $data['detail_indikator'] = json_encode($indikatorData);

        // Update ke database
        $perkembangan->update($data);

        return redirect()->route('perkembangan.index')
            ->with('success', 'Data Perkembangan Anak Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerkembanganAnak $perkembangan): RedirectResponse
    {
        $perkembangan->delete();

        return redirect()->route('perkembangan.index')
            ->with('success', 'Data Perkembangan Anak Berhasil Dihapus');
    }

    // get

    public function getSemester($tahunAjaranId)
    {
        return Semester::where('tahun_ajaran_id', $tahunAjaranId)->get();
    }

    public function getKelas($tahunAjaranId)
    {
        return Kelas::where('tahun_ajaran_id', $tahunAjaranId)->get();
    }

    public function getAnak($kelasId)
    {
        $tahunAjaranId = request()->get('tahun_ajaran_id');
        $semesterId = request()->get('semester_id');

        // Ambil anak yang belum diinput pada perkembangan untuk tahun & semester ini
        $anak = Anak::where('kelas_id', $kelasId)
            ->whereNotIn('id', function ($query) use ($tahunAjaranId, $semesterId) {
                $query->select('anak_id')
                    ->from('perkembangan_anaks')
                    ->where('tahun_ajaran_id', $tahunAjaranId)
                    ->where('semester_id', $semesterId);
            })
            ->get();

        return response()->json($anak);
    }
}
