<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class EvaluasiGroupedExport implements FromView
{
    protected $berdasarkanKelas;
    protected $berdasarkanLabel;

    public function __construct($berdasarkanKelas, $berdasarkanLabel)
    {
        $this->berdasarkanKelas = $berdasarkanKelas;
        $this->berdasarkanLabel = $berdasarkanLabel;
    }

    public function view(): View
    {
        return view('admin.evaluasi.grouped-excel', [
            'berdasarkanKelas' => $this->berdasarkanKelas,
            'berdasarkanLabel' => $this->berdasarkanLabel
        ]);
    }
}
