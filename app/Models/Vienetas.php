<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vienetas extends Model
{
    use HasFactory;

    protected $table = 'vienetas';

    protected $fillable = [
        'dalisid',
        'sm',
        'kaina',
        'statusasid',
    ];

    // ✅ Vienetas priklauso vienai dalei
    public function dalis()
    {
        return $this->belongsTo(Dalis::class, 'dalisid');
    }

    // ✅ Vienetas turi statusą (pvz., laisvas, užimtas)
    public function statusas()
    {
        return $this->belongsTo(VienetasStatusas::class, 'statusasid');
    }

    // ✅ Ryšys su nuomomis (jei reikia sekti nuomos istoriją)
    public function nuomos()
    {
        return $this->hasMany(Nuoma::class, 'vienetasid');
    }

    // 🆕 Tiesioginis ryšys iki kategorijos per dalį
    public function kategorija()
    {
        return $this->dalis?->kategorija;
    }

    // 🆕 Tiesioginis ryšys iki tipo per kategoriją
    public function tipas()
    {
        return $this->dalis?->kategorija?->tipas;
    }

    // 🆕 Tiesioginis ryšys iki gamintojo per dalį
    public function gamintojas()
    {
        return $this->dalis?->gamintojas;
    }
}
