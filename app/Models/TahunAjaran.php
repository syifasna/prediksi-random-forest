<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TahunAjaran extends Model
{
<<<<<<< HEAD
    protected $guarded = 'id';
=======
    protected $guarded = ['id'];
>>>>>>> 89fe746 (50%)

    public function semester(): HasMany
    {
        return $this->hasMany(Semester::class, 'tahun_ajaran_id', 'id');
    }

    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'tahun_ajaran_id', 'id');
    }

    public function PerkembanganAnak(): HasMany
    {
        return $this->hasMany(PerkembanganAnak::class, 'tahun_ajaran_id', 'id');
    }
}
