<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dalis extends Model
{
    use HasFactory;

    protected $table = 'dalis';

    protected $fillable = [
        'pavadinimas',
        'kategorijaid',
        'gamintojasid',
        'pastaba',
    ];

    // ✅ Dalis priklauso kategorijai
    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class, 'kategorijaid');
    }

    // ✅ Dalis priklauso gamintojui
    public function gamintojas()
    {
        return $this->belongsTo(Gamintojas::class, 'gamintojasid');
    }

    // ✅ Dalis turi daug vienetų (įrangos egzempliorių)
    public function vienetai()
    {
        return $this->hasMany(Vienetas::class, 'dalisid');
    }

    // 🆕 Dalis turi ryšį su tipu per kategoriją
    public function tipas()
    {
        return $this->kategorija?->tipas;
    }
}
