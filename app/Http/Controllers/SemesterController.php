<?php

namespace App\Http\Controllers;

use App\Models\Semester;
<<<<<<< HEAD
=======
use App\Models\TahunAjaran;
>>>>>>> 89fe746 (50%)
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
<<<<<<< HEAD
        $semester = Semester::paginate(5);
=======
        $semester = Semester::with('TahunAjaran')->paginate(5);
>>>>>>> 89fe746 (50%)
          
        return view('admin.semester.index', compact('semester'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
<<<<<<< HEAD
        return view('admin.semester.create');
=======
        $tahun_ajaran = TahunAjaran::all();
        return view('admin.semester.create', compact('tahun_ajaran'));
>>>>>>> 89fe746 (50%)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        Semester::create($request->all());
           
        return redirect()->route('semester.index')
                         ->with('success', 'Data Semester Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester): View
    {
<<<<<<< HEAD
        return view('admin.semester.edit', compact('semester'));
=======
        $tahun_ajaran = TahunAjaran::all();
        return view('admin.semester.edit', compact('semester', 'tahun_ajaran'));
>>>>>>> 89fe746 (50%)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semester $semester): RedirectResponse
    {
        $semester->update($request->all());
          
        return redirect()->route('semester.index')
                        ->with('success','Data Semester Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester): RedirectResponse
    {
        $semester->delete();
           
        return redirect()->route('semester.index')
                        ->with('success','Data Semester Berhasil Dihapus');
    }
}
