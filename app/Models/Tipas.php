<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipas extends Model
{
    use HasFactory;

    protected $table = 'tipas';

    protected $fillable = [
        'pavadinimas',
    ];

    // ✅ Tipas turi daug kategorijų
    public function kategorijos()
    {
        return $this->hasMany(Kategorija::class, 'tipasid');
    }
}
