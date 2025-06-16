<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logas extends Model
{
    use HasFactory;

    protected $table = 'logas';

    protected $fillable = [
        'user_id',
        'lentele',
        'iraso_id',
        'laukas',
        'senas',
        'naujas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
