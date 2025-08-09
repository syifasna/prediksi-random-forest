<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Kelas;
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
        $anak = Anak::latest()->paginate(5);
          
        return view('admin.anak.index', compact('anak'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kelas = Kelas::all();
        return view('admin.anak.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
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
        $kelas = Kelas::all();
        return view('admin.anak.edit', compact('anak', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anak $anak): RedirectResponse
    {
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
