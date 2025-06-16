<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamintojas extends Model
{
    use HasFactory;

    protected $table = 'gamintojas';

    protected $fillable = [
        'pavadinimas',
    ];

    // ✅ Gamintojas turi daug dalių
    public function dalys()
    {
        return $this->hasMany(Dalis::class, 'gamintojasid');
    }
}
