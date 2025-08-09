<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tahunAjaran = TahunAjaran::paginate(5);

        return view('admin.tahun-ajaran.index', compact('tahunAjaran'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.tahun-ajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'tahun_awal' => ['required', 'integer', 'min:2000'],
            'tahun_akhir' => ['required', 'integer', 'gt:tahun_awal'],
        ]);

        $data['ket'] = $data['tahun_awal'] . '/' . $data['tahun_akhir']; // generate di sini

        TahunAjaran::create($data);

        return redirect()->route('tahun-ajaran.index')
            ->with('success', 'Data Tahun Ajaran Berhasil Ditambahkan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAjaran $tahunAjaran): View
    {
        return view('admin.tahun-ajaran.edit', compact('tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahunAjaran $tahunAjaran): RedirectResponse
    {
        $tahunAjaran->update($request->all());

        return redirect()->route('tahun-ajaran.index')
            ->with('success', 'Data Tahun Ajaran Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran): RedirectResponse
    {
        $tahunAjaran->delete();

        return redirect()->route('tahun-ajaran.index')
            ->with('success', 'Data Tahun Ajaran Berhasil Dihapus');
    }
}
