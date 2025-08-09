<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anak extends Model
{
<<<<<<< HEAD
    protected $guarded = 'id';
=======
    protected $guarded = ['id'];
>>>>>>> 89fe746 (50%)

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function PerkembanganAnak(): HasMany
    {
        return $this->hasMany(PerkembanganAnak::class, 'anak_id', 'id');
    }
}
