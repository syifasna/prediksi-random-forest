<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
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

    public function PerkembanganAnak(): HasMany
    {
        return $this->hasMany(PerkembanganAnak::class, 'semester_id', 'id');
    }
}
