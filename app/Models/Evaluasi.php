<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluasi extends Model
{
    protected $guarded = ['id'];

    public function perkembangan(): BelongsTo
    {
        return $this->belongsTo(PerkembanganAnak::class, 'perkembangan_id', 'id');
    }
}
