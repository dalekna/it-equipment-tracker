<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    use HasFactory;

    protected $table = 'kategorija';

    protected $fillable = [
        'pavadinimas',
        'tipasid',
    ];

    // ✅ Kategorija priklauso vienam tipui
    public function tipas()
    {
        return $this->belongsTo(Tipas::class, 'tipasid');
    }

    // ✅ Kategorija turi daug dalių
    public function dalys()
    {
        return $this->hasMany(Dalis::class, 'kategorijaid');
    }
}
