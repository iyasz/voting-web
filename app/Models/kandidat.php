<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kandidat extends Model
{
    use HasFactory;
    protected $table = "kandidat";

    protected $fillable = [
        'user_id',
        'visi',
        'jumlah_suara',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
