<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allabsensi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal_absensi', 'jam_absensi', 'latitude', 'longitude', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
