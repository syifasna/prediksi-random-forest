<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PerkembanganAnak extends Model
{
<<<<<<< HEAD
    protected $guarded = 'id';
=======
    protected $guarded = ['id'];
>>>>>>> 89fe746 (50%)

    public function TahunAjaran(): BelongsTo
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id', 'id');
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

<<<<<<< HEAD
=======
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

>>>>>>> 89fe746 (50%)
    public function anak(): BelongsTo
    {
        return $this->belongsTo(Anak::class, 'anak_id', 'id');
    }

<<<<<<< HEAD
    public function evaluasi(): HasMany
    {
        return $this->hasMany(Evaluasi::class, 'perkembangan_id', 'id');
=======
    public function evaluasi()
    {
        return $this->hasOne(Evaluasi::class, 'perkembangan_id');
>>>>>>> 89fe746 (50%)
    }
}
