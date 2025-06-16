<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VienetasStatusas extends Model
{
    use HasFactory;

    protected $table = 'vienetas_statusas';

    protected $fillable = [
        'pavadinimas',
    ];

    // Vienas statusas gali turėti daug vienetų
    public function vienetai()
    {
        return $this->hasMany(Vienetas::class, 'statusasid');
    }
}
