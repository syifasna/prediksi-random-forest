<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PerkembanganAnak extends Model
{
    protected $guarded = ['id'];

    public function TahunAjaran(): BelongsTo
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function anak(): BelongsTo
    {
        return $this->belongsTo(Anak::class, 'anak_id', 'id');
    }

    public function evaluasi()
    {
        return $this->hasOne(Evaluasi::class, 'perkembangan_id');
    }
}
