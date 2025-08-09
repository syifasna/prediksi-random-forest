<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluasi extends Model
{
<<<<<<< HEAD
    protected $guarded = 'id';

    public function PerkembanganAnak(): BelongsTo
=======
    protected $guarded = ['id'];

    public function perkembangan(): BelongsTo
>>>>>>> 89fe746 (50%)
    {
        return $this->belongsTo(PerkembanganAnak::class, 'perkembangan_id', 'id');
    }
}
