<?php

namespace App\Http\Controllers;

use App\Models\Anak;
<<<<<<< HEAD
=======
use App\Models\Kelas;
>>>>>>> 89fe746 (50%)
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
<<<<<<< HEAD
        $anak = Anak::paginate(5);
=======
        $anak = Anak::latest()->paginate(5);
>>>>>>> 89fe746 (50%)
          
        return view('admin.anak.index', compact('anak'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
<<<<<<< HEAD
        return view('admin.anak.create');
=======
        $kelas = Kelas::all();
        return view('admin.anak.create', compact('kelas'));
>>>>>>> 89fe746 (50%)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
<<<<<<< HEAD
        Anak::create($request->all());
           
        return redirect()->route('anak.index')
                         ->with('success', 'Data Anak Berhasil Ditambahkan.');
=======
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($foto = $request->file('foto')) {
            $destinationPath = 'fotoAnak/';
            $profileImage = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }

        $anak = Anak::create($input);

        return redirect()->route('anak.index')
            ->with('success','Data Anak Berhasil Ditambah.');
>>>>>>> 89fe746 (50%)
    }

    /**
     * Display the specified resource.
     */
    public function show(Anak $anak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anak $anak): View
    {
<<<<<<< HEAD
        return view('admin.anak.edit', compact('anak'));
=======
        $kelas = Kelas::all();
        return view('admin.anak.edit', compact('anak', 'kelas'));
>>>>>>> 89fe746 (50%)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anak $anak): RedirectResponse
    {
<<<<<<< HEAD
        $anak->update($request->all());
=======
        $request->validate([
            'foto'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($anak->foto && file_exists(public_path('fotoAnak/' . $anak->foto))) {
                unlink(public_path('fotoAnak/' . $anak->foto));
            }

            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('fotoAnak/'), $fileName);
            $input['foto'] = $fileName;
        }

        $anak->update($input);
>>>>>>> 89fe746 (50%)
          
        return redirect()->route('anak.index')
                        ->with('success','Data Anak Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anak $anak): RedirectResponse
    {
        $anak->delete();
           
        return redirect()->route('anak.index')
                        ->with('success','Data Anak Berhasil Dihapus');
    }
}
