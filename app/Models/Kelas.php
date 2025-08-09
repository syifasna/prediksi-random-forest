<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'wali_kelas_id', 'id');
    }

    public function anak(): HasMany
    {
        return $this->hasMany(Anak::class, 'kelas_id', 'id');
    }
<<<<<<< HEAD
=======

     public function PerkembanganAnak(): HasMany
    {
        return $this->hasMany(PerkembanganAnak::class, 'kelas_id', 'id');
    }
>>>>>>> 89fe746 (50%)
}
