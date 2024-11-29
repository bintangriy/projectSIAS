<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nis';
    protected $fillable = [
        'nis',
        'nama',
        'id_kelas',
        'alamat',
        'jenis_kelamin',
    ];

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    public function datakelas()
    {
        return $this->belongsTo(Datakelas::class, 'id_kelas', 'id_kelas');
    }
}
