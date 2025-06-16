<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nuoma extends Model
{
    use HasFactory;

    protected $table = 'nuoma';

    protected $fillable = [
        'user_id',
        'vienetasid',
        'pradzia',
        'pabaiga',
        'statusasid',
    ];

    // Nuomą atliko vartotojas
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Nuomojamas vienetas
    public function vienetas()
    {
        return $this->belongsTo(Vienetas::class, 'vienetasid');
    }

    // Nuomos būsena
    public function statusas()
    {
        return $this->belongsTo(NuomaStatusas::class, 'statusasid');
    }
}
