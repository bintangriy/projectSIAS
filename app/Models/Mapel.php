<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel'; // Nama tabel
    protected $primaryKey = 'id_mapel'; // Primary key
    public $timestamps = true;

    protected $fillable = [
        'nama_mapel',
        'pengajar',
    ];

    // Relasi ke tabel dataguru
    public function guru()
    {
        return $this->belongsTo(Dataguru::class, 'pengajar', 'nip');
    }
}
