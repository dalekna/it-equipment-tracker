<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NuomaStatusas extends Model
{
    use HasFactory;

    protected $table = 'nuoma_statusas';

    protected $fillable = [
        'pavadinimas',
    ];

    public function nuomos()
    {
        return $this->hasMany(Nuoma::class, 'statusasid');
    }
}
