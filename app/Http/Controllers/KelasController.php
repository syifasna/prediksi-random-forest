<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
<<<<<<< HEAD
=======
use App\Models\TahunAjaran;
use App\Models\User;
>>>>>>> 89fe746 (50%)
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
<<<<<<< HEAD
        $kelas = Kelas::paginate(5);
=======
        $kelas = Kelas::with('TahunAjaran', 'User')->paginate(5);
>>>>>>> 89fe746 (50%)
          
        return view('admin.kelas.index', compact('kelas'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
<<<<<<< HEAD
        return view('admin.kelas.create');
=======
        $tahunAjaran = TahunAjaran::all();
        $waliKelas = User::whereIn('role', [1, 2])->get();
        return view('admin.kelas.create', compact('tahunAjaran', 'waliKelas'));
>>>>>>> 89fe746 (50%)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Kelas::create($request->all());
           
        return redirect()->route('kelas.index')
                         ->with('success', 'Data Kelas Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas): View
    {
<<<<<<< HEAD
        return view('admin.kelas.edit', compact('kelas'));
=======
        $tahunAjaran = TahunAjaran::all();
        $waliKelas = User::whereIn('role', [1, 2])->get();
        return view('admin.kelas.edit', compact('kelas', 'tahunAjaran', 'waliKelas'));
>>>>>>> 89fe746 (50%)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas): RedirectResponse
    {
        $kelas->update($request->all());
          
        return redirect()->route('kelas.index')
                        ->with('success','Data Kelas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas): RedirectResponse
    {
        $kelas->delete();
           
        return redirect()->route('kelas.index')
                        ->with('success','Data Kelas Berhasil Dihapus');
    }
}
